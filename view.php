<?php
require('conn.php');

// FETCH ID FROM AJAX
$id = $_POST['id'];

$select = $link->query("SELECT * FROM documents WHERE id = '$id'");

$row = $select->fetch_assoc();

// CREATE DOM TO MODAL BODY [VIEW FORM]
$tableModalBody = '';

$tableModalBody .='<table class="table">';
$tableModalBody .='<thead>';
$tableModalBody .='<tr>';
$tableModalBody .='<th colspan="2" class="text-center"># '.$row['noin'].' | '.$row['datein'].'</th>';
$tableModalBody .='</tr>';
$tableModalBody .='</thead>';
$tableModalBody .='<tbody>';
$tableModalBody .='<tr>';
$tableModalBody .='<td class="w30">ເລກທີ</td>';
$tableModalBody .= '<td class="w70">' . $row['noout'] . ' | ' . $row['dateout'] . '</td>';
$tableModalBody .='</tr>';
$tableModalBody .='<tr>';
$tableModalBody .='<td class="w30">ກົມກອງ</td>';
$tableModalBody .='<td class="w70">'.$row['department'].'</td>';
$tableModalBody .='</tr>';
$tableModalBody .='<tr>';
$tableModalBody .='<td colspan="2" class="text-center">'.$row['detail'].'</td>';
$tableModalBody .='</tr>';
if ($row['status'] == 'ລໍຖ້າ') {
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ສະຖານະ</></td>';
    $tableModalBody .= '<td class="w70"><button class="btn btn-sm btn-secondary form-control w75">';
    $tableModalBody .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg> ';
    $tableModalBody .=  $row['status'] . '</td>';
    $tableModalBody .= '</tr>';
} elseif ($row['status'] == 'ເຊັນແລ້ວ') {
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ສະຖານະ</></td>';
    $tableModalBody .= '<td class="w70"><button class="btn btn-sm btn-primary form-control w75">';
    $tableModalBody .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
  <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
</svg> ';
    $tableModalBody .=  $row['status'] . '</td>';
    $tableModalBody .= '</tr>';
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ເຊັນໂດຍ</td>';
    $tableModalBody .= '<td class="w70">' . $row['sign'] . '</td>';
    $tableModalBody .= '</tr>';
}else{
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ສະຖານະ</></td>';
    $tableModalBody .= '<td class="w70"><button class="btn btn-sm btn-success form-control w75">';
    $tableModalBody .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
</svg> ';
    $tableModalBody .=  $row['status'] . '</td>';
    $tableModalBody .= '</tr>';
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ເຊັນໂດຍ</td>';
    $tableModalBody .= '<td class="w70">' . $row['sign'] . '</td>';
    $tableModalBody .= '</tr>';
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ວດປ ປ່ອຍເອກະສານ</td>';
    $tableModalBody .= '<td class="w70">' . $row['takendate'] . '</td>';
    $tableModalBody .= '</tr>';
    $tableModalBody .= '<tr>';
    $tableModalBody .= '<td class="w30">ຮັບໂດຍ</td>';
    $tableModalBody .= '<td class="w70">' . $row['taker'] . '</td>';
    $tableModalBody .= '</tr>';
}
$tableModalBody .='</tbody>';
$tableModalBody .='</table>';

echo $tableModalBody;
?>
