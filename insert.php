<?php
require('conn.php');

// Insert Record
// $now = date('Y-m-d');
$noin = 123;
$department = mysqli_real_escape_string($link, $_POST['department']);
$no = mysqli_real_escape_string($link, $_POST['no']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$content = mysqli_real_escape_string($link, $_POST['content']);
$insert = $link->query("INSERT INTO `documents` (`id`, `noin`, `datein`, `noout`, `dateout`, `department`, `detail`, `status`, `sign`, `takendate`, `taker`) VALUES (NULL, '1234', NOW(), '$no', '$date', '2', '$content', 'ລໍຖ້າ', NULL, NULL, NULL)");
if($insert){
    echo "Saved";
} else {
    echo "Error";
}

?>