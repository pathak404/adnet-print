<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

    <div class="w-100 woocommerce-tabs wc-tabs-wrapper">

        <div class="accordion accordion-flush" id="productTabs">
			<?php
                $counter = 1;
                foreach ( $product_tabs as $key => $product_tab ) :
                    $uniqueCode = bin2hex( random_bytes( 2 ) );
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading-<?php echo $uniqueCode; ?>">
                        <button class="accordion-button <?php echo $counter == 1 ? "" : "collapsed" ?>" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $uniqueCode; ?>"
                                aria-expanded="<?php echo $counter == 1 ? "true" : "false" ?>"
                                aria-controls="flush-collapse-<?php echo $uniqueCode; ?>">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                        </button>
                    </h2>

                    <div id="flush-collapse-<?php echo $uniqueCode; ?>" class="accordion-collapse collapse <?php echo $counter == 1 ? "show" : "" ?>"
                         aria-labelledby="flush-heading-<?php echo $uniqueCode; ?>"
                         data-bs-parent="#productTabs">
                        <div class="accordion-body">
							<?php
							if ( isset( $product_tab['callback'] ) ) {
								call_user_func( $product_tab['callback'], $key, $product_tab );
							}
							?>
                        </div>
                    </div>
                </div>
			<?php
                $counter++;
                endforeach;
            ?>
        </div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
    </div>

<?php endif; ?>
