<?php
/**
 * Title: Contact details
 * Slug: oqton-tech/contact
 * Categories: oqton, contact
 * Description: Three contact cards plus a message prompt.
 */

$oqton_contacts = array(
	array( 'icon-location', 'Our Office', '120 Innovation Drive<br>Austin, TX 78701' ),
	array( 'icon-phone', 'Call Us', '<a href="tel:+15550100200">+1 (555) 010-0200</a><br>Mon – Fri, 9:00 – 18:00' ),
	array( 'icon-mail', 'Email Us', '<a href="mailto:hello@oqton.local">hello@oqton.local</a><br><a href="mailto:support@oqton.local">support@oqton.local</a>' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">Contact Us</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Let’s Build Something Great Together</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Tell us about your project and a solution architect will get back to you within one business day.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_contacts as $oqton_c ) : ?>
<!-- wp:group {"className":"is-style-card-hover","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"2rem","right":"2rem"},"blockGap":"1rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group is-style-card-hover" style="padding-top:2.5rem;padding-right:2rem;padding-bottom:2.5rem;padding-left:2rem"><!-- wp:image {"width":"38px","height":"38px","sizeSlug":"full","linkDestination":"none","className":"oq-icon"} -->
<figure class="wp-block-image size-full is-resized oq-icon"><img src="<?php echo oqton_tech_img( $oqton_c[0] . '.svg' ); ?>" alt="" style="width:38px;height:38px"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":3,"fontSize":"x-large"} -->
<h3 class="wp-block-heading has-text-align-center has-x-large-font-size"><?php echo esc_html( $oqton_c[1] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo wp_kses_post( $oqton_c[2] ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
