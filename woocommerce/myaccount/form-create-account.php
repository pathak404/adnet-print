<?php

/**
 * Create Account Form
 *
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$redirect_url = isset($_GET["redirect_to"]) && !empty($_GET["redirect_to"]) ? wp_sanitize_redirect($_GET["redirect_to"]) : "/";
?>
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="auth-page bg-white">
    <div class="container text-center pt-4 pb-2 px-0 py-md-0">
        <div class="row">
            <div class="col-12 col-md-5">
                <!--create account -->
                <div class="w-100 h-100 d-flex align-items-center justify-content-center" id="customer_login">
                    <form method="post" class="woocommerce-form woocommerce-form-register register p-2 w-100" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                        <div class="text-start mb-4">
                            <h2 class="text-black">Create account to manage your orders</h2>
                        </div>
						<?php do_action( 'woocommerce_register_form_start' ); ?>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>

                                </label>
                                <input type="text"
                                       class="woocommerce-Input woocommerce-Input--text input-text p-2 rounded border border-gray border-2"
                                       name="username" id="reg_username" autocomplete="username"
                                       value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                            </p>

						<?php endif; ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>
                                &nbsp;
                            </label>
                            <input type="email"
                                   class="woocommerce-Input woocommerce-Input--text input-text p-2 rounded border border-gray border-2"
                                   name="email" id="reg_email" autocomplete="email"
                                   value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>
                                    &nbsp;
                                </label>
                                <input type="password"
                                       class="woocommerce-Input woocommerce-Input--text input-text p-2 rounded border border-gray border-2"
                                       name="password" id="reg_password" autocomplete="new-password"/>
                            </p>

						<?php else : ?>

                            <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>

						<?php endif; ?>
                        <div class="small">
						    <?php do_action( 'woocommerce_register_form' ); ?>
                        </div>

                        <p class="woocommerce-form-row form-row">
                            <input type="hidden" name="redirect" value="<?php esc_html_e($redirect_url) ?>">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                            <button type="submit"
                                    class="px-5 py-3 border-0 woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit"
                                    name="register"
                                    value="<?php esc_attr_e( 'Create account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create account', 'woocommerce' ); ?></button>
                        </p>

						<?php do_action( 'woocommerce_register_form_end' ); ?>

                    </form>
                </div>


				<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
            </div>

            <div class="col-md-1"></div>

            <div class="col-12 col-md-6">
                <div class="w-100 h-100 d-flex align-items-center justify-content-center pt-3 pb-5 py-md-0">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/auth/DrawKit-Vector-Illustration-ecommerce-02.png' ?>"
                         alt="" class="img-fluid position-relative w-100 p-3 p-md-0" style="max-width: 580px">
                </div>
            </div>
        </div>
    </div>
</div>


