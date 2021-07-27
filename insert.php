<?php
require('conn.php');

// ຮັບຄ່າ ID ທີ່ສົ່ງມາຜ່ານ AJAX
$id = $_POST['id'];

$no = mysqli_real_escape_string($link, $_POST['no']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$department = mysqli_real_escape_string($link, $_POST['department']);
$detail = mysqli_real_escape_string($link, $_POST['content']);
if ($_POST['status']){
    $status = mysqli_real_escape_string($link, $_POST['status']);
} else {
    $status = 'ລໍຖ້າ';
}
if ($_POST['sign']){
    $sign = mysqli_real_escape_string($link, $_POST['sign']);
} else {
    $sign = NULL;
}
if ($_POST['takenDate']){
    $takenDate = mysqli_real_escape_string($link, $_POST['takenDate']);
} else {
    $takenDate = NULL;
}
if ($_POST['taker']){
    $taker = mysqli_real_escape_string($link, $_POST['taker']);
} else {
    $taker = NULL;
}

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
    $start = 1;
    $noin = '';
    $sql = $link->query("select noin from documents order by id desc limit 1");
    $fetch = $sql->fetch_assoc();
    if ($f = $fetch['noin']) {
        if (substr($fetch['noin'], -4) == $year) {
            $continue = substr($f, 0, -5);
            $continue = intval($continue);
            $continue += 1;
            $noin = $continue . "-" . $year;
        } else {
            $noin = $start . "-" . $year;
        }
    } else {
        $noin = $start . "-" . $year;
    }
    $insert = $link->query("INSERT INTO `documents` (`id`, `noin`, `datein`, `noout`, `dateout`, `department`, `detail`, `status`, `sign`, `takendate`, `taker`) VALUES (NULL, '$noin', NOW(), '$no', '$date', '$department', '$detail', '$status', '$sign', '$takenDate', '$taker')");
    if ($insert) {
        echo "Saved";
    } else {
        echo "Insert Error".mysqli_error($link);
    }
}


?>