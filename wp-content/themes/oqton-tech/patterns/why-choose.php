<?php
/**
 * Title: Why choose us
 * Slug: oqton-tech/why-choose
 * Categories: oqton, featured
 * Description: Copy with four benefit items and a supporting image.
 */

$oqton_benefits = array(
	array( 'icon-rocket', 'Faster Time to Market', 'Reusable accelerators and CI/CD pipelines cut delivery time.' ),
	array( 'icon-shield', 'Enterprise-grade Security', 'ISO 27001-aligned practices protect your data end to end.' ),
	array( 'icon-analytics', 'Measurable Results', 'Every engagement is tied to clear KPIs and monthly reporting.' ),
	array( 'icon-support', 'Dedicated Support', 'A named account team and SLA-backed response times.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"is-style-eyebrow"} -->
<p class="is-style-eyebrow">Why Choose Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Technology Partner You Can Rely On</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We combine deep engineering skill with a practical, business-first approach. The result: systems that scale, stay secure and keep costs predictable.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
<?php foreach ( $oqton_benefits as $oqton_b ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"38px","height":"38px","sizeSlug":"full","linkDestination":"none","className":"oq-icon"} -->
<figure class="wp-block-image size-full is-resized oq-icon"><img src="<?php echo oqton_tech_img( $oqton_b[0] . '.svg' ); ?>" alt="" style="width:38px;height:38px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0.35rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo esc_html( $oqton_b[1] ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php echo esc_html( $oqton_b[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"12px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo oqton_tech_img( 'about-2.jpg' ); ?>" alt="Cloud infrastructure illustration" style="border-radius:12px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
