<?php
// enable debuging
// error_reporting(E_ALL);    
// ini_set('display_errors', TRUE);    
// ini_set('display_startup_errors', TRUE);
global $link;
$host = "localhost";
$user = "root";
$pass = "";
$db = "documents";
$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($link));

// if(!$link){die('Could not connect to database, '.mysql_error())};