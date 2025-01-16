<?php
include('include/service-array.php');




function in_array_r($needle, $haystack)
{
    foreach ($haystack as $key => $subArr) {
        if (in_array($needle, $subArr)) {
            return $key;
        }
    }
    return false;
}

$key = in_array_r($_REQUEST['slug'], $dataservicesArr);

$servicedetail = $dataservicesArr[$key];
unset($dataservicesArr[$key]);
$releatedArr = $dataservicesArr;

$slug = $_GET['slug'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title><?php echo $servicedetail['title'] ?></title>
    <meta name="description" content="<?php echo $servicedetail['description'] ?>" />
    <?php include('./view/head.php'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="canonical" href="<?php echo $SITE_URL; ?>services/<?php echo $servicedetail['slug'] ?>" />

</head>

<body>

    <?php include('./view/header.php'); ?>

    <div class="main" id="main">
        <section class="our-purpose choose-us overflow">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 flex-align">
                        <div class=" fadeInRight">
                            <div class="section-headding color-headding">
                                <h1 class="section-topik">
                                    <?php if ($servicedetail['h1'] <> "") {
                                        echo $servicedetail['h1'];
                                    } else {
                                        echo $servicedetail['detail_title'];
                                    } ?>
                                </h1>

                                <?php echo $servicedetail['objective'] ?>

                                <?php echo $servicedetail['benefits'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if (isset($servicedetail['platform_image'])) { ?>
            <section class="primery-research home-primery-research">
                <div class="container">
                    <h2>Survey Scripting Platform</h2>
                    <div class="home-outer">
                        <div class="service-banner-slider owl-carousel">
                            <div class="home-slider">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                                        <div class="wow fadeInLeft">
                                            <img src="<?php echo $SITE_URL; ?><?php echo $servicedetail['platform_image'] ?>"
                                                class="img-fluid img_service lazy"
                                                alt="<?php echo $servicedetail['title'] ?>">

                                            <!--<div class="image-overlay"></div>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="play-push play"><i class="fa fa-play" aria-hidden="true"></i></div>

                    </div>
                </div>
            </section>

        <?php } ?>
        <section class="primery-research home-primery-research">
            <div class="container">
                <?php echo $servicedetail['applications'] ?>
                <div class="home-outer">
                    <div class="service-banner-slider owl-carousel">
                        <?php if ($servicedetail['large_image'] <> "") { ?>
                            <div class="home-slider">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                                        <div class="wow fadeInLeft">
                                            <a class="slide_img" href="<?php echo $servicedetail['large_image'] ?>"
                                                title="<?php echo $servicedetail['title'] ?>">
                                                <img src="<?php echo $SITE_URL; ?><?php echo $servicedetail['large_image'] ?>"
                                                    class="img-fluid img_service lazy"
                                                    alt="<?php echo $servicedetail['title'] ?>">
                                            </a>
                                            <!--<div class="image-overlay"></div>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                        <div class="primery-research-content wow fadeInRight">
                                            <?php echo $servicedetail['applications1'] ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($servicedetail['small_image'] <> "") { ?>
                            <div class="home-slider">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                                        <div class="wow fadeInLeft">
                                            <a class="slide_img" href="<?php echo $servicedetail['small_image'] ?>"
                                                title="<?php echo $servicedetail['title'] ?>">
                                                <img src="<?php echo $SITE_URL; ?><?php echo $servicedetail['small_image'] ?>"
                                                    class="img-fluid img_service lazy"
                                                    alt="<?php echo $servicedetail['title'] ?>">
                                            </a>
                                            <!--<div class="image-overlay"></div>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                        <div class="primery-research-content wow fadeInRight">
                                            <?php echo $servicedetail['applications2'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if (isset($servicedetail['small_image1']) && $servicedetail['small_image1'] <> "" && isset($servicedetail['applications3']) && $servicedetail['applications3'] <> "") { ?>
                            <div class="home-slider">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 ">
                                        <div class="wow fadeInLeft">
                                            <a class="slide_img" href="<?php echo $servicedetail['small_image1'] ?>"
                                                title="<?php echo $servicedetail['title'] ?>">
                                                <img src="<?php echo $SITE_URL; ?><?php echo $servicedetail['small_image1'] ?>"
                                                    class="img-fluid img_service lazy"
                                                    alt="<?php echo $servicedetail['title'] ?>">
                                            </a>
                                            <!--<div class="image-overlay"></div>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                        <div class="primery-research-content wow fadeInRight">
                                            <?php echo $servicedetail['applications3'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>

                    <div class="play-push play"><i class="fa fa-play" aria-hidden="true"></i></div>

                </div>
            </div>
        </section>


        <section class="faq_area" id="faq">
            <?php include("include/faq-template-3.php") ?>
        </section>


        <section class="bussines-idea bussines-idea-gray  text-center wow fadeInUp">
            <div class="container">
                <div class="bussines-idea-inner">
                    <h2 class="bussines-title"><span>We believe in partnering</span> with our clients</h2>
                    <p class="bussines-text">We are keen to connect with you and discover the next big insight for you
                    </p>
                    <a href="contact" class="btn-common">Contact us <i class="fa fa-angle-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>

    <?php include('./view/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <style>
        .owl-nav button {
            position: absolute;
            top: 0;
            bottom: 0;
        }


        .owl-nav button i {
            font-size: 25px;
            text-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .owl-dots {
            display: none
        }

        .img_service {

            /* border: 2px solid #EF7B00;
    border-radius: 38px; */
            box-shadow: rgba(100, 100, 111, 0.37) 0px 7px 29px 0px
        }

        @media (max-width: 991px) {
            .home-slider {
                padding: 0px !important;
                padding-top: 0px !important;
            }
        }

        li {
            font-size: 14px;
            margin-left: 10px;
            list-style-type: circle;

        }
    </style>
    <script>
        if ($(".service-banner-slider").length > 0) {
            var owl = $('.service-banner-slider');
            owl.owlCarousel({
                // $(".home-banner-slider").owlCarousel({
                items: 1,
                loop: true,
                mouseDrag: false,
                autoplaySpeed: 1000,
                autoplay: false,
                autoplayTimeout: 5000,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                nav: true,
                margin: 10,

            });

            $('.play').on('click', function () {
                owl.trigger('play.owl.autoplay', [5000]);
                console.log('play');
            })
            $('.stop').on('click', function () {
                owl.trigger('stop.owl.autoplay');
                console.log('stop');
            });

        }
        $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
        $(".owl-next").html('<i class="fa fa-chevron-right"></i>');



        $(document).ready(function () {
            $('.slide_img').magnificPopup({
                disableOn: 320,
                type: 'image',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: true
            });
        });

    </script>
</body>

</html>