<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="<?php echo URLWEB . 'asset/css/general.css'; ?>" rel="stylesheet"/>
        <link href="<?php echo URLWEB . 'asset/css/content.css'; ?>" rel="stylesheet"/>
        <link href="<?php echo URLWEB . 'asset/svg/cup.svg'; ?>" rel="shortcut icon" type="image/x-icon">
        <title>Báo nóng</title>
    </head>
    <body>
        <?php
        require "layout/upper-header.php";
        require "layout/header.php";
        require "layout/nav-bar.php";
        require "feed/top-news.php";
        require "layout/upper-footer.php";
        require "layout/footer.html";
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo URLWEB . 'asset/js/script.js'; ?>"></script>
    </body>
</html>