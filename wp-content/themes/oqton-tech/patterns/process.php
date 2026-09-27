<?php
/**
 * Title: Work process
 * Slug: oqton-tech/process
 * Categories: oqton, featured
 * Description: Four numbered steps describing the delivery process.
 */

$oqton_steps = array(
	array( '01', 'Discovery', 'Workshops to understand your goals, users and constraints.' ),
	array( '02', 'Planning', 'Architecture, roadmap and estimates you can hold us to.' ),
	array( '03', 'Execution', 'Agile sprints with demos, QA and security built in.' ),
	array( '04', 'Support', 'Launch, monitor and continuously improve after go-live.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">How We Work</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">A Simple, Proven Process</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_steps as $oqton_step ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"className":"oq-step-num","fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center oq-step-num has-large-font-size"><?php echo esc_html( $oqton_step[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":4} -->
<h4 class="wp-block-heading has-text-align-center"><?php echo esc_html( $oqton_step[1] ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html( $oqton_step[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
