<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$thumbnail_id = $product->get_image_id();
if(!empty($attachment_ids)){
    $attachment_ids = array_diff($attachment_ids, [$thumbnail_id]);
    array_unshift($attachment_ids, $thumbnail_id);
}

?>


<div class="d-flex align-items-center pb-4 mb-1 mt-sm-2">
	<?php if ( ! empty( $attachment_ids ) ): ?>
        <div class="ProductSwiper-wrapper mx-3 my-5 d-none d-sm-block">
            <div class="ProductSwiper-button-prev swiper-button-prev"></div>
            <div class="swiper ProductSwiper">
                <div class="swiper-wrapper">
					<?php
					foreach ( $attachment_ids as $attachment_id ) :
						$image_link = wp_get_attachment_url( $attachment_id );
						?>
                        <div class="swiper-slide"><img src="<?php esc_html_e( $image_link ) ?>"></div>
					<?php endforeach; ?>
                </div>
            </div>
            <div class="ProductSwiper-button-next swiper-button-next"></div>
        </div>
	<?php endif; ?>

    <div class="product-img d-none d-sm-block" style="width: 100%;height: 510px;">
        <img src="<?php esc_html_e( wp_get_attachment_url( $thumbnail_id ) ); ?>" alt=""
             style="width: 100%;height: 100%;">
    </div>

    <!-- for mobile -->
    <div class="ProductSwiper-mobile-wrapper w-100 d-flex align-items-center position-relative d-sm-none">
        <div class="swiper ProductSwiper-mobile">
            <div class="swiper-wrapper">
				<?php
				foreach ( $attachment_ids as $attachment_id ) :
					$image_link = wp_get_attachment_url( $attachment_id );
					?>
                    <div class="swiper-slide"><img src="<?php esc_html_e( $image_link ) ?>"></div>
				<?php endforeach; ?>
            </div>
        </div>
        <div class="swiper-pagination ProductSwiper-mobile-pagination"></div>
    </div>
</div>

