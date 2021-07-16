<?php
require('conn.php');
$id = $_POST['id'];
echo $id;
$insert = $link->query("DELETE FROM documents WHERE id='$id'");
if($insert){
    echo "Deleted";
} else {
    echo "Error".mysqli_error($link);
}

?>