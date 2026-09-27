<?php
/**
 * Writes the theme's SVG icons and (fictional) partner logos.
 * Usage: php tools/generate-svgs.php
 */

$out = __DIR__ . '/../wp-content/themes/oqton-tech/assets/images';

$stroke = 'fill="none" stroke="#2d5bff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"';
$wrap   = fn( $body ) => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48" height="48"><g ' . $stroke . '>' . $body . '</g></svg>';

$icons = array(
	'icon-cloud'     => '<path d="M14 36h21a8 8 0 0 0 1-15.9A11 11 0 0 0 15.3 18 9 9 0 0 0 14 36z"/><path d="M24 26v10M20 30l4-4 4 4" stroke="#00c2ff"/>',
	'icon-code'      => '<rect x="5" y="9" width="38" height="30" rx="4"/><path d="M5 16h38"/><path d="M19 23l-5 5 5 5M29 23l5 5-5 5M26 21l-4 14" stroke="#00c2ff"/>',
	'icon-shield'    => '<path d="M24 5l15 6v10c0 10-6.5 18-15 22-8.5-4-15-12-15-22V11z"/><path d="M17 24l5 5 9-10" stroke="#00c2ff"/>',
	'icon-server'    => '<rect x="8" y="7" width="32" height="10" rx="2"/><rect x="8" y="19" width="32" height="10" rx="2"/><rect x="8" y="31" width="32" height="10" rx="2"/><path d="M14 12h.01M14 24h.01M14 36h.01M22 12h12M22 24h12M22 36h12" stroke="#00c2ff"/>',
	'icon-analytics' => '<path d="M6 42h36"/><rect x="10" y="26" width="6" height="12" rx="1"/><rect x="21" y="18" width="6" height="20" rx="1"/><rect x="32" y="10" width="6" height="28" rx="1"/><path d="M8 20l10-8 8 5 14-11" stroke="#00c2ff"/>',
	'icon-support'   => '<path d="M10 26v-4a14 14 0 0 1 28 0v4"/><rect x="6" y="25" width="8" height="12" rx="3"/><rect x="34" y="25" width="8" height="12" rx="3"/><path d="M38 37c0 4-4 6-10 6h-3" stroke="#00c2ff"/>',
	'icon-rocket'    => '<path d="M28 6c7 1 13 7 14 14l-12 12-14-14z"/><circle cx="31" cy="17" r="3" stroke="#00c2ff"/><path d="M16 18l-8 2-3 6 9 1M30 32l-2 8-6 3-1-9M12 36l-5 5" stroke="#00c2ff"/>',
	'icon-team'      => '<circle cx="18" cy="16" r="6"/><circle cx="33" cy="18" r="5" stroke="#00c2ff"/><path d="M6 40c0-7 5-12 12-12s12 5 12 12M30 28c7 0 12 4 12 11" stroke="#00c2ff"/>',
	'icon-phone'     => '<path d="M14 6h-4a3 3 0 0 0-3 3c0 18 14 32 32 32a3 3 0 0 0 3-3v-4l-8-4-4 4c-5-2-10-7-12-12l4-4z"/>',
	'icon-mail'      => '<rect x="5" y="10" width="38" height="28" rx="3"/><path d="M6 12l18 14 18-14" stroke="#00c2ff"/>',
	'icon-location'  => '<path d="M24 43s14-12 14-24a14 14 0 0 0-28 0c0 12 14 24 14 24z"/><circle cx="24" cy="19" r="5" stroke="#00c2ff"/>',
);

foreach ( $icons as $name => $body ) {
	file_put_contents( "$out/$name.svg", $wrap( $body ) );
	echo "wrote $name.svg\n";
}

$brands = array( 'Nexora', 'CloudPeak', 'Datavex', 'Quantix', 'Skyforge', 'Bytewave' );
foreach ( $brands as $i => $brand ) {
	$n    = $i + 1;
	$svg  = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 60" width="200" height="60">';
	$svg .= '<rect x="4" y="14" width="32" height="32" rx="' . ( $i % 2 ? 16 : 8 ) . '" fill="#2d5bff"/>';
	$svg .= '<path d="M12 30h16M20 22v16" stroke="#fff" stroke-width="4" stroke-linecap="round"/>';
	$svg .= '<text x="46" y="40" font-family="Barlow, Arial, sans-serif" font-size="24" font-weight="700" fill="#141d38">' . $brand . '</text></svg>';
	file_put_contents( "$out/brand-$n.svg", $svg );
	echo "wrote brand-$n.svg\n";
}
