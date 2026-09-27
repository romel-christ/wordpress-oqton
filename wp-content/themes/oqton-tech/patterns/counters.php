<?php
/**
 * Title: Counters band
 * Slug: oqton-tech/counters
 * Categories: oqton, featured
 * Description: Brand gradient band with four animated statistics.
 */

$oqton_stats = array(
	array( '250+', 'Projects Delivered' ),
	array( '180+', 'Happy Clients' ),
	array( '45+', 'Expert Engineers' ),
	array( '98%', 'Client Retention' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"gradient":"brand","textColor":"white","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-white-color has-brand-gradient-background has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"className":"oq-counters","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"12rem"}} -->
<div class="wp-block-group oq-counters">
<?php foreach ( $oqton_stats as $oqton_stat ) : ?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0.25rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"className":"oq-counter-num","textColor":"white","fontSize":"huge"} -->
<h3 class="wp-block-heading has-text-align-center oq-counter-num has-white-color has-text-color has-huge-font-size"><?php echo esc_html( $oqton_stat[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500"}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size" style="font-weight:500"><?php echo esc_html( $oqton_stat[1] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
