<?php

$slug = $_GET["slug"];

include("include/article-array.php");

if(isset($articles[$slug])){
    $article = $articles[$slug];
}else{
    header("Location: https://www.mindforceresearch.com/404.php");
exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic page needs -->
    <meta charset="UTF-8">
    <title><?php echo $article['meta-title']; ?></title>
    <meta name="description" content=<?php echo $article['meta-description']; ?> />
    <link rel="canonical" href="https://www.mindforceresearch.com" />
    <?php include('./view/head.php'); ?>
    <link rel="preload" as="style" onload="this.rel='stylesheet'"
        href="<?php echo $SITE_URL; ?>css/bootstrap.min-meet.css">

</head>

<body>
    <!-- header -->
    <?php include('./view/header.php'); ?>

    <?php echo $article['body']; ?>

   
    <!-- faq-section -->
    <section class="faq_area" id="faq">
        <?php include("include/faq-template-3.php") ?>
    </section>

  

    <!-- conatct us -->
    <section class="bussines-idea mt-150 text-center wow fadeInUp">
        <div class="container">
            <div class="bussines-idea-inner">
                <h2 class="bussines-title"><span>Ready to take the</span> next step?</h2>
                <p class="bussines-text">Speak to Our Experts Today</p>

                <a href="contact" class="btn-oreng">Contact us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('./view/footer.php'); ?>

</body>

</html>
