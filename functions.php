<?php
/**
 * Adnet Print functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adnet_print
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adnet_print_setup(): void {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Adnet Printing, use a find and replace
		* to change 'adnet-print' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adnet-print', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'adnet-print' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'adnet_print_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'adnet_print_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adnet_print_content_width(): void {
	$GLOBALS['content_width'] = apply_filters( 'adnet_print_content_width', 640 );
}
add_action( 'after_setup_theme', 'adnet_print_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adnet_print_widgets_init(): void {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adnet-print' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adnet-print' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adnet_print_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adnet_print_scripts(): void {
//	 wp_enqueue_style( 'adnet-print-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'adnet-print-style', 'rtl', 'replace' );
//	wp_enqueue_script( 'adnet-print-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main2.js', array(), _S_VERSION, true );

	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat', array(), _S_VERSION);
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css2?family=Poppins', array(), _S_VERSION);
	wp_enqueue_style( 'rubik', 'https://fonts.googleapis.com/css2?family=Rubik', array(), _S_VERSION);

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css', array(), _S_VERSION );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.bundle.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main-new2.css', array(), _S_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adnet_print_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// remove global css/svg
function adnet_print_wp_remove_global_css(): void {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'init', 'adnet_print_wp_remove_global_css' );



// on theme change
function ap_after_switch_theme_function(): void {
	$home = get_page_by_title( 'Home' );
	if(empty($home)){
		$page_meta = array(
			"post_name" => "home",
			"post_title" => "Home",
			"post_content" => "",
			"post_status" =>  "publish",
			"post_type" => "page",
			"page_template" => "full-width-page.php",
			'comment_status' => "closed",
			'ping_status'    => "closed"
		);
		wp_insert_post($page_meta);
		$home = get_page_by_title( 'Home' );
	}
	update_option( 'page_on_front', $home->ID );
	update_option( 'show_on_front', 'page' );

	$create_account_page = get_page_by_title( 'Create Account' );
	if(empty($create_account_page)) {
		$page_meta = array(
			"post_name" => "create-account",
			"post_title" => "Create Account",
			"post_content" => "[ap_signup_content]",
			"post_status" =>  "publish",
			"post_type" => "page",
			"page_template" => "full-width-page.php",
			'comment_status' => "closed",
			'ping_status'    => "closed"
		);
		wp_insert_post($page_meta);
	}
}
add_action( 'after_switch_theme', 'ap_after_switch_theme_function' );


// signup content
add_shortcode("ap_signup_content", "ap_get_signup_page_content");
function ap_get_signup_page_content(): void {
	if(is_user_logged_in() && !is_admin()){
		wp_redirect(get_permalink(wc_get_page_id("myaccount")));
		exit();
	}
	ob_start();
	require_once get_template_directory()."/woocommerce/myaccount/form-create-account.php";
	echo ob_get_clean();
}

function adnet_remove_sidebar(){
    return false;
}
add_filter( 'is_active_sidebar', "adnet_remove_sidebar", 10, 2 );





/*
 * Woocommerce setup
*/

// trim zero
add_filter('woocommerce_price_trim_zeros', '__return_true');

// rename tab
add_filter('woocommerce_product_tabs', 'ab_woo_rename_tabs', 98);
function ab_woo_rename_tabs($tabs): array
{
    $tabs['additional_information']['title'] = __('More Information');
    $tabs['reviews']['title'] = __('Review & Ratings');
    $tabs['description']['title'] = __('Product description');
    return $tabs;
}

// no. of related product to show
add_filter('woocommerce_output_related_products_args', 'ap_related_products_args', 20);
function ap_related_products_args($args)
{
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}

// replace add to cart to View product
add_filter('woocommerce_loop_add_to_cart_link', 'ap_replacing_add_to_cart_button', 10, 2);
function ap_replacing_add_to_cart_button($button, $product): string
{
    $button_text = __("View product", "woocommerce");
    return '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
}

// increase quantity + button
add_action('woocommerce_after_quantity_input_field', 'ap_cart_display_quantity_plus');
function ap_cart_display_quantity_plus(): void
{
    echo '<button type="button" class="cart-plus position-relative position-relative border border-2 bg-dark border-dark text-white rounded-1" style="width:26px;top:1px;"><span>+</span></button>';
}

// decrese quantity - button
add_action('woocommerce_before_quantity_input_field', 'ap_cart_display_quantity_minus');
function ap_cart_display_quantity_minus(): void
{
    echo '<button type="button" class="cart-minus position-relative border border-2 bg-dark border-dark text-white rounded-1" style="width:26px;top:1px;"><span>-</span></button>';
}

// add classes to checkout fields
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields');
function addBootstrapToCheckoutFields($fields): array
{
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // add the form-group class around the label and the input
            $field['class'][] = 'form-group';

            // add form-control to the actual input
            $field['input_class'][] = 'form-control p-2 rounded border border-2';
        }
    }
    return $fields;
}

// add classess to form field
add_filter('woocommerce_form_field_args', 'wc_form_field_args', 10, 3);
function wc_form_field_args($args, $key, $value)
{
    $args['input_class'] = array('form-control p-2 rounded border border-2 shadow-none bg-white');
    return $args;
}


// Add a custom coupon field before checkout payment section
add_action('woocommerce_review_order_before_payment', 'ap_woocommerce_checkout_coupon_form_custom');
function ap_woocommerce_checkout_coupon_form_custom(): void
{ ?>
    <div class="my-5">
        <p><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></p>
        <div class="coupon-form">
            <p class="form-row">
                <label for="coupon_code"
                       class="screen-reader-text"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
                <input type="text" name="coupon_code" class="input-text p-2 rounded border border-2"
                       placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" value=""
                       style="max-width: 300px"/>
            </p>
            <p class="form-row">
                <button type="button"
                        class="button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"
                        name="apply_coupon"
                        value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
            </p>
        </div>
    </div>
    <?php
}


// Display additional product fields
add_action('woocommerce_before_add_to_cart_button', 'display_additional_product_fields', 9);
function display_additional_product_fields(): void
{
    ?>
    <p class="form-row validate-required my-3" id="image">
        <label for="file_field"><?php echo __("Upload Design") . ': '; ?>
            <input type='file' name='image' accept='image/*' class="form-control w-75">
        </label>
    </p>
    <?php
}


// Add custom fields data as the cart item custom data
add_filter('woocommerce_add_cart_item_data', 'add_custom_fields_data_as_custom_cart_item_data', 10, 2);
function add_custom_fields_data_as_custom_cart_item_data($cart_item, $product_id)
{
    if (isset($_FILES['image']) && !empty($_FILES['image'])) {
        $upload = wp_upload_bits($_FILES['image']['name'], null, file_get_contents($_FILES['image']['tmp_name']));
        $filetype = wp_check_filetype(basename($upload['file']), null);
        $upload_dir = wp_upload_dir();
        $upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
        $base_name = basename($upload['file']);

        $cart_item['file_upload'] = array(
            'guid' => $upl_base_url . '/' . _wp_relative_upload_path($upload['file']), // Url
            'file_type' => $filetype['type'], // File type
            'file_name' => $base_name, // File name
            'title' => ucfirst(preg_replace('/\.[^.]+$/', '', $base_name)), // Title
        );
        $cart_item['unique_key'] = md5(microtime() . rand()); // Avoid merging items
    }
    return $cart_item;
}

// validate
function adNet_validate_add_cart_item($passed)
{
    if (!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        $passed = false;
        wc_add_notice("Please upload your design", "error");
    }
    return $passed;
}

add_filter('woocommerce_add_to_cart_validation', 'adNet_validate_add_cart_item', 10, 5);



// Save Image data as order item meta data
add_action('woocommerce_checkout_create_order_line_item', 'custom_field_update_order_item_meta', 20, 4);
function custom_field_update_order_item_meta($item, $cart_item_key, $values, $order): void
{
    if (isset($values['file_upload'])) {
        $item->update_meta_data('_img_file', $values['file_upload']);
    }
}

// Admin orders: Display a linked button + the link of the image file
add_action('woocommerce_after_order_itemmeta', 'backend_image_link_after_order_itemmeta', 10, 3);
function backend_image_link_after_order_itemmeta($item_id, $item, $product): void
{
    // Only in backend for order line items (avoiding errors)
    if (is_admin() && $item->is_type('line_item') && $file_data = $item->get_meta('_img_file')) {
        echo '<p><a href="' . $file_data['guid'] . '" target="_blank" class="button">' . __("Open Image") . '</a></p>'; // Optional
        echo '<p><code>' . $file_data['guid'] . '</code></p>'; // Optional
    }
}

// Admin new order email: Display a linked button + the link of the image file
add_action('woocommerce_email_after_order_table', 'wc_email_new_order_custom_meta_data', 10, 4);
function wc_email_new_order_custom_meta_data($order, $sent_to_admin, $plain_text, $email): void
{
    // On "new order" email notifications
    if ('new_order' === $email->id) {
        foreach ($order->get_items() as $item) {
            if ($file_data = $item->get_meta('_img_file')) {
                echo '<p>
                    <a href="' . $file_data['guid'] . '" target="_blank" class="button">' . __("Download Image") . '</a><br>
                    <pre><code style="font-size:12px; background-color:#eee; padding:5px;">' . $file_data['guid'] . '</code></pre>
                </p><br>';
            }
        }
    }
}

// remove added to cart message
add_filter('wc_add_to_cart_message_html', '__return_false');

/*
 * Woocommerce setup end
*/


// remove admin menus
function adnet_remove_menus(): void
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');

    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $role = (array)$user->roles;
        if (!empty($role) && trim($role[0]) == "shop_manager") {
            remove_menu_page('index.php');
            remove_menu_page('jetpack');
            remove_menu_page('themes.php');
        }
    }
}
add_action('admin_menu', 'adnet_remove_menus');
add_action('admin_head', 'adnet_admin_css');
function adnet_admin_css(): void
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        $role = (array)$user->roles;
        if (!empty($role) && trim($role[0]) == "shop_manager") {
            echo '<style>
                #wp-admin-bar-wp-logo,
                #toplevel_page_getwooplugins {
                    display: none;
                }
                </style>';
        }
    }
}


// allow SVG
function ap_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'ap_mime_types' );
