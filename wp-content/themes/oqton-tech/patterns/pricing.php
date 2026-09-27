<?php
/**
 * Title: Pricing plans
 * Slug: oqton-tech/pricing
 * Categories: oqton, call-to-action
 * Description: Three pricing tables with a highlighted plan.
 */

$oqton_plans = array(
	array( 'Starter', '499', 'For small teams getting started.', array( 'Up to 10 users', 'Helpdesk support (business hours)', 'Monthly health check', 'Cloud backup 100 GB' ), false ),
	array( 'Business', '1,299', 'Our most popular managed plan.', array( 'Up to 50 users', '24/7 helpdesk & monitoring', 'Security patching', 'Cloud backup 1 TB' ), true ),
	array( 'Enterprise', '2,999', 'For complex, regulated environments.', array( 'Unlimited users', 'Dedicated account team', 'SOC & incident response', 'Custom SLAs' ), false ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"light","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">Pricing Plans</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Simple Plans for Every Stage</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group">
<?php
foreach ( $oqton_plans as $oqton_plan ) :
	$oqton_cls = 'is-style-card-hover' . ( $oqton_plan[4] ? ' oq-price-featured' : '' );
	?>
<!-- wp:group {"className":"<?php echo esc_attr( $oqton_cls ); ?>","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"2.25rem","right":"2.25rem"},"blockGap":"1rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group <?php echo esc_attr( $oqton_cls ); ?>" style="padding-top:2.5rem;padding-right:2.25rem;padding-bottom:2.5rem;padding-left:2.25rem"><!-- wp:heading {"level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-x-large-font-size"><?php echo esc_html( $oqton_plan[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $oqton_plan[2] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4,"className":"oq-price","fontSize":"xx-large"} -->
<h4 class="wp-block-heading oq-price has-xx-large-font-size">$<?php echo esc_html( $oqton_plan[1] ); ?><small>/month</small></h4>
<!-- /wp:heading -->

<!-- wp:list {"className":"is-style-checklist"} -->
<ul class="wp-block-list is-style-checklist">
	<?php foreach ( $oqton_plan[3] as $oqton_item ) : ?>
<!-- wp:list-item -->
<li><?php echo esc_html( $oqton_item ); ?></li>
<!-- /wp:list-item -->
	<?php endforeach; ?>
</ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="/contact/">Choose Plan</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
