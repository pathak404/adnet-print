<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
    <div class="auth-page bg-white">
        <div class="container text-center pt-4 pb-2 px-0 py-md-0">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <form method="post" class="woocommerce-ResetPassword lost_reset_password p-2 w-100">
                            <div class="text-start mb-4">
                                <h2 class="text-black">Forget password of your account</h2>
                            </div>

                            <p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
                                <input class="woocommerce-Input woocommerce-Input--text input-text p-2 rounded border border-info border-2"
                                       type="text"
                                       name="user_login" id="user_login" autocomplete="username"/>
                            </p>

                            <div class="clear"></div>

							<?php do_action( 'woocommerce_lostpassword_form' ); ?>

                            <p class="woocommerce-form-row form-row">
                                <input type="hidden" name="wc_reset_password" value="true"/>
                                <button type="submit"
                                        class="px-5 py-3 woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                                        value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
                            </p>

							<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

                        </form>
                    </div>

                </div>

                <div class="col-md-1"></div>


                <div class="col-12 col-md-6">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center pt-3 pb-5 py-md-0">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/auth/key.png' ?>"
                             alt="" class="img-fluid position-relative w-100 p-3 p-md-0" style="max-width: 580px">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
do_action( 'woocommerce_after_lost_password_form' );
