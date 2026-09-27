<?php
/**
 * Seeds demo pages, posts and settings for the oqton-tech theme.
 * Idempotent: re-running updates existing pages/posts by slug.
 *
 * Usage: wp eval-file tools/seed-content.php
 */

if ( ! defined( 'WP_CLI' ) ) {
	exit( "Run with: wp eval-file tools/seed-content.php\n" );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$oq_patterns = function ( array $slugs ) {
	return implode(
		"\n\n",
		array_map( fn( $s ) => '<!-- wp:pattern {"slug":"oqton-tech/' . $s . '"} /-->', $slugs )
	);
};

$oq_upsert = function ( $type, $slug, $title, $content, $extra = array() ) {
	$existing = get_page_by_path( $slug, OBJECT, $type );
	$postarr  = array_merge(
		array(
			'post_type'    => $type,
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $content,
			'post_status'  => 'publish',
		),
		$extra
	);
	if ( $existing ) {
		$postarr['ID'] = $existing->ID;
	}
	$id = wp_insert_post( wp_slash( $postarr ), true );
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id->get_error_message() );
	}
	WP_CLI::log( sprintf( '%s %s "%s" (#%d)', $existing ? 'Updated' : 'Created', $type, $title, $id ) );
	return $id;
};

// ---------- Pages ----------
$pages = array(
	'home'     => array( 'Home', array( 'hero', 'features', 'about', 'services', 'counters', 'why-choose', 'projects', 'process', 'team', 'testimonials', 'pricing', 'cta', 'blog', 'brands' ) ),
	'about'    => array( 'About Us', array( 'about', 'counters', 'why-choose', 'team', 'testimonials', 'brands' ) ),
	'services' => array( 'Services', array( 'services', 'process', 'faq', 'cta' ) ),
	'projects' => array( 'Projects', array( 'projects', 'testimonials', 'cta' ) ),
	'team'     => array( 'Our Team', array( 'team', 'cta' ) ),
	'pricing'  => array( 'Pricing', array( 'pricing', 'faq', 'cta' ) ),
	'contact'  => array( 'Contact', array( 'contact', 'faq' ) ),
);

$page_ids = array();
foreach ( $pages as $slug => $def ) {
	$page_ids[ $slug ] = $oq_upsert( 'page', $slug, $def[0], $oq_patterns( $def[1] ) );
}
$page_ids['blog'] = $oq_upsert( 'page', 'blog', 'Blog', '' );

// ---------- Featured images ----------
$theme_images = get_theme_file_path( 'assets/images' );
$oq_attach    = function ( $file ) use ( $theme_images ) {
	$found = get_posts(
		array(
			'post_type'   => 'attachment',
			'meta_key'    => '_oqton_source',
			'meta_value'  => $file,
			'numberposts' => 1,
			'fields'      => 'ids',
		)
	);
	if ( $found ) {
		return $found[0];
	}
	$tmp = wp_tempnam( $file );
	copy( "$theme_images/$file", $tmp );
	$id = media_handle_sideload(
		array(
			'name'     => $file,
			'tmp_name' => $tmp,
		),
		0
	);
	if ( is_wp_error( $id ) ) {
		WP_CLI::warning( "Could not import $file: " . $id->get_error_message() );
		return 0;
	}
	update_post_meta( $id, '_oqton_source', $file );
	return $id;
};

// ---------- Posts ----------
$cat_ids = array();
foreach ( array( 'Cloud', 'Security', 'Development' ) as $cat ) {
	$term            = term_exists( $cat, 'category' ) ?: wp_insert_term( $cat, 'category' );
	$cat_ids[ $cat ] = (int) $term['term_id'];
}

$posts = array(
	array( '5-steps-to-a-painless-cloud-migration', '5 Steps to a Painless Cloud Migration', 'Cloud', 'blog-1.jpg', 'Moving workloads to the cloud does not have to mean downtime or surprise bills. Here is the framework we use with every client.' ),
	array( 'zero-trust-security-for-small-teams', 'Zero-Trust Security for Small Teams', 'Security', 'blog-2.jpg', 'Zero trust is not just for enterprises. These practical controls give smaller companies big-league protection.' ),
	array( 'choosing-the-right-tech-stack-in-2026', 'Choosing the Right Tech Stack in 2026', 'Development', 'blog-3.jpg', 'Frameworks come and go. We share the questions that matter more than hype when picking a stack for the long run.' ),
);

$i = 0;
foreach ( $posts as $p ) {
	$body  = "<!-- wp:paragraph -->\n<p>{$p[4]}</p>\n<!-- /wp:paragraph -->\n\n";
	$body .= "<!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Why it matters</h2>\n<!-- /wp:heading -->\n\n";
	$body .= "<!-- wp:paragraph -->\n<p>Technology decisions compound over time. Getting the fundamentals right early saves months of rework and keeps teams focused on customers instead of firefighting.</p>\n<!-- /wp:paragraph -->\n\n";
	$body .= "<!-- wp:list {\"className\":\"is-style-checklist\"} -->\n<ul class=\"wp-block-list is-style-checklist\"><!-- wp:list-item -->\n<li>Start with clear business goals</li>\n<!-- /wp:list-item -->\n\n<!-- wp:list-item -->\n<li>Measure before and after</li>\n<!-- /wp:list-item -->\n\n<!-- wp:list-item -->\n<li>Automate the boring parts</li>\n<!-- /wp:list-item --></ul>\n<!-- /wp:list -->";

	$id = $oq_upsert(
		'post',
		$p[0],
		$p[1],
		$body,
		array(
			'post_excerpt'  => $p[4],
			'post_category' => array( $cat_ids[ $p[2] ] ),
			'post_date'     => gmdate( 'Y-m-d H:i:s', strtotime( '-' . ( $i * 9 + 2 ) . ' days' ) ),
		)
	);
	$thumb = $oq_attach( $p[3] );
	if ( $thumb ) {
		set_post_thumbnail( $id, $thumb );
	}
	++$i;
}

// Remove WordPress sample content.
foreach ( array( array( 'hello-world', 'post' ), array( 'sample-page', 'page' ) ) as $sample ) {
	$obj = get_page_by_path( $sample[0], OBJECT, $sample[1] );
	if ( $obj ) {
		wp_delete_post( $obj->ID, true );
		WP_CLI::log( "Deleted sample {$sample[1]} {$sample[0]}" );
	}
}
$privacy = (int) get_option( 'wp_page_for_privacy_policy' );
if ( $privacy && 'draft' === get_post_status( $privacy ) ) {
	wp_delete_post( $privacy, true );
}

// ---------- Settings ----------
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $page_ids['home'] );
update_option( 'page_for_posts', $page_ids['blog'] );
update_option( 'blogdescription', 'IT Solutions & Technology' );
update_option( 'permalink_structure', '/%postname%/' );
flush_rewrite_rules( false );

WP_CLI::success( 'Oqton demo content seeded.' );
