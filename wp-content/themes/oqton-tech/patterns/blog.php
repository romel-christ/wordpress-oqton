<?php
/**
 * Title: Latest news
 * Slug: oqton-tech/blog
 * Categories: oqton, query
 * Description: Section heading with the three most recent posts.
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"backgroundColor":"light","layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull has-light-background-color has-background" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"style":{"spacing":{"blockGap":"0.75rem","margin":{"bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--60)"><!-- wp:paragraph {"align":"center","className":"is-style-eyebrow"} -->
<p class="has-text-align-center is-style-eyebrow">News &amp; Insights</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Latest From Our Blog</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":7,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"className":"oq-blog"} -->
<div class="wp-block-query oq-blog"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"19rem"}} -->
<!-- wp:group {"className":"is-style-card-hover","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-hover"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.75rem","left":"1.75rem","right":"1.75rem"},"blockGap":"0.75rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.75rem;padding-bottom:1.75rem;padding-left:1.75rem"><!-- wp:post-date {"fontSize":"small"} /-->

<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"large"} /-->

<!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":18} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
