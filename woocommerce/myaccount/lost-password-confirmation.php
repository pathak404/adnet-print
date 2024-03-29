<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );
?>

<?php do_action( 'woocommerce_before_lost_password_confirmation_message' ); ?>
<div class="auth-page bg-white">
    <div class="container text-center pt-4 pb-2 px-0 py-md-0">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                    <div class="text-start mb-2">
                        <h2>Mail will arrive soon...</h2>
                    </div>
                    <p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset and also check the spam section.', 'woocommerce' ) ) ); ?></p>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-md-6">
                <div class="w-100 h-100 d-flex align-items-center justify-content-center pt-3 pb-5 py-md-0">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/auth/mail.png' ?>"
                         alt="" class="img-fluid position-relative w-100 p-3 p-md-0" style="max-width: 580px">
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action( 'woocommerce_after_lost_password_confirmation_message' ); ?>