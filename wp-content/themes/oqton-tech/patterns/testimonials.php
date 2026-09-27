<?php
/**
 * Title: Testimonials
 * Slug: oqton-tech/testimonials
 * Categories: oqton, testimonials
 * Description: Three client quote cards with ratings.
 */

$oqton_quotes = array(
	array( 'avatar-1.jpg', 'Sarah Mitchell', 'COO, Nexora', 'Oqton moved our entire platform to the cloud without a minute of unplanned downtime. Their team felt like an extension of ours.' ),
	array( 'avatar-2.jpg', 'James Carter', 'CTO, Datavex', 'Clear communication, realistic estimates and a product our customers love. We have already started the next phase with them.' ),
	array( 'avatar-3.jpg', 'Lena Novak', 'IT Director, Skyforge', 'Their security assessment found issues two previous vendors missed. Monitoring has been rock solid ever since.' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">Testimonials</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">What Our Clients Say</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_quotes as $oqton_q ) : ?>
<!-- wp:group {"className":"is-style-card oq-quote","style":{"spacing":{"padding":{"top":"2.25rem","bottom":"2.25rem","left":"2rem","right":"2rem"},"blockGap":"1.25rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card oq-quote" style="padding-top:2.25rem;padding-right:2rem;padding-bottom:2.25rem;padding-left:2rem"><!-- wp:paragraph {"className":"oq-stars"} -->
<p class="oq-stars">★★★★★</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic"}}} -->
<p style="font-style:italic">“<?php echo esc_html( $oqton_q[3] ); ?>”</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"1rem"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"60px","height":"60px","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"oq-avatar"} -->
<figure class="wp-block-image size-full is-resized oq-avatar"><img src="<?php echo oqton_tech_img( $oqton_q[0] ); ?>" alt="<?php echo esc_attr( $oqton_q[1] ); ?>" style="object-fit:cover;width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo esc_html( $oqton_q[1] ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size"><?php echo esc_html( $oqton_q[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
