<?php
/**
 * Title: FAQ
 * Slug: oqton-tech/faq
 * Categories: oqton, text
 * Description: Frequently asked questions using collapsible details blocks.
 */

$oqton_faqs = array(
	array( 'How quickly can you start a new project?', 'Most engagements kick off within two weeks of signing. Urgent support work can start within 48 hours.' ),
	array( 'Do you work with our existing IT team?', 'Yes. We regularly augment in-house teams, sharing tooling, documentation and on-call rotations.' ),
	array( 'Which cloud providers do you support?', 'We are certified on AWS, Microsoft Azure and Google Cloud, and also support hybrid and on-prem setups.' ),
	array( 'Can we change plans later?', 'Absolutely. Plans are month-to-month and you can scale up or down as your needs change.' ),
);
?>
<!-- wp:group {"align":"full","className":"oq-faq","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","contentSize":"860px"}} -->
<div class="wp-block-group alignfull oq-faq" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">FAQ</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)">Frequently Asked Questions</h2>
<!-- /wp:heading -->

<?php foreach ( $oqton_faqs as $oqton_i => $oqton_faq ) : ?>
<!-- wp:details<?php echo 0 === $oqton_i ? ' {"showContent":true}' : ''; ?> -->
<details class="wp-block-details"<?php echo 0 === $oqton_i ? ' open' : ''; ?>><summary><?php echo esc_html( $oqton_faq[0] ); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html( $oqton_faq[1] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details -->

<?php endforeach; ?>
</div>
<!-- /wp:group -->
