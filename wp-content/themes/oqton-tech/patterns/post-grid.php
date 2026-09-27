<?php
/**
 * Title: Post grid (main query)
 * Slug: oqton-tech/post-grid
 * Categories: oqton, query
 * Inserter: no
 * Description: Card grid bound to the main query, used by index/archive/search templates.
 */
?>
<!-- wp:query {"queryId":1,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"className":"oq-blog"} -->
<div class="wp-block-query oq-blog"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"19rem"}} -->
<!-- wp:group {"className":"is-style-card-hover","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-card-hover"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.75rem","left":"1.75rem","right":"1.75rem"},"blockGap":"0.75rem"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:1.5rem;padding-right:1.75rem;padding-bottom:1.75rem;padding-left:1.75rem"><!-- wp:post-date {"fontSize":"small"} /-->

<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"large"} /-->

<!-- wp:post-excerpt {"moreText":"Read More →","excerptLength":18} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Nothing found. Try another search.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
