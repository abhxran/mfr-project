<?php

include('include/case-array.v.1.0.php');
include('include/case-array.v.1.1.php');
$caseArr = array_merge($caseArr,$caseArrv11);
    function in_array_r ($needle, $haystack) {
        foreach ($haystack as $key => $subArr) {
            if (in_array($needle, $subArr)) {
                return $key;
            }
        }
        return false;
    }
    $key =  in_array_r($_REQUEST['slug'], $caseArr); 

    $casedetail = $caseArr[$key];
    unset($caseArr[$key]);
    $releatedArr = $caseArr;
// print_r($casedetail);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
	<title><?php echo $casedetail['title'];?></title>
        <meta name="description" content="<?php echo $casedetail['description'];?>" />
    <?php include('./view/head.php');?>
<link rel="canonical" href="<?php echo $SITE_URL;?>cases-detail/<?php echo $casedetail['slug'];?>" />

</head>
<body>

    <?php include('./view/header.php');?>
    
    <div class="main" id="main">

        <section class="cases-detail-main">
            <div class="container">
                <div class="section-headding color-headding wow fadeInUp">
                    <h1 class="section-title"><?php if($casedetail['h1']<>""){echo $casedetail['h1'];} else {echo $casedetail['detail_title'];}?></h1>
                </div>
                <div class="business-goals">
                    <div class="cases-round wow fadeInRight"></div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-12 wow fadeInLeft position-i">
                            <div class="business-goals-img">
                                <img src="<?php echo $casedetail['large_image']?>" class="image-redius lazy" alt="<?php echo $casedetail['detail_title']?>">
                                <img src="images/dot.svg" alt="Dot" class="dot-svg wow fadeInRight lazy">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="cases-detail pt-100">
                                <div class="cases-content">

                                <?php if(!isset($casedetail['content'])){
                                        
                                        ?>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Objective</span>
                                        </div>
                                        <div class="cases-right">
                                            <?php echo $casedetail['objective']?>
                                        </div>
                                    </div>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Methodology</span>
                                        </div>
                                        <div class="cases-right">
                                            <?php echo $casedetail['methodology']?>
                                        </div>
                                    </div>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Respondents</span>
                                        </div>
                                        <div class="cases-right">
                                            <?php echo $casedetail['respondents']?>
                                        </div>
                                    </div>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Sample</span>
                                        </div>
                                        <div class="cases-right">
                                            <?php echo $casedetail['sample']?>
                                        </div>
                                    </div>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Geography</span>
                                        </div>
                                        <div class="cases-right">
                                             <?php echo $casedetail['geography']?>
                                        </div>
                                    </div>
                                    <div class="cases-box wow fadeInLeft">
                                        <div class="cases-left">
                                            <span class="cases-title">Result</span>
                                        </div>
                                        <div class="cases-right">
                                            <?php echo $casedetail['result']?>
                                        </div>
                                    </div>
                                    <?php }else {
                                        $contents = $casedetail['content'];
                                        for($i =0; $i < count($contents); $i++){
                                            $content = $contents[$i];                                           
                                        ?>
                                        <div class="cases-box wow fadeInLeft">
                                            <div class="cases-left">
                                                <span class="cases-title"><?php echo $content['title']?></span>
                                            </div>
                                            <div class="cases-right">
                                                <?php echo $content['detail']?>
                                            </div>
                                        </div>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="business-goals-content">
                                <ul>
                                   <?php 
                                    foreach ($releatedArr as $key => $value) {
                                    ?> 
                                    <li class="wow fadeInRight"><a href="cases-detail/<?php echo $value['slug']?>"><?php echo $value['title'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        
        <section class="bussines-idea mt-150 text-center wow fadeInUp">
            <div class="container">
                <div class="bussines-idea-inner">
                    <h2 class="bussines-title"><span>Ready to discover the next</span> big business idea</h2>
                    <p class="bussines-text">Let's connect and get cracking on the insights you need</p>
                    <a href="#" class="btn-oreng">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
    </div>

    <?php include('./view/footer.php');?>

</body>
</html>