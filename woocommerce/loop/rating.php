<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average_rating      = $product->get_average_rating();

$average_rating = $average_rating + 0;


if ( $rating_count > 0 ) : ?>
<p class="product-rating mb-0 px-2 small position-absolute top-0 py-1" style="width: fit-content;height: fit-content">
            <i class="bi bi-star-fill" style="padding-right: 2px;font-size: 14px;"></i>
            <?php echo $average_rating ?>
        </p>
<?php endif;

// echo wc_get_rating_html( $product->get_average_rating() ); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
