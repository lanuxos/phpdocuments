<?php

use function PHPSTORM_META\type;

require('conn.php');
$title = basename($_SERVER['PHP_SELF']);
$year = date("Y");


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
        <div class="row m-1 bg-light p-1">
            <div class="col">
                
            </div>
        </div>
    </div>
    <?php require('footer.php'); ?>
    <script>
        $(document).ready(function(){
            // JQuery

        });
    </script>
</body>

</html>