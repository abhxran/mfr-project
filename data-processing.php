<?php
include ('include/data-processing-array.php');



function in_array_r($needle, $haystack)
{
    foreach ($haystack as $key => $subArr) {
        if (in_array($needle, $subArr)) {
            return $key;
        }
    }
    return false;
}

$key = in_array_r($_REQUEST['slug'], $dataanalystArr);

$processingdetail = $dataanalystArr[$key];
unset($dataanalystArr[$key]);
$releatedArr = $dataanalystArr;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Data Processing: Transforming Raw Data for Informed Decision-Making</title>

    <?php include ('./view/head.php'); ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $SITE_URL; ?>css/service.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="canonical" href="<?php echo $SITE_URL;?>data-processing" />
</head>

<body>

    <?php include ('./view/header.php'); ?>

    <div class="main" id="main">
        <section class="our-purpose choose-us overflow">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 flex-align ">
                        <div class=" ">
                            <div class="section-headding color-headding">
                                <h1 class="section-topik"><?php echo $processingdetail['detail_title'] ?></h1>


                                <?php echo $processingdetail['objective'] ?>

                                <?php echo $processingdetail['benefits'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="primery-research home-primery-research">
            <div class="container">
                <?php echo $processingdetail['applications'] ?>
                <div class="home-outer">
                    <div class="service-banner-slider owl-carousel">
					<?php if($processingdetail['small_image']<>""){?>
                        <div class="home-slider">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 ">
                                    <div class="research-img wow fadeInLeft animated ">
									<a class="slide_img" href="<?php echo $processingdetail['small_image']?>">
                                        <img src="<?php echo $processingdetail['small_image'] ?>"
                                            class="img-fluid img_service lazy" alt="primary research">
										</a>
                                        <!--<div class="image-overlay"></div>-->
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                    <div id="overflowTest" class="primery-research-content wow ">
                                        <?php echo $processingdetail['applications1'] ?>

                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } elseif($processingdetail['small_image1']<>""){?>
                        <div class="home-slider">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 ">
                                    <div class="research-img wow fadeInLeft animated">
									<a class="slide_img" href="<?php echo $processingdetail['small_image1']?>">
                                        <img src="<?php echo $processingdetail['small_image1'] ?>"
                                            class="img-fluid img_service lazy" alt="primary research">
										</a>
                                        <!--<div class="image-overlay"></div>-->
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                    <div id="overflowTest" class="primery-research-content wow ">
                                        <?php echo $processingdetail['applications2'] ?>

                                    </div>
                                </div>
                            </div>
                        </div>						
						
						<?php 
					}elseif($processingdetail['large_image']<>""){?>
                        <div class="home-slider">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 ">
                                    <div class="research-img wow fadeInLeft animated">
									<a class="slide_img" href="<?php echo $processingdetail['large_image']?>">
                                        <img src="<?php echo $processingdetail['large_image'] ?>"
                                            class="img-fluid img_service lazy" alt="primary research">
									</a>
                                        <!--<div class="image-overlay"></div>-->
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-12 flex-align margin_left">
                                    <div id="overflowTest" class="primery-research-content wow ">
                                        <?php echo $processingdetail['applications3'] ?>
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




        <section class="bussines-idea bussines-idea-gray mt-150 text-center wow fadeInUp">
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

  <?php include ('./view/footer.php'); ?>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
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

        $('.play').on('click', function() {
            owl.trigger('play.owl.autoplay', [5000]);
            console.log('play');
        })
        $('.stop').on('click', function() {
            owl.trigger('stop.owl.autoplay');
            console.log('stop');
        });

    }
    $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
    $(".owl-next").html('<i class="fa fa-chevron-right"></i>');
	
	
$(document).ready(function() {
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

