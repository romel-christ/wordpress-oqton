<?php
/**
 * Plugin Name: Oqton Shield
 * Description: HTTP basic auth in front of the whole site, like Drupal's Shield module. Active only when OQTON_SHIELD_USER and OQTON_SHIELD_PASS are defined (in wp-config.php).
 * Version: 1.0.0
 *
 * Optional wp-config.php settings:
 *   OQTON_SHIELD_ALLOW_IPS   Comma-separated IPs that skip the prompt, e.g. '203.0.113.5,198.51.100.7'.
 *   OQTON_SHIELD_ALLOW_PATHS Comma-separated path prefixes that skip the prompt, e.g. '/wp-json/oqton/v1/webhook'.
 *   OQTON_SHIELD_REALM       Text shown in the browser prompt (default 'Oqton').
 *
 * @package oqton
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Splits a comma-separated constant into a trimmed list.
 *
 * @param string $name Constant name.
 * @return string[]
 */
function oqton_shield_list( $name ) {
	if ( ! defined( $name ) ) {
		return array();
	}
	return array_filter( array_map( 'trim', explode( ',', (string) constant( $name ) ) ) );
}

/**
 * Reads basic-auth credentials from the request, whichever way the server exposes them.
 *
 * @return array{0:string,1:string}|null
 */
function oqton_shield_credentials() {
	if ( isset( $_SERVER['PHP_AUTH_USER'] ) ) {
		return array( (string) $_SERVER['PHP_AUTH_USER'], (string) ( $_SERVER['PHP_AUTH_PW'] ?? '' ) );
	}
	foreach ( array( 'HTTP_AUTHORIZATION', 'REDIRECT_HTTP_AUTHORIZATION' ) as $key ) {
		if ( ! empty( $_SERVER[ $key ] ) && 0 === stripos( $_SERVER[ $key ], 'basic ' ) ) {
			$decoded = base64_decode( substr( $_SERVER[ $key ], 6 ), true );
			if ( false !== $decoded && str_contains( $decoded, ':' ) ) {
				return explode( ':', $decoded, 2 );
			}
		}
	}
	return null;
}

/**
 * Lets the request through or answers 401 and stops.
 */
function oqton_shield_gate() {
	if ( ! defined( 'OQTON_SHIELD_USER' ) || ! defined( 'OQTON_SHIELD_PASS' ) || '' === OQTON_SHIELD_USER ) {
		return;
	}

	// Server-side tooling: WP-CLI and cron runs (including WordPress's own cron loopback).
	if ( ( defined( 'WP_CLI' ) && WP_CLI ) || wp_doing_cron() ) {
		return;
	}

	$ip = $_SERVER['REMOTE_ADDR'] ?? '';
	if ( $ip && in_array( $ip, oqton_shield_list( 'OQTON_SHIELD_ALLOW_IPS' ), true ) ) {
		return;
	}

	$path = (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH );
	foreach ( oqton_shield_list( 'OQTON_SHIELD_ALLOW_PATHS' ) as $prefix ) {
		if ( str_starts_with( $path, $prefix ) ) {
			return;
		}
	}

	$creds = oqton_shield_credentials();
	if ( $creds
		&& hash_equals( (string) OQTON_SHIELD_USER, $creds[0] )
		&& hash_equals( (string) OQTON_SHIELD_PASS, $creds[1] ) ) {
		// Hide the shield credentials from WordPress, otherwise REST requests treat them
		// as an Application Password login attempt and fail with 401 (breaks the block editor).
		unset( $_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], $_SERVER['HTTP_AUTHORIZATION'], $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] );
		return;
	}

	$realm = defined( 'OQTON_SHIELD_REALM' ) ? OQTON_SHIELD_REALM : 'Oqton';
	nocache_headers();
	header( 'WWW-Authenticate: Basic realm="' . str_replace( '"', '', $realm ) . '", charset="UTF-8"' );
	status_header( 401 );
	header( 'Content-Type: text/plain; charset=utf-8' );
	echo "401 Unauthorized\n";
	exit;
}

oqton_shield_gate();
