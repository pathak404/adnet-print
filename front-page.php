<?php

/**
 * Author: Abhishek Kumar Pathak
 * Email: officialabhishekpathak@gmail.com
 *
 * The template for front page only
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
?>


    <!-- main -->
    <main>
        <div class="container-fluid p-0 m-0">
            <a href="/shop">
                <picture>
                    <source media="(max-width: 767px)"
                            srcset="<?php echo get_template_directory_uri() ?>/assets/images/front-page/banner-small.jpg">
                    <img alt="adnet print banner"
                         src="<?php echo get_template_directory_uri() ?>/assets/images/front-page/banner.jpeg"
                         class="img-fluid">
                </picture>
            </a>
        </div>
    </main>
    <!-- end main -->


    <!-- popular products -->
<?php
$products = get_posts(array(
    'post_type' => 'product',
    'numberposts' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => 'most-popular',
            'operator' => 'IN',
        )
    ),
));

if (!empty($products)): ?>
    <section class="bg-white py-5 px-md-5">
        <div class="container-fluid px-3 mt-4">
            <h3 class="mb-5 text-black fw-bold fs-2">Our Most Popular Products</h3>
            <div class="popular-products swiper bg-white">
                <div class="swiper-wrapper">

                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_permalink($product->ID); ?>">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($product->ID)); ?>"
                                     alt="<?php echo $product->post_title; ?>" style="aspect-ratio: 1/1;">
                                <div class="title">
                                    <?php echo $product->post_title; ?> <i class="bi bi-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev popular-products-button-prev"></div>
                <div class="swiper-button-next popular-products-button-next"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- end popular products -->


    <!-- trending products -->
<?php
$products = get_posts(array(
    'post_type' => 'product',
    'numberposts' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => 'trending-products',
            'operator' => 'IN',
        )
    ),
));

if (!empty($products)): ?>
    <section class="bg-white py-5 px-md-5">
        <div class="container-fluid px-3 mt-4">
            <h3 class="mb-5 text-black fw-bold fs-2">Trending Products</h3>
            <div class="trending-products swiper bg-white">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_permalink($product->ID); ?>">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($product->ID)); ?>"
                                     alt="<?php echo $product->post_title; ?>" style="aspect-ratio: 1/1;">
                                <div class="title">
                                    <?php echo $product->post_title; ?> <i class="bi bi-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev trending-products-button-prev"></div>
                <div class="swiper-button-next trending-products-button-next"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- end trending products -->


    <!-- branded clothing -->
<?php
$products = get_posts(array(
    'post_type' => 'product',
    'numberposts' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => 'branded-clothing',
            'operator' => 'IN',
        )
    ),
));

if (!empty($products)): ?>
    <section class="bg-white py-5 px-md-5">
        <div class="container-fluid px-3 mt-4">
            <h3 class="mb-5 text-black fw-bold fs-2">Branded Clothing</h3>
            <div class="branded-clothing swiper bg-white">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_permalink($product->ID); ?>">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($product->ID)); ?>"
                                     alt="<?php echo $product->post_title; ?>" style="aspect-ratio: 1/1;">
                                <div class="title">
                                    <?php echo $product->post_title; ?> <i class="bi bi-arrow-right"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev branded-clothing-button-prev"></div>
                <div class="swiper-button-next branded-clothing-button-next"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- end branded clothing -->


    <!-- banner -->
    <section class="bg-white banner py-5">
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="col-12 col-md-6 p-0">
                    <div class="text-wrapper position-absolute part-1">
                        <h3 class="text-black fw-bold fs-2">Calendars, <br/>Notebooks <br/> and Diaries</h3>
                        <a href="#" type="button"
                           class="bg-black rounded-pill px-4 py-3 fw-bold text-decoration-none text-light small mt-1">
                            Buy 1 @ Rs.140
                        </a>
                    </div>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/front-page/part1.webp"
                         class="w-100" alt="">
                </div>
                <div class="col-12 col-md-6 p-0">
                    <div class="text-wrapper position-absolute part-2">
                        <h3 class="text-black fw-bold fs-2">Gift Hampers</h3>
                        <a href="#" type="button"
                           class="bg-black rounded-pill px-4 py-3 fw-bold text-decoration-none text-light small mt-1">
                            Buy 1 @ Rs.1170
                        </a>
                    </div>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/front-page/part2.webp"
                         class="w-100" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->


    <!--  Categories  -->
<?php $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]); ?>
    <section class="bg-white py-5 px-md-5">
        <div class="container-fluid px-3 my-4">
            <h3 class="mb-5 text-black fw-bold fs-2">Explore all categories</h3>
            <div class="explore-categories swiper bg-white d-md-none">
                <div class="swiper-wrapper">

                    <?php
                    foreach ($categories as $category) {
                        if ($category->slug == "uncategorized") continue;
                        if ($category->parent == 0) {
                            $img_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image_url = wp_get_attachment_url($img_id);
                            $cat_url = get_term_link($category->term_id, 'product_cat');
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo $cat_url; ?>">
                                    <img src="<?php echo $image_url; ?>" alt="">
                                    <div class="title text-center">
                                        <?php echo $category->name; ?> <i class="bi bi-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } ?>


                </div>
                <div class="swiper-button-prev explore-categories-button-prev"></div>
                <div class="swiper-button-next explore-categories-button-next"></div>
            </div>

            <!-- for desktop -->
            <div class="categories d-none d-md-block text-center">
                <div class="row">
                    <?php
                    $ten_categories = array_slice($categories, 0, 10);
                    $first_five_categories = array_slice($categories, 0, 6);
                    $last_five_categories = array_slice($categories, 6, 6);
                    foreach ($first_five_categories as $category) {
                        if ($category->slug == "uncategorized") continue;
                        if ($category->parent == 0) {
                            $img_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image_url = wp_get_attachment_url($img_id);
                            $cat_url = get_term_link($category->term_id, 'product_cat');
                            ?>
                            <div class="col">
                                <a href="<?php echo $cat_url; ?>" class="text-decoration-none">
                                    <img src="<?php echo $image_url; ?>" alt="" class="img-fluid">
                                    <div class="title mt-3">
                                        <h6 class="text-dark fw-bold text-center"><?php echo $category->name; ?></h6>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } ?>
                </div>

                <div class="row mt-5">
                    <?php
                    foreach ($last_five_categories as $category) {
                        if ($category->slug == "uncategorized") continue;
                        if ($category->parent == 0) {
                            $img_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $image_url = wp_get_attachment_url($img_id);
                            $cat_url = get_term_link($category->term_id, 'product_cat');
                            ?>
                            <div class="col">
                                <a href="<?php echo $cat_url; ?>" class="text-decoration-none">
                                    <img src="<?php echo $image_url; ?>" alt="" class="img-fluid">
                                    <div class="title mt-3">
                                        <h6 class="text-dark fw-bold text-center"><?php echo $category->name; ?></h6>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <!--  End Categories  -->


    <!-- Features -->
    <section class="features">
        <div class="container">
            <div class="row gy-5 mx-0">

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="hstack gap-2">
                        <img src="<?php echo get_template_directory_uri() . "/assets/images/features/83.svg" ?>" alt="">
                        <div class="details ms-auto">
                            <p class="fw-bold mb-0">Fast Delivery</p>
                            <p>
                                Order today & get it delivered in 5-6 days, anywhere in india.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="hstack gap-2">
                        <img src="<?php echo get_template_directory_uri() . "/assets/images/features/58.svg" ?>" alt="">
                        <div class="details ms-auto">
                            <p class="fw-bold mb-0">Easy Order</p>
                            <p>
                                You can also order a single quantity. Fast checkout with many payment options.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-4">
                    <div class="hstack gap-2">
                        <img src="<?php echo get_template_directory_uri() . "/assets/images/features/93.svg" ?>" alt="">
                        <div class="details ms-auto">
                            <p class="fw-bold mb-0">Best Quality</p>
                            <p>
                                A wide range of quality tested products in cheap price at one place.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Features -->
<?php
get_footer();



