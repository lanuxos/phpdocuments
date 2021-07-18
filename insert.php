<?php
require('conn.php');

// ຮັບຄ່າ ID ທີ່ສົ່ງມາຜ່ານ AJAX
$id = $_POST['id'];

$no = mysqli_real_escape_string($link, $_POST['no']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$department = mysqli_real_escape_string($link, $_POST['department']);
$detail = mysqli_real_escape_string($link, $_POST['content']);
$status = mysqli_real_escape_string($link, $_POST['status']);
$sign = mysqli_real_escape_string($link, $_POST['sign']);
$takenDate = mysqli_real_escape_string($link, $_POST['takenDate']);
$taker = mysqli_real_escape_string($link, $_POST['taker']);

// ຫາກ ID ມີຄ່າ, ໃຫ້ປັບປຸງຖານຂໍ້ມູນ ໂດຍອ້າງອີງຈາກ ID ທີ່ຮັບມາ
if($id!=''){
    // Update Record
    $update = $link->query("UPDATE `documents` SET `noout` = '$no', `dateout` = '$date', `department` = '$department', `detail` = '$detail', `status` = '$status', `sign` = '$sign', `takendate` = '$takenDate', `taker` = '$taker' WHERE `documents`.`id` = '$id' ");
    if ($update) {
        echo "Update";
    } else {
        echo "UpdateError".mysqli_error($link);
    }
// ຫາກ ID ບໍ່ມີຄ່າ, ໃຫ້ເພີ່ມຂໍ້ມູນໃໝ່ລົງຖານຂໍ້ມູນ
} else {
    // Insert Record
    $year = date("Y");
    $noin = '';
    $checkid = $link->query("SELECT `noin` FROM `documents` ORDER BY id DESC LIMIT 1");
    $checked = $checkid->fetch_assoc();
    if ($checked && substr($checked['noin'], 0, 4) == $year) {
        $noin = intval($checked['noin']) + 1;
    } else {
        $noin = $year."1";
    }
    $insert = $link->query("INSERT INTO `documents` (`id`, `noin`, `datein`, `noout`, `dateout`, `department`, `detail`, `status`, `sign`, `takendate`, `taker`) VALUES (NULL, '$noin', NOW(), '$no', '$date', '$department', '$detail', 'ລໍຖ້າ', NULL, NULL, NULL)");
    if ($insert) {
        echo "Saved";
    } else {
        echo "Insert Error".mysqli_error($link);
    }
}


?>