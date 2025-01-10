<?php
/**
 * Admin main template
 */

defined( 'ABSPATH' ) || die();
?>
<div class="caro-container">
    <div class="container divicontinr">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="https://divicarousels.com/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <span class="fs-4"><img class="logo" src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>divi-carousel-logo-2.png" alt=""></span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="https://divicarousels.com/download-for-free/" class="nav-link" aria-current="page">Free vs Pro</a></li>
            <li class="nav-item"><a href="https://divicarousels.com/divi-carousels-demo/" class="nav-link">Demo</a></li>
            <li class="nav-item"><a href="https://www.youtube.com/channel/UCBJ7avS9oGyPXrqLiYnYC-w" class="nav-link">Videos</a></li>
            <li class="nav-item"><a href="https://divicarousels.com/docs/" class="nav-link">Doc</a></li>
            <li class="nav-item"><a href="https://divicarousels.com/pricing/" class="nav-link upgrade">Upgrade</a></li>
        </ul>
        </header>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 g-4 py-4">
            <div class="col d-flex justify-content-center button-area">
                <ul>
                    <li>
                        <a href="https://wordpress.org/support/plugin/carousels-slider-for-divi/reviews/?filter=5" class="your-feedback-does-matter-group">
                            <div class="your-feedback-does1">Feedback</div>
                            <img class="send-fill-icon3" alt="" src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>/send-fill.svg">
                        </a>
                    </li>
                    <li>
                        <a href="https://divicarousels.com/modules/" class="modules-group">
                            <div class="your-feedback-does1">Modules</div>
                            <img class="send-fill-icon3" alt="" src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>send-fill1.svg">
                        </a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/support/plugin/carousels-slider-for-divi/" class="support-container">
                            <div class="your-feedback-does1">Support</div>
                            <img class="send-fill-icon3" alt="" src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>send-fill1.svg">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 g-4 py-4">
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Free</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-image-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>image-carousel-icon.png" alt=""></li>
                        <li>Image Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Free</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-logo-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>logo-carousel-icon.png" alt=""></li>
                        <li>Logo Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Free</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-testimonial-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>testimonial-carousel-icon.png" alt=""></li>
                        <li>Testimonial Carousel Lite</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Free</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>twitter-carousel-icon.png" alt=""></li>
                        <li>Twitter Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Free</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>parallax-carousel-icon.png" alt=""></li>
                        <li>Parallax Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-content-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>content-carousel-icon.png" alt=""></li>
                        <li>Content Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-post-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>blog-carousel-icon.png" alt=""></li>
                        <li>Blog Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-testimonial-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>testimonial-carousel-icon.png" alt=""></li>
                        <li>Testimonial Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-instagram-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>instagram-facebook-icon.png" alt=""></li>
                        <li>Instagram Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-google-review-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>google-review-carousel-icon.png" alt=""></li>
                        <li>Google Review Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-team-carousel" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>team-carousel-icon.png" alt=""></li>
                        <li>Team Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-product-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>product-carousel-icon.png" alt=""></li>
                        <li>Product Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="https://divicarousels.com/divi-facebook-carousel/" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>facebook-carousel-icon.png" alt=""></li>
                        <li>Facebook Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Pro</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>divi-youtube-carousel.png" alt=""></li>
                        <li>Video Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Soon</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>multirow-carousel-icon.png" alt=""></li>
                        <li>Multirow Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Soon</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>cube-carousel-icon.png" alt=""></li>
                        <li>Cube Carousel</li>
                    </ul>
                </a>
            </div>
            <div class="col d-flex justify-content-center button-area Panel">
                <div class="corner-ribbon">
                    <span class="cr-inner">
                    <span class="cr-text">Soon</span>
                    </span>
                </div>
                <a href="#" class="module-item">
                    <ul>
                        <li><img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>card-carousel-icon.png" alt=""></li>
                        <li>Card Carousel</li>
                    </ul>
                </a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-4 py-4">
            <div class="col d-flex justify-content-center support-area" id="outerdiv">
                <iframe id="innerIframe" src="https://divicarousels.com/layout-download/" style="border: 0px none; height: 100%;" scrolling="no"></iframe>
            </div>
            <div class="col d-flex justify-content-center support-area">
                <iframe width="100%" src="https://www.youtube.com/embed/vTxA-Kq_4mI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-4 py-4">
            <div class="col d-flex justify-content-center facebook">
                <img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>facebook1.svg" alt="">
                <a href="https://www.facebook.com/divicarousels" class="join-container"><div class="pro">Join</div></a>
            </div>
            <div class="col d-flex justify-content-center facebook">
                <img src="<?php echo DIVICAROUSEL8_PLUGIN_ASSETS; ?>support.svg" alt="">
                <a href="https://wordpress.org/support/plugin/carousels-slider-for-divi/" class="join-container"><div class="pro">Get Support</div></a>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-1 g-4 py-4">
            <div class="col d-flex justify-content-center button-area">
                <h4>Copyright © 2023 Divi Carousels. Built with By <a href="https://divicarousels.com/" target="_blank">divicarousels.com</a></h4>
            </div>
        </div>
    </div>
</div>