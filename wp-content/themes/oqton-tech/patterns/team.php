<?php
/**
 * Title: Team members
 * Slug: oqton-tech/team
 * Categories: oqton, team
 * Description: Four team member cards with social links.
 */

$oqton_team = array(
	array( 'team-1.jpg', 'Daniel Brooks', 'Chief Technology Officer' ),
	array( 'team-2.jpg', 'Priya Raman', 'Head of Cloud Engineering' ),
	array( 'team-3.jpg', 'Marco Silva', 'Security Lead' ),
	array( 'team-4.jpg', 'Aiko Tanaka', 'Product Designer' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"light","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">Our Team</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Meet the Experts Behind Oqton</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"15rem"}} -->
<div class="wp-block-group">
<?php foreach ( $oqton_team as $oqton_m ) : ?>
<!-- wp:group {"className":"is-style-card-hover oq-team","style":{"spacing":{"blockGap":"0","padding":{"bottom":"1.5rem"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-hover oq-team" style="padding-bottom:1.5rem"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo oqton_tech_img( $oqton_m[0] ); ?>" alt="<?php echo esc_attr( $oqton_m[1] ); ?>"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"top":"1.25rem"}}}} -->
<h4 class="wp-block-heading has-text-align-center" style="margin-top:1.25rem"><?php echo esc_html( $oqton_m[1] ); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size"><?php echo esc_html( $oqton_m[2] ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"primary","iconColorValue":"#2d5bff","size":"has-small-icon-size","className":"is-style-logos-only","style":{"spacing":{"margin":{"top":"0.5rem"}}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only" style="margin-top:0.5rem"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /-->

<!-- wp:social-link {"url":"#","service":"github"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->
<?php endforeach; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
