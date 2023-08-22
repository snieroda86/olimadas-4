<?php
/**
 * The template for displaying frontpage
 * Template Name: Strona główna
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>
<!-- slider section -->
      <section class="slider_section ">
        <div class="container-fluid p-0">
          <div class="row m-0">
            <div class="col-lg-8 col-md-7 p-0">
              <div class="home-slider-sn">
                <div style="background-image: url(<?php echo PATH_SN ?>/uploads/slide_1_sn.jpg );background-size: cover;background-position: center top;">
                </div>
                <div style="background-image: url(<?php echo PATH_SN ?>/uploads/slide_2_sn.jpg );background-size: cover;background-position: center top;">
                </div>

              </div>
            </div>
            <div class="col-lg-4 col-md-5 align-items-start">
              <div class="home-hero-info-box">
                <div class="info-box-inner">
                  <h1 class="color-black">Olimada's Yorkshire terrier Kennel</h1>
                  <div class="line-left-margin"></div>
                  <p class="light-grey pt-4 pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                  <!-- Table buttons -->
                  <div class="table-buttons-sn">
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php the_permalink(19); ?>" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-solid fa-plus"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Add dog
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php echo get_post_type_archive_link('rodowody_psow'); ?>" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-solid fa-list"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Dogs list
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php echo get_permalink(77) ?>" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          My account
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                  </div>
                  
                </div>
               
              </div>
            </div>
          </div>
        </div>

        <!-- BTN box -->
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
      <!-- end slider section -->
    </div>

    <!-- info section -->
   <!--  <section class="info_section layout_padding2">
      <div class="container">
        <div class="row info_form_social_row">
          <div class="col-md-8 col-lg-9">
            <div class="info_form">
              <form action="">
                <input type="email" placeholder="Enter your email">
                <button>
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">

            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row info_main_row">
          <div class="col-md-6 col-lg-3">
            <div class="info_links">
              <h4>
                Menu
              </h4>
              <div class="info_links_menu">
                <a href="index.html">
                  Home
                </a>
                <a href="about.html">
                  About
                </a>
                <a href="chocolate.html">
                  Chocolates
                </a>
                <a href="testimonial.html">
                  Testimonial
                </a>
                <a href="contact.html">
                  Contact us
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_insta">
              <h4>
                Instagram
              </h4>
              <div class="insta_box">
                <div class="img-box">
                  <img src="<?php echo PATH_SN ?>/uploads/insta-img.png" alt="">
                </div>
                <p>
                  long established fact that a reader
                </p>
              </div>
              <div class="insta_box">
                <div class="img-box">
                  <img src="<?php echo PATH_SN ?>/uploads/insta-img.png" alt="">
                </div>
                <p>
                  long established fact that a reader
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_detail">
              <h4>
                Company
              </h4>
              <p class="mb-0">
                when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h4>
              Contact Us
            </h4>
            <div class="info_contact">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- end info_section -->

  </div>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('.home-slider-sn').slick({
        centerMode: false,
        slidesToShow: 1,
        autoplay:true ,
        fade:true,
        prevArrow: $('.carousel-control-prev'),
        nextArrow: $('.carousel-control-next'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              slidesToShow: 1
            }
          },
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              slidesToShow: 1
            }
          }
        ]
      });
    });
  </script>
<?php
get_footer();
