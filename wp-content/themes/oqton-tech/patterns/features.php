<?php
/**
 * Title: Feature cards (overlapping hero)
 * Slug: oqton-tech/features
 * Categories: oqton, featured
 * Description: Three highlight cards that overlap the section above.
 */

$oqton_features = array(
	array( 'icon-rocket', 'Fast Delivery', 'Agile teams ship production-ready releases every sprint, not every quarter.' ),
	array( 'icon-shield', 'Secure by Design', 'Security reviews, hardening and monitoring are built into every project.' ),
	array( 'icon-support', '24/7 Expert Support', 'Certified engineers on call around the clock whenever you need help.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull" style="padding-top:0;padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"className":"oq-features","style":{"spacing":{"margin":{"top":"-80px"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns oq-features" style="margin-top:-80px">
<?php foreach ( $oqton_features as $oqton_f ) : ?>
<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"is-style-card-hover","style":{"spacing":{"padding":{"top":"2.25rem","bottom":"2.25rem","left":"2rem","right":"2rem"},"blockGap":"1rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group is-style-card-hover" style="padding-top:2.25rem;padding-right:2rem;padding-bottom:2.25rem;padding-left:2rem"><!-- wp:image {"width":"38px","height":"38px","sizeSlug":"full","linkDestination":"none","className":"oq-icon"} -->
<figure class="wp-block-image size-full is-resized oq-icon"><img src="<?php echo oqton_tech_img( $oqton_f[0] . '.svg' ); ?>" alt="" style="width:38px;height:38px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $oqton_f[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $oqton_f[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->
<?php endforeach; ?>
</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
