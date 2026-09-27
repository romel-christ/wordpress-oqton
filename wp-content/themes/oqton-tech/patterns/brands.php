<?php
/**
 * Title: Partner logos
 * Slug: oqton-tech/brands
 * Categories: oqton, gallery
 * Description: Row of partner / client logos.
 */
?>
<!-- wp:group {"align":"full","className":"oq-brands","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"var:preset|color|border","width":"1px"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group alignfull oq-brands" style="border-top-color:var(--wp--preset--color--border);border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","minimumColumnWidth":"10rem"}} -->
<div class="wp-block-group">
<?php for ( $oqton_n = 1; $oqton_n <= 6; $oqton_n++ ) : ?>
<!-- wp:image {"width":"160px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="<?php echo oqton_tech_img( 'brand-' . $oqton_n . '.svg' ); ?>" alt="Partner logo <?php echo (int) $oqton_n; ?>" style="width:160px"/></figure>
<!-- /wp:image -->
<?php endfor; ?>
</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
