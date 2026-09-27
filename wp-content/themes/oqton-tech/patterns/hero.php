<?php
/**
 * Title: Hero banner
 * Slug: oqton-tech/hero
 * Categories: oqton, banner
 * Description: Full-width dark hero with headline, buttons and dashboard illustration.
 */
?>
<!-- wp:cover {"url":"<?php echo oqton_tech_img( 'hero-bg.jpg' ); ?>","dimRatio":30,"overlayColor":"navy","minHeight":760,"align":"full","className":"oq-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-cover alignfull oq-hero" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70);min-height:760px"><span aria-hidden="true" class="wp-block-cover__background has-navy-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo oqton_tech_img( 'hero-bg.jpg' ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"className":"is-style-eyebrow","style":{"color":{"text":"#7fd9ff"}}} -->
<p class="is-style-eyebrow has-text-color" style="color:#7fd9ff">IT Solutions &amp; Technology</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"textColor":"white","fontSize":"huge"} -->
<h1 class="wp-block-heading has-white-color has-text-color has-huge-font-size">Smart Technology Solutions for Growing Business</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#c8cfe4"}},"fontSize":"large"} -->
<p class="has-text-color has-large-font-size" style="color:#c8cfe4">We help companies modernise with secure cloud platforms, custom software and around-the-clock IT support — so your team can focus on what matters.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/services/">Our Services</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline-light"} -->
<div class="wp-block-button is-style-outline-light"><a class="wp-block-button__link wp-element-button" href="/about/">Discover More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"16px"}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo oqton_tech_img( 'hero-device.jpg' ); ?>" alt="Analytics dashboard illustration" style="border-radius:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover -->
