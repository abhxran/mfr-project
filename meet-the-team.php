<?php 
require_once('./include/team-array.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Meet Our Dedicated Team: Integrity, Transparency, and Exceptional Service</title>
<meta name="description" content="Get to know our dedicated team at Mindforce, where integrity, transparency, and exceptional service are at the core of everything we do. With a spirit of collaboration and a commitment to excellence, our team ensures that every client receives top-notch service and support." />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Meet Our Dedicated Team: Integrity, Transparency, and Exceptional Service" />
<meta property="og:Get to know our dedicated team at Mindforce, where integrity, transparency, and exceptional service are at the core of everything we do. With a spirit of collaboration and a commitment to excellence, our team ensures that every client receives top-notch service and support./>
<meta property="og:url" content="https://mindforceresearch.com/meet-the-team" />
<meta property="og:site_name" content="mindforceresearch" />
<meta property="article:modified_time" content="2021-06-10T06:25:05+00:00" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:label1" content="Est. reading time">
<meta name="twitter:data1" content="4 minutes">
    <?php include('./view/head.php');?>
<link rel="preload" as="style" onload="this.rel='stylesheet'"  href="<?php echo $SITE_URL;?>css/bootstrap.min-meet.css">
<link rel="canonical" href="<?php echo $SITE_URL;?>meet-the-team" />

</head>
<body>

    <?php include('./view/header.php');?>

    
    <div class="main" id="main">
        <section class="our-purpose our-culture overflow">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="research-img wow fadeInLeft">
                            <img data-src="<?php echo $SITE_URL;?>images/over-people.jpg" class="image-redius lozad" alt="Our culture">
                            <img data-src="<?php echo $SITE_URL;?>images/dot.svg" alt="Dot" class="dot-svg wow fadeInRight lozad">
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 flex-align">
                        <div class="gray-round light_bg_round people-round wow fadeInRight">
                            <div class="section-headding color-headding">
                                <h1 class="section-topik">Meet the team</h1>
                                <h2 class="section-title"><span>We are driven by integrity,</span>  transparency and a dedicated spirit of service with our clients and among our team members</h2>
                                <p>Mindforce has established an environment where seasoned industry professionals work to ensure a good client experience and those new to the industry can find a career path fostered by some of the industry’s best at what they do.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <div class="ouer-team mt-150">
            <div class="container">
                <div class="section-headding color-headding headding-center wow fadeInUp">
                    <!-- <label class="section-topik">Our team</label> -->
                    <h2 class="section-title"><span>Our</span> Team</h2>
                </div>
                <div class="our-team-inner">

                    <?php 
                    $team_list = $teamArr;
                    foreach ($team_list as $key => $value) {
                        ?>
                        <div class="team-box leadership-box wow fadeInUp">
                            <div class="leadership-img team-modal" data-target="#teamModal" style="<?php echo ($value['bg_color'] != "" ? 'background:'.$value['bg_color'].';' : ''); ?>">
                                <img class="team-img lozad" data-src="<?php echo $SITE_URL;?><?php echo $value['image']; ?>" alt="<?php echo $value['name']; ?>">
                                <div class="memmber-detail">
                                    <span class="memmber-name"><?php echo $value['name']; ?></span>
                                    <span class="memmber-roll"><?php echo $value['designation']; ?></span>
                                    
                                </div>
                                <div class="more-data" style="display: none;">
                                    <a class="social-link" href="<?php echo $value['linkedin_link']; ?>">Linkedin</a>
                                    <div class="content"><?php echo $value['description']; ?></div>
                                </div>                                
                            </div>
                        </div>
                    <?php 
                        if ( isset( $value['clear'] ) ){
                            echo '<div class="clear"></div>';
                        }
                    }
                    // foreach ends here 
                    
					?>
                </div>
            </div>
        </div>

        <section class="career-research">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 flex-align">
                        <div class="career-research-left wow fadeInLeft">
                            <img data-src="<?php echo $SITE_URL;?>images/paperwork-5.jpg" class="image-redius lozad" alt="Looking to build">
                            <img data-src="<?php echo $SITE_URL;?>images/dot.svg" alt="Dot" class="dot-svg wow fadeInRight lozad">
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 flex-align justify-right">
                        <div class="career-research-right roundcircle roundcircle-right wow fadeInRight">
                            <div class="section-headding">
                                <h2 class="section-title"><span>Looking to build</span> <br>a career in research?</h2>
                            </div>
                            <div class="roundcircle-content color-wihte">
                                <a href="contact" class="btn-oreng">Work with us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bussines-idea bussines-idea-gray mt-150 text-center wow fadeInUp">
            <div class="container">
                <div class="bussines-idea-inner">
                    <h2 class="bussines-title"><span>We believe in partnering</span> with our clients</h2>
                    <p class="bussines-text">We are keen to connect with you and discover the next big insight for you</p>
                    <a href="contact" class="btn-common">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body">
                    <div class="model-top-title">
                        <h3 class="leader-model-title">David Lemelin</h3>
                        <span class="leader-model-roll">Executive VP - Global Strategy & Business Development</span>
                        <div class="leader-social"></div>
                    </div>
                    <div class="leader-model-content">
                        <p>David has over 35 years of direct market research experience, with 15 years as a corporate researcher, where he managed in-house corporate research organizations, as well as research vendors. He also has over 10 years’ experience as a senior industry analyst and consultant. Prior to joining Mindforce Research in 2015, David served as Director Custom Research at Current Analysis. David also served as Practice Leader of the Business Markets Service research team at In-Stat, and spent over 25 years at Qwest/U S WEST/Mountain Bell, where he held a variety of Market Research, Marketing and Public Relations senior manager positions. At Mindforce, David leads the global Strategy and Business Development functions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('./view/footer.php');?>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#teamModal').on('shown.bs.modal', function (e) {
              console.log('#teamModal');
            });

            $('body').on('click', '.team-modal', function(){

                var member_img = $(this).find('.team-img').attr('src');
                var member_name = $(this).find('.memmber-name').html();
                var designation = $(this).find('.memmber-roll').html();
                var social_link = $(this).find('.social-link').attr('href');
                var content = $(this).find('.content').html();
                // console.log( member_img );
                // console.log( member_name );
                // console.log( designation );
                // console.log( social_link );
                // console.log( content );

                if ( social_link != "" ){
                    $('#teamModal .leader-social').html('<a href="'+social_link+'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>');
                }else{
                    $('#teamModal .leader-social').html('');
                }

                $('#teamModal .leader-model-title').html(member_name);                
                $('#teamModal .leader-model-roll').html(designation);
                $('#teamModal .leader-model-content').html(content);

                $('#teamModal').modal('show');
            });

        })
        
    </script>

    
</body>
</html>