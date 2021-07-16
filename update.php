<?php
require('conn.php');
$id = $_POST['id'];

$noin = 123;
$department = mysqli_real_escape_string($link, $_POST['department']);
$no = mysqli_real_escape_string($link, $_POST['no']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$content = mysqli_real_escape_string($link, $_POST['content']);
$insert = $link->query("UPDATE `documents` SET `noout`='no', `dateout`='date', `department`='department', `detail`='content'");
if ($insert) {
    echo "Saved";
} else {
    echo "Error";
}

?>