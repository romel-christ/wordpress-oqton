<?php
/**
 * Generates original placeholder artwork for the oqton-tech theme (PHP GD).
 * Usage: php tools/generate-images.php
 * Replace the output files with real photography whenever available (keep names).
 */

$out = __DIR__ . '/../wp-content/themes/oqton-tech/assets/images';
if ( ! is_dir( $out ) ) {
	mkdir( $out, 0777, true );
}
mt_srand( 42 );

function hex( $im, $hex, $alpha = 0 ) {
	$hex = ltrim( $hex, '#' );
	return imagecolorallocatealpha( $im, hexdec( substr( $hex, 0, 2 ) ), hexdec( substr( $hex, 2, 2 ) ), hexdec( substr( $hex, 4, 2 ) ), $alpha );
}

function gradient( $im, $w, $h, $from, $to, $diagonal = true ) {
	$f = sscanf( ltrim( $from, '#' ), '%02x%02x%02x' );
	$t = sscanf( ltrim( $to, '#' ), '%02x%02x%02x' );
	$steps = $diagonal ? $w + $h : $h;
	for ( $i = 0; $i < $steps; $i++ ) {
		$p = $i / max( 1, $steps - 1 );
		$c = imagecolorallocate( $im, (int) ( $f[0] + ( $t[0] - $f[0] ) * $p ), (int) ( $f[1] + ( $t[1] - $f[1] ) * $p ), (int) ( $f[2] + ( $t[2] - $f[2] ) * $p ) );
		if ( $diagonal ) {
			imageline( $im, $i, 0, $i - $h, $h, $c );
		} else {
			imageline( $im, 0, $i, $w, $i, $c );
		}
	}
}

function network( $im, $w, $h, $nodes, $color, $dot ) {
	$pts = array();
	for ( $i = 0; $i < $nodes; $i++ ) {
		$pts[] = array( mt_rand( 0, $w ), mt_rand( 0, $h ) );
	}
	imagesetthickness( $im, 1 );
	foreach ( $pts as $i => $a ) {
		foreach ( $pts as $j => $b ) {
			if ( $j <= $i ) {
				continue;
			}
			if ( hypot( $a[0] - $b[0], $a[1] - $b[1] ) < min( $w, $h ) / 3.2 ) {
				imageline( $im, $a[0], $a[1], $b[0], $b[1], $color );
			}
		}
	}
	foreach ( $pts as $p ) {
		$r = mt_rand( 4, 9 );
		imagefilledellipse( $im, $p[0], $p[1], $r, $r, $dot );
	}
}

function dots( $im, $x, $y, $cols, $rows, $gap, $color ) {
	for ( $i = 0; $i < $cols; $i++ ) {
		for ( $j = 0; $j < $rows; $j++ ) {
			imagefilledellipse( $im, $x + $i * $gap, $y + $j * $gap, 5, 5, $color );
		}
	}
}

function rrect( $im, $x1, $y1, $x2, $y2, $r, $color ) {
	imagefilledrectangle( $im, $x1 + $r, $y1, $x2 - $r, $y2, $color );
	imagefilledrectangle( $im, $x1, $y1 + $r, $x2, $y2 - $r, $color );
	imagefilledellipse( $im, $x1 + $r, $y1 + $r, $r * 2, $r * 2, $color );
	imagefilledellipse( $im, $x2 - $r, $y1 + $r, $r * 2, $r * 2, $color );
	imagefilledellipse( $im, $x1 + $r, $y2 - $r, $r * 2, $r * 2, $color );
	imagefilledellipse( $im, $x2 - $r, $y2 - $r, $r * 2, $r * 2, $color );
}

/** Laptop / dashboard illustration. */
function device( $im, $cx, $cy, $s, $accent ) {
	$w = (int) ( 420 * $s );
	$h = (int) ( 260 * $s );
	$x = $cx - $w / 2;
	$y = $cy - $h / 2;
	rrect( $im, $x - 14 * $s, $y - 14 * $s, $x + $w + 14 * $s, $y + $h + 14 * $s, (int) ( 14 * $s ), hex( $im, '141d38' ) );
	imagefilledrectangle( $im, $x, $y, $x + $w, $y + $h, hex( $im, 'f2f5fd' ) );
	imagefilledrectangle( $im, $x, $y, $x + $w, $y + 26 * $s, hex( $im, 'e3e7f1' ) );
	foreach ( array( 'ff5f57', 'febc2e', '28c840' ) as $i => $c ) {
		imagefilledellipse( $im, $x + ( 16 + $i * 16 ) * $s, $y + 13 * $s, 9 * $s, 9 * $s, hex( $im, $c ) );
	}
	// Sidebar + bars.
	imagefilledrectangle( $im, $x, $y + 26 * $s, $x + 80 * $s, $y + $h, hex( $im, '0b1532' ) );
	for ( $i = 0; $i < 6; $i++ ) {
		imagefilledrectangle( $im, $x + 14 * $s, $y + ( 46 + $i * 26 ) * $s, $x + 64 * $s, $y + ( 52 + $i * 26 ) * $s, hex( $im, '3a4670' ) );
	}
	$base = $y + $h - 24 * $s;
	for ( $i = 0; $i < 9; $i++ ) {
		$bh = mt_rand( 40, 150 ) * $s;
		$bx = $x + ( 104 + $i * 32 ) * $s;
		imagefilledrectangle( $im, $bx, $base - $bh, $bx + 18 * $s, $base, $i % 3 ? hex( $im, $accent ) : hex( $im, '00c2ff' ) );
	}
	// Base of laptop.
	rrect( $im, $x - 60 * $s, $y + $h + 14 * $s, $x + $w + 60 * $s, $y + $h + 34 * $s, (int) ( 8 * $s ), hex( $im, 'c9d0e2' ) );
}

/** Abstract person silhouette for team / avatar placeholders. */
function person( $im, $w, $h, $shirt ) {
	$skin = hex( $im, 'f1c7a5' );
	$cx = (int) ( $w / 2 );
	imagefilledellipse( $im, $cx, (int) ( $h * 0.98 ), (int) ( $w * 0.9 ), (int) ( $h * 0.75 ), hex( $im, $shirt ) );
	imagefilledrectangle( $im, $cx - (int) ( $w * 0.06 ), (int) ( $h * 0.5 ), $cx + (int) ( $w * 0.06 ), (int) ( $h * 0.64 ), $skin );
	imagefilledellipse( $im, $cx, (int) ( $h * 0.4 ), (int) ( $w * 0.34 ), (int) ( $h * 0.3 ), $skin );
	imagefilledarc( $im, $cx, (int) ( $h * 0.36 ), (int) ( $w * 0.36 ), (int) ( $h * 0.26 ), 180, 360, hex( $im, '2b2f3a' ), IMG_ARC_PIE );
}

function save( $im, $name ) {
	global $out;
	imagejpeg( $im, "$out/$name", 84 );
	imagedestroy( $im );
	echo "wrote $name\n";
}

$accents = array( '2d5bff', '00c2ff', '6a4cff', '1ec9a0', 'ff7a45', '2d5bff' );

// Hero background.
$im = imagecreatetruecolor( 1920, 960 );
gradient( $im, 1920, 960, '0b1532', '13265e' );
network( $im, 1920, 960, 60, hex( $im, '2d5bff', 95 ), hex( $im, '00c2ff', 40 ) );
dots( $im, 1500, 120, 10, 6, 26, hex( $im, 'ffffff', 100 ) );
save( $im, 'hero-bg.jpg' );

// Hero illustration (dashboard device).
$im = imagecreatetruecolor( 900, 700 );
gradient( $im, 900, 700, '16296a', '0b1532' );
imagefilledellipse( $im, 450, 360, 640, 640, hex( $im, '2d5bff', 90 ) );
device( $im, 450, 330, 1.45, '2d5bff' );
save( $im, 'hero-device.jpg' );

// Inner page banner & CTA background.
$im = imagecreatetruecolor( 1920, 520 );
gradient( $im, 1920, 520, '0b1532', '1a2f75' );
network( $im, 1920, 520, 40, hex( $im, '00c2ff', 100 ), hex( $im, '2d5bff', 50 ) );
save( $im, 'page-banner.jpg' );

$im = imagecreatetruecolor( 1920, 600 );
gradient( $im, 1920, 600, '2d5bff', '00a6e0' );
network( $im, 1920, 600, 36, hex( $im, 'ffffff', 105 ), hex( $im, 'ffffff', 80 ) );
save( $im, 'cta-bg.jpg' );

// About images.
$im = imagecreatetruecolor( 720, 820 );
gradient( $im, 720, 820, 'dfe7ff', 'f2f5fd' );
dots( $im, 40, 40, 8, 8, 24, hex( $im, '2d5bff', 90 ) );
imagefilledellipse( $im, 520, 620, 420, 420, hex( $im, '00c2ff', 105 ) );
device( $im, 360, 430, 1.25, '2d5bff' );
save( $im, 'about-1.jpg' );

$im = imagecreatetruecolor( 720, 560 );
gradient( $im, 720, 560, '0b1532', '233a8a' );
network( $im, 720, 560, 22, hex( $im, '00c2ff', 90 ), hex( $im, 'ffffff', 60 ) );
device( $im, 360, 270, 1.0, '00c2ff' );
save( $im, 'about-2.jpg' );

// Projects & blog.
$labels = array( 'project', 'blog' );
foreach ( array( 'project' => 6, 'blog' => 3 ) as $kind => $count ) {
	for ( $n = 1; $n <= $count; $n++ ) {
		$a = $accents[ ( $n - 1 ) % count( $accents ) ];
		$im = imagecreatetruecolor( 900, 640 );
		gradient( $im, 900, 640, $n % 2 ? '0b1532' : '1a2f75', $a );
		network( $im, 900, 640, 18, hex( $im, 'ffffff', 105 ), hex( $im, 'ffffff', 70 ) );
		device( $im, 450, 300, 1.2, $a );
		save( $im, "$kind-$n.jpg" );
	}
}

// Team & avatars.
$shirts = array( '2d5bff', '141d38', '1ec9a0', '6a4cff' );
for ( $n = 1; $n <= 4; $n++ ) {
	$im = imagecreatetruecolor( 600, 680 );
	gradient( $im, 600, 680, 'e8edfb', 'cfd9f7', false );
	dots( $im, 30, 30, 5, 5, 22, hex( $im, '2d5bff', 95 ) );
	person( $im, 600, 680, $shirts[ $n - 1 ] );
	save( $im, "team-$n.jpg" );
}
for ( $n = 1; $n <= 3; $n++ ) {
	$im = imagecreatetruecolor( 160, 160 );
	gradient( $im, 160, 160, 'dfe7ff', 'b9c8f5', false );
	person( $im, 160, 160, $shirts[ $n ] );
	save( $im, "avatar-$n.jpg" );
}

echo "done\n";
