<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic-page-needs -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="canonical" href="https://www.mindforceresearch.com" />
    <?php include './view/head.php'; ?>
    <link rel="preload" as="style" onload="this.rel='stylesheet'"
        href="<?php echo $SITE_URL; ?>css/bootstrap.min-meet.css">

</head>

<body>
    <?php include './view/header.php'; ?>

    <?php
    if (isset($_GET['slug']) && $_GET['slug'] != "") {
        $slug = $_GET['slug'];
        include './blogs/blogDetail.php';
    } else {
        include './blogs/blogListing.php';
    }
    ?>

    <?php include './view/footer.php'; ?>
</body>

</html>