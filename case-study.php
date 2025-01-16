<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include('include/case-array.v.1.0.php');
include('include/case-array.v.1.1.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
	<title>Stay Updated with Mindforce Research: News and Latest Updates</title>
	<meta name="description" content="Explore our blog for insights, trends, and industry developments to keep you ahead of the curve in market research. Subscribe now to stay updated on the latest news, events, and innovations in the field." />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Case Studies | Mindforce" />
<meta property="og:Discover the strategies, success stories, and collaborative efforts our clients experienced with our service in the form of case studies./>
<meta property="og:url" content="https://mindforceresearch.com/cases" />
<meta property="og:site_name" content="mindforceresearch" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:label1" content="Est. reading time">
<meta name="twitter:data1" content="4 minutes">
    <?php include('./view/head.php');?>
<link rel="canonical" href="<?php echo $SITE_URL;?>resources" />

</head>
<body>

     <?php include('./view/header.php');?>
    
    <div class="main" id="main">

        <section class="cases-listing">
            <div class="container">
                <div class="section-headding color-headding wow fadeInUp">
                    <h1 class="section-topik">Case Studies</h1>
                    <h2 class="section-title"><span>Our</span> work grid</h2>
                </div>
                <div class="work-grid">
                    <div class="row">
                        <?php 
                            foreach ($caseArr as $key => $value) {
                            ?>

                            <div class="col-xl-3 col-lg-3 col-md-4 work-grid-box wow fadeInUp">
                                <div class="grid-box-in">
                                    <div class="cases-img">
                                        <a href="cases-detail/<?php echo $value['slug']; ?>"><img class="lozad" data-src="<?php echo $SITE_URL;?><?php echo $value['small_image'];?>" alt="<?php echo $value['slug']; ?> cases"></a>
                                    </div>
                                    <a href="cases-detail/<?php echo $value['slug']; ?>" class="cases-overly" title="<?php echo $value['title'];?>">
                                        <span class="cases-text"><?php echo $value['title'];?></span>
                                    </a>
                                </div>
                            </div>
                            
                           <?php  }
                        ?>
                        
                        <?php 
                            foreach ($caseArrv11 as $key => $value) {
                            ?>

                            <div class="col-xl-3 col-lg-3 col-md-4 work-grid-box wow fadeInUp">
                                <div class="grid-box-in">
                                    <div class="cases-img">
                                        <a href="cases-detail/<?php echo $value['slug']; ?>"><img class="lozad" data-src="<?php echo $SITE_URL;?><?php echo $value['small_image'];?>" alt="<?php echo $value['slug']; ?> cases"></a>
                                    </div>
                                    <a href="cases-detail/<?php echo $value['slug']; ?>" class="cases-overly" title="<?php echo $value['title'];?>">
                                        <span class="cases-text"><?php echo $value['title'];?></span>
                                    </a>
                                </div>
                            </div>
                            
                           <?php  }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bussines-idea mt-150 text-center wow fadeInUp">
            <div class="container">
                <div class="bussines-idea-inner">
                    <h1 class="bussines-title">Case Studies</h1>
                    <a href="contact" class="btn-oreng">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>

   <?php include('./view/footer.php');?>

</body>
</html>