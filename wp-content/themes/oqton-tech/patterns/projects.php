<?php
/**
 * Title: Projects showcase
 * Slug: oqton-tech/projects
 * Categories: oqton, portfolio
 * Description: Grid of recent projects with hover info panels.
 */

$oqton_projects = array(
	array( 'project-1.jpg', 'Cloud Migration', 'FinTech Platform' ),
	array( 'project-2.jpg', 'Web Development', 'Retail Commerce Suite' ),
	array( 'project-3.jpg', 'Cyber Security', 'Healthcare SOC Rollout' ),
	array( 'project-4.jpg', 'Data Analytics', 'Logistics Insights Hub' ),
	array( 'project-5.jpg', 'Mobile Apps', 'Field Service App' ),
	array( 'project-6.jpg', 'Managed IT', 'Education Network Upgrade' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"navy","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-navy-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-eyebrow","style":{"color":{"text":"#7fd9ff"}}} -->
<p class="is-style-eyebrow has-text-color" style="color:#7fd9ff">Recent Projects</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"white"} -->
<h2 class="wp-block-heading has-white-color has-text-color">Our Latest Case Studies</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-light"} -->
<div class="wp-block-button is-style-outline-light"><a class="wp-block-button__link wp-element-button" href="/projects/">View All Projects</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_projects as $oqton_p ) : ?>
<!-- wp:group {"className":"oq-project","layout":{"type":"default"}} -->
<div class="wp-block-group oq-project"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo oqton_tech_img( $oqton_p[0] ); ?>" alt="<?php echo esc_attr( $oqton_p[2] ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"oq-project-info","style":{"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"1.25rem","right":"1.25rem"},"blockGap":"0.2rem"}},"backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group oq-project-info has-white-background-color has-background" style="padding-top:1rem;padding-right:1.25rem;padding-bottom:1rem;padding-left:1.25rem"><!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><?php echo esc_html( $oqton_p[1] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo esc_html( $oqton_p[2] ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
