<?php
/**
 * Title: Services grid
 * Slug: oqton-tech/services
 * Categories: oqton, services
 * Description: Centered heading with six service cards.
 */

$oqton_services = array(
	array( 'icon-cloud', 'Cloud Solutions', 'Migration, architecture and cost optimisation on AWS, Azure and Google Cloud.' ),
	array( 'icon-code', 'Software Development', 'Custom web and mobile applications built with modern, maintainable stacks.' ),
	array( 'icon-shield', 'Cyber Security', 'Audits, penetration testing and managed detection to keep threats out.' ),
	array( 'icon-analytics', 'Data Analytics', 'Dashboards, pipelines and ML insights that turn data into decisions.' ),
	array( 'icon-server', 'Managed IT Services', 'Proactive infrastructure management, backups and patching handled for you.' ),
	array( 'icon-team', 'IT Consulting', 'Technology roadmaps and vendor selection aligned with your business goals.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"light","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">What We Do</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">IT Services Built Around Your Business</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_services as $oqton_s ) : ?>
<!-- wp:group {"className":"is-style-card-hover","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"2rem","right":"2rem"},"blockGap":"1rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-hover" style="padding-top:2.5rem;padding-right:2rem;padding-bottom:2.5rem;padding-left:2rem"><!-- wp:image {"width":"38px","height":"38px","sizeSlug":"full","linkDestination":"none","className":"oq-icon"} -->
<figure class="wp-block-image size-full is-resized oq-icon"><img src="<?php echo oqton_tech_img( $oqton_s[0] . '.svg' ); ?>" alt="" style="width:38px;height:38px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $oqton_s[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $oqton_s[2] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600","textTransform":"uppercase"}},"fontFamily":"heading","fontSize":"small"} -->
<p class="has-heading-font-family has-small-font-size" style="font-weight:600;text-transform:uppercase"><a href="/services/">Read More →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
