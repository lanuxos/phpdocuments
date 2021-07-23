<?php
require('conn.php');
$id = $_POST['id'];
// echo $id;
$delete = $link->query("DELETE FROM documents WHERE id='$id'");
// echo "<script>Sqal.fire({
//                         icon: 'success',
//                         title: 'ລາຍການຖືກລົບອອກຈາກຖານຂໍ້ມູນແລ້ວ',
//                         showConfirmButton: false,
//                         timer: 3000
//                     });</script>";
if($delete){
    echo "Deleted";
} else {
    echo "Error".mysqli_error($link);
}

?>