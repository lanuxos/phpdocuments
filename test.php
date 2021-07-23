<?php

require('conn.php');
$title = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php require('header.php'); ?>
</head>

<body class="">
    <?php require('nav.php'); ?>
    <?php require('viewForm.php'); ?>
    <?php require('insertForm.php'); ?>
    <?php require('searchForm.php'); ?>
    <div class="container-fluid mt-1">
        <div class="row m-1">
        </div>
    </div>
    <?php require('footer.php');
    require('js.php'); ?>
    <script src="index.js"></script>
    <script>
    </script>
</body>

</html>