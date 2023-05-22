<?php
/**
 * The header for our theme
 *
 * This is the template that displays all the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adnet_Printing
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!--page-->
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#primary"><?php esc_html_e( 'Skip to content', 'adnet-printing' ); ?></a>

    <!--Header-->
    <header class="site-header position-relative top-0 bg-white border-bottom" id="masthead">
		<?php $categories = get_terms( [ 'taxonomy' => 'product_cat', 'hide_empty' => false ] ); ?>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid px-lg-5 d-flex align-items-center justify-content-between justify-content-lg-evenly">

                <div class="brand d-inline-flex">
                    <button class="navbar-toggler border-0 fs-5 ps-0" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <a href="<?php echo esc_url( home_url() ); ?>" class="navbar-brand"><img src="<?php echo get_template_directory_uri(). '/assets/images/logo.jpeg' ?>" alt="adnet print logo"></a>
                </div>


                <div class="d-inline-flex">
                    <form class="d-flex bg-white search me-3" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input class="form-control search-input order-2" type="text" placeholder="Search for products"
                               aria-label="Search" onfocusout="searchInput(event);" value="<?php echo get_search_query(); ?>" name="s">
                        <span class="input-group-text" onclick="searchInput(event);"><i class="bi bi-search"></i></span>
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                    <!-- mob -->
                    <div class="d-lg-none d-inline-flex">
                        <ul class="navbar-nav flex-row">
                            <li class="nav-item dropdown my-auto me-3">
                                <a class="nav-link text-black py-0 dropdown-toggle" data-bs-toggle="dropdown"
                                   aria-expanded="false" href="#">
                                    <i class="bi bi-person fs-3"></i>
                                </a>
                                <ul class="dropdown-menu position-absolute dropdown-mobile anm-slide-in shadow-lg">

									<?php if ( is_user_logged_in() ): ?>
                                        <li><a class="dropdown-item" href="/my-account/edit-account/">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/my-account/orders/">Orders</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/my-account/edit-address/">Addresses</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a>
                                        </li>

									<?php else: ?>
                                        <li><a class="dropdown-item" href="/my-account/">Login</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/create-account/">Create Account</a></li>
									<?php endif; ?>

                                </ul>
                            </li>

                            <li class="nav-item my-auto me-3">
                                <a class="nav-link text-black py-0 position-relative" href="<?php echo wc_get_cart_url(); ?>">
                                    <i class="bi bi-bag fs-5"></i>
                                    <?php if(count( WC()->cart->get_cart() ) > 0 ): ?>
                                        <span class="position-absolute start-100 bg-danger rounded-circle text-white text-center ms-1 translate-middle adnet_cart_item_count" style="font-size: 12px;width:18px;height:18px;">
                                        <?php echo count( WC()->cart->get_cart() ) ?>
                                    </span>
                                    <?php endif;?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="offcanvas offcanvas-start flex-lg-grow-0" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="<?php echo get_template_directory_uri(). '/assets/images/logo.jpeg' ?>" alt="adnet print logo" style="width: 125px; height: 20px"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <!-- above lg -->
                        <ul class="navbar-nav justify-content-end align-items-center flex-grow-1 pe-3 d-none d-lg-flex">
                            <li class="nav-item pe-3 dropdown">
                                <a class="nav-link d-flex align-items-center text-black dropdown-toggle fw-bold"
                                   data-bs-toggle="dropdown" aria-expanded="false" href="#"><i
                                            class="bi bi-person fs-4 pe-2"></i><span>Account</span></a>
                                <ul class="dropdown-menu anm-slide-in shadow">
									<?php if ( is_user_logged_in() ): ?>
                                        <li><a class="dropdown-item" href="/my-account/edit-account/">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/my-account/orders/">Orders</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/my-account/edit-address/">Address</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a>
                                        </li>

									<?php else: ?>
                                        <li><a class="dropdown-item" href="/my-account/">Login</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="/create-account/">Create Account</a></li>
									<?php endif; ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center text-black position-relative fw-bold"
                                   href="<?php echo wc_get_cart_url(); ?>">
                                    <i class="bi bi-bag fs-5 pe-2"></i>
                                    <span>Bag</span>
                                    <?php if(count( WC()->cart->get_cart() ) > 0 ): ?>
                                    <span class="position-absolute start-100 bg-danger rounded-circle text-white text-center adnet_cart_item_count" style="font-size: 12px;width:18px;height:18px;">
                                        <?php echo count( WC()->cart->get_cart() ) ?>
                                    </span>
                                    <?php endif;?>
                                </a>
                            </li>
                        </ul>

                        <!-- for mobile menu content -->
                        <ul class="navbar-nav nav-mobile justify-content-end align-items-start flex-grow-1 pe-3 d-flex d-lg-none">
                            <li class="nav-item">
                                <span class="open nav-link d-flex align-items-center" data-target="mob-product-menu">
                                    <i class="bi bi-box fs-5 pe-3 open"></i>All Products
                                </span>
                                <div class="mob-menu-container h-100 w-100 position-absolute top-0 bg-white"
                                     id="mob-product-menu">
                                    <div class="menu-header">
                                        <p class="d-flex align-items-center close"><i
                                                    class="bi bi-arrow-left-short fs-2 pe-2 close"></i>All Products</p>
                                    </div>
                                    <div class="menu-body h-100 overflow-scroll pb-5">
                                        <div class="accordion accordion-flush pb-5" id="allProductAccordion">

											<?php
                                            foreach ( $categories as $category ):
                                                if ($category->slug == "uncategorized") continue;
                                                if ( $category->parent == 0 ):
													$uniqueKey = bin2hex( random_bytes( 2 ) );

													?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header"
                                                            id="flush-heading<?php echo $uniqueKey; ?>">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapse<?php echo $uniqueKey; ?>"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapse<?php echo $uniqueKey; ?>">
																<?php echo $category->name; ?>
                                                            </button>
                                                        </h2>

                                                        <div id="flush-collapse<?php echo $uniqueKey; ?>"
                                                             class="accordion-collapse collapse"
                                                             aria-labelledby="flush-heading<?php echo $uniqueKey; ?>"
                                                             data-bs-parent="#allProductAccordion">
                                                            <div class="accordion-body d-flex flex-column">
																<?php
																// if subcategory
																$categoriesArr = (array) $categories; // object of objects
																$subCategories = array_filter( $categoriesArr, function ( $cat ) use ( $category ) {
																	return $cat->parent == $category->term_id;
																} );
																foreach ( $subCategories as $sub_category ): ?>
                                                                    <a href="<?php echo get_term_link( $sub_category->slug, 'product_cat' ); ?>"><?php echo $sub_category->name; ?></a>
																<?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
												<?php endif; endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item pe-3">
                                <a class="nav-link d-flex align-items-center" data-bs-toggle="collapse"
                                   href="#profile-menu" aria-controls="profile-menu" aria-expanded="false">
                                    <i class="bi bi-person fs-4 pe-3"></i>
                                    <span>Account</span>
                                </a>
                                <ul class="collapse list-group mb-0" id="profile-menu">
	                                <?php if ( is_user_logged_in() ): ?>
                                        <li class="list-group-item border-0 pt-0"><a class="nav-item text-decoration-none"
                                                                                     href="/my-account/edit-account/">Profile</a></li>
                                        <li class="list-group-item border-0"><a class="nav-item text-decoration-none"
                                                                                href="/my-account/orders/">Orders</a>
                                        </li>
                                        <li class="list-group-item border-0"><a class="nav-item text-decoration-none"
                                                                                     href="/my-account/edit-address/">Address</a></li>
                                        <li class="list-group-item border-0"><a class="nav-item text-decoration-none"
                                                                                href="<?php echo esc_url( wc_logout_url() ); ?>">Logout</a>
                                        </li>
	                                <?php else: ?>
                                    <li class="list-group-item border-0 pt-0"><a class="nav-item text-decoration-none"
                                                                                 href="/my-account/">Login</a></li>
                                    <li class="list-group-item border-0"><a class="nav-item text-decoration-none"
                                                                            href="/create-account/">Create Account</a>
                                    </li>
	                                <?php endif; ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center position-relative" href="<?php echo wc_get_cart_url(); ?>">
                                    <i class="bi bi-bag fs-5 pe-3"></i>
                                    <span>Bag</span>
                                    <?php if(count( WC()->cart->get_cart() ) > 0 ): ?>
                                        <span class="position-absolute start-100 bg-danger rounded-circle text-white text-center ms-2 adnet_cart_item_count" style="font-size: 12px;width:18px;height:18px;">
                                        <?php echo count( WC()->cart->get_cart() ) ?>
                                    </span>
                                    <?php endif;?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="header-bottom d-none d-lg-block border-bottom">
            <div class="container py-2">
                <ul class="navbar-nav flex-row align-items-center justify-content-between overflow-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            All
                            Products
                        </a>
                        <ul class="dropdown-menu anm-slide-out">
                            <div class="container">
                                <div class="row mw-100 my-2">
									<?php
									foreach ( $categories as $category ):
                                        if ($category->slug == "uncategorized") continue;
                                        if ( $category->parent == 0 ): ?>
                                            <div class="col-3">
                                                <ul class="menu">
                                                    <li>
                                                        <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"><?php echo $category->name; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
										<?php endif;
									endforeach; ?>
                                </div>
                            </div>
                        </ul>
                    </li>

					<?php
                    foreach ( $categories as $category ): ?>
                        <?php if($category->slug == "uncategorized") continue; ?>
						<?php if ( $category->parent == 0 ): ?>
                            <li class="nav-item">
                                <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>"
                                   class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
									<?php echo $category->name; ?>
                                </a>

								<?php
								// if subcategory
								$categoriesArr = (array) $categories; // object of objects
								$subCategories = array_filter( $categoriesArr, function ( $cat ) use ( $category ) {
									return $cat->parent == $category->term_id;
								} ); ?>
                                <ul class="dropdown-menu anm-slide-out">
                                    <div class="container">
                                        <div class="row mw-100 my-2">


								<?php foreach ( $subCategories as $sub_category ):

									$products = get_posts( array(
										'post_type'   => 'product',
										'numberposts' => -1,
										'post_status' => 'publish',
										'tax_query'   => array(
											array(
												'taxonomy' => 'product_cat',
												'field'    => 'slug',
												'terms'    => $sub_category->slug,
												'operator' => 'IN',
											)
										),
									) );
									?>

                                                <div class="col-3">
                                                    <ul class="menu">
                                                        <li>
                                                            <a href="<?php echo get_term_link( $sub_category->slug, 'product_cat' ); ?>"><?php echo $sub_category->name; ?></a>
                                                        </li>
														<?php foreach ( $products as $product ): ?>
                                                            <ul class="submenu">
                                                                <li>
                                                                    <a href="<?php echo $product->guid; ?>"><?php echo $product->post_title; ?></a>
                                                                </li>
                                                            </ul>
														<?php  endforeach;  ?>
                                                    </ul>
                                                </div>
								<?php endforeach; ?>
                                        </div>
                                    </div>
                                </ul>
                            </li>
						<?php endif; ?>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
    </header>
    <!--End Header-->

    <!--Page Content-->
    <div id="page-content">