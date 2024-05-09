<?php include 'layouts/header.inc.php';?>

<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href='index.html'><img src="assets/imgs/logo.png" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">

            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li>
                            <a class='active' href='index.php'>Home </a>
                        </li>
                        <li>
                            <a href='page-about-2.php'>About</a>
                        </li>
                        <li>
                            <a href='page-contact.php'>Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href=''><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="tel: +919820247813"><i class="fi-rs-headphones"></i>+91 98202 47813 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Follow Us</h6>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
            </div>
        </div>
    </div>
</div>
<!--End header-->
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="home-slide-cover mt-30">
                <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                    <div class="single-hero-slider single-hero-slider1"
                        style="background-image: url(assets/imgs/slider/slider-1.png);">
                    </div>
                    <div class="single-hero-slider single-hero-slider2"
                        style="background-image: url(assets/imgs/slider/slider-2.png);">
                    </div>
                </div>
                <div class=" slider-arrow hero-slider-1-arrow"></div>
            </div>
        </div>

    </section>
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>Featured Categories</h3>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                    id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    <?php 
                        $sql_categories = "SELECT * FROM categories";
                        $result_categories = $conn->query($sql_categories);

                        // Define an array of background classes
                        $bg_classes = array("bg-9", "bg-10", "bg-11", "bg-12");

                        // Counter for bg_classes array
                        $class_counter = 0;

                        // Loop through the categories
                        while($row = $result_categories->fetch_assoc()) {
                            // Get category details
                            $category_name = $row['category_name'];
                            // $item_count = $row['item_count'];
                            // Print the card with appropriate class
                            ?>
                    <div class="card-2 <?= $bg_classes[$class_counter] ?> wow animate__animated animate__fadeInUp"
                        data-wow-delay="<?= ($class_counter * 0.1) ?>s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="#"><img src="<?= PRODUCT_IMAGE_SITE_PATH.$row["photos"] ?>" alt="" /></a>
                        </figure>
                        <h6><a href="#"><?= $category_name ?></a></h6>
                        <!-- <span><?= $item_count ?> items</span> -->
                    </div>
                    <?php
                            
                            // Increment the class counter
                            $class_counter++;
                            // Reset counter if it exceeds the array length
                            if($class_counter == count($bg_classes)) {
                                $class_counter = 0;
                            }
                        }
                        ?>

                </div>
            </div>
        </div>
    </section>
    <!--End category slider-->
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="assets/imgs/banner/banner-1.png" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a class='btn btn-xs' href='#product-tab'>View More <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="assets/imgs/banner/banner-2.png" alt="" />
                        <div class="banner-text">
                            <h4>Enhance your well-being with our nutritious <br> dried fruits.</h4>
                            <a class='btn btn-xs' href='#product-tab'>View More <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="assets/imgs/banner/banner-3.png" alt="" />
                        <div class="banner-text">
                            <h4>Discover the Finest Selection of <br> Organic Pulses.</h4>
                            <a class='btn btn-xs' href='#product-tab'>View more <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End banners-->

    <?php 
    $sql_categories = "SELECT * FROM categories";
    $result_categories = $conn->query($sql_categories);
    if ($result_categories->num_rows > 0) {
    while ($row_category = $result_categories->fetch_assoc()) {
        $category_id = $row_category["cat_id"];
        $category_name = $row_category["category_name"];
        $sql_products = "SELECT * FROM products WHERE cat_id = $category_id";
        $result_products = $conn->query($sql_products);

        // Check if there are products associated with this category
        if ($result_products->num_rows > 0) {
            ?>
    <section class="section-padding pb-5" id="product-tab">
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
                <h3 class=""><?= $category_name ?></h3>
            </div>
            <div class="row">
                <div class="carausel-4-columns-cover arrow-center position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows">
                    </div>
                    <div class="carausel-4-columns<?= $row_category["cat_id"] ?> carausel-arrow-center"
                        id="carausel-4-columns<?= $row_category["cat_id"] ?>">
                        <?php
                        // Loop through each product and display its details
                        while ($row_product = $result_products->fetch_assoc()) {
                            ?>
                        <div class="product-cart-wrap" id="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href='#'>
                                        <img class="default-img"
                                            src="<?= PRODUCT_IMAGE_SITE_PATH.$row_product["photos"] ?>"
                                            alt="<?= $row_product["product_name"] ?>" />
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <!-- Display category name for each product -->
                                    <a href='#'><?= $category_name ?></a>
                                </div>
                                <h2><?= $row_product["product_name"] ?></h2>
                                <a class='btn w-100 hover-up' href='#'
                                    data-product-id="<?= $row_product["product_id"] ?>"><i
                                        class="fi-rs-eye mr-5"></i>View Details</a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    }
} else {
    // If no categories found, display a message
    echo "<p>No categories found.</p>";
}
?>

</main>
<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                We've expanded our shipping <br />
                                services internationally.
                            </h2>
                            <p class="mb-45">Largest collection of dryfruits and spices at <span
                                    class="text-brand">Prishma
                                    Impex</span>
                            </p>
                        </div>
                        <img src="assets/imgs/banner/banner-9.png" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Best spices distributer</h3>
                            <p>In all over india</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Free delivery</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Great daily deal</h3>
                            <p>In every season</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-4.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Export Globally</h3>
                            <p>Without any limit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-5.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Easy returns</h3>
                            <p>If fault in our product</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src="assets/imgs/theme/icons/icon-6.svg" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="logo mb-30">
                            <a class='mb-15' href='index.html'><img src="assets/imgs/logo.png" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome grocery store website template</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong>
                                <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span>
                            </li>
                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call
                                    Us:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-email-2.svg"
                                    alt="" /><strong>Email:</strong><span>sale@Prishma.com</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-clock.svg"
                                    alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">

                </div>
            </div>
    </section> -->
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2024, <strong class="text-brand">Prishma Impex </strong> Developed By
                    <strong class="text-brand"> <a href="">Deepak Dubey</a> </strong>
                    <br />All rights reserved
                </p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>98202 47813<span>24/7 in your service</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <p class="font-sm">Follow us on social media</p>
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest-white.svg" alt="" /></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube-white.svg" alt="" /></a>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="assets/imgs/theme/loading.gif" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/counterup.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/images-loaded.js"></script>
<script src="assets/js/plugins/isotope.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.vticker-min.js"></script>
<script src="assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="assets/js/main5103.js?v=6.0"></script>
<script src="assets/js/shop5103.js?v=6.0"></script>
</body>

</html>