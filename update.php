<?php
require('conn.php');

// FETCH ID FROM AJAX
$id = $_POST['id'];

// FETCH RECORD DATA VIA ID
$select = $link->query("SELECT * FROM documents WHERE id = '$id'");

$row = $select->fetch_assoc();

// ENCODE TO JSON TYPE, TO MANIPULATE INSERT FORM DOM
echo json_encode($row);

?>