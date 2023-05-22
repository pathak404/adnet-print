<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( $product->is_type( 'variable' ) ) {
	$percentages = array();

	// Get all variation prices
	$prices = $product->get_variation_prices();

	// Loop through variation prices
	foreach ( $prices['price'] as $key => $price ) {
		// Only on sale variations
		if ( $prices['regular_price'][ $key ] !== $price ) {
			// Calculate and set in the array the percentage for each variation on sale
			$percentages[] = round( 100 - ( floatval( $prices['sale_price'][ $key ] ) / floatval( $prices['regular_price'][ $key ] ) * 100 ) );
		}
	}
	// We keep the highest value
	$percentage = max( $percentages ) . '%';

} elseif ( $product->is_type( 'grouped' ) ) {
	$percentages = array();

	// Get all variation prices
	$children_ids = $product->get_children();

	// Loop through variation prices
	foreach ( $children_ids as $child_id ) {
		$child_product = wc_get_product( $child_id );

		$regular_price = (float) $child_product->get_regular_price();
		$sale_price    = (float) $child_product->get_sale_price();

		if ( $sale_price != 0 || ! empty( $sale_price ) ) {
			// Calculate and set in the array the percentage for each child on sale
			$percentages[] = round( 100 - ( $sale_price / $regular_price * 100 ) );
		}
	}
	// We keep the highest value
	$percentage = max( $percentages ) . '%';

} else {
	$regular_price = (float) $product->get_regular_price();
	$sale_price    = (float) $product->get_sale_price();

	if ( $sale_price != 0 || ! empty( $sale_price ) ) {
		$percentage = round( 100 - ( $sale_price / $regular_price * 100 ) ) . '%';
	} else {
		$percentage = null;
	}
}
?>

<p class="price-wrapper mb-1">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-1 d-inline-flex">
	<?php echo $product->get_price_html(); ?>
</p>
<span class="discount-percentage"><?php echo $percentage ?> OFF</span>
</p>

