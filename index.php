<?php
require('conn.php');
$title = basename($_SERVER['PHP_SELF']);
$year = date("Y");
if (isset($_POST['dateSubmit'])) {
    $from = mysqli_real_escape_string($link, $_POST['from']);
    $to = mysqli_real_escape_string($link, $_POST['to']);
    $currentYearRecords = $link->query("SELECT * FROM documents WHERE datein BETWEEN '$from' AND '$to'");
} elseif (isset($_POST['all'])) {
    $currentYearRecords = $link->query("SELECT * FROM documents");
} elseif (isset($_POST['monthSubmit'])) {
    $month = mysqli_real_escape_string($link, $_POST['month']);
    $currentYearRecords = $link->query("SELECT * FROM documents WHERE MONTH(datein) = '$month'");
} elseif (isset($_POST['quarterSubmit'])) {
    $quarter = mysqli_real_escape_string($link, $_POST['quarter']);
    if ($quarter == 1) {
        $from = 1;
        $to = 3;
    } elseif ($quarter == 2) {
        $from = 4;
        $to = 6;
    } elseif ($quarter == 3) {
        $from = 7;
        $to = 8;
    } else {
        $from = 9;
        $to = 12;
    }
    $currentYearRecords = $link->query("SELECT * FROM documents WHERE MONTH(datein) BETWEEN '$from' AND '$to'");
} else {
    $currentYearRecords = $link->query("SELECT * FROM documents WHERE YEAR(datein) = '$year' ORDER BY id DESC");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title><?php echo 'ອພ-ບພ - '.$title; ?></title> -->
    <title>ຂາອອກ-ຂາເຂົ້າ ກົມ ອພ-ບພ</title>
    <?php require('header.php'); ?>
</head>

<body class="bg-dark">
    <?php require('nav.php'); ?>
    <?php require('viewForm.php'); ?>
    <?php require('insertForm.php'); ?>
    <?php require('searchForm.php'); ?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col text-center m-1">
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#insertDocument" class="btn btn-lg btn-success me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                        </svg>
                        ເພີ່ມໃໝ່
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#searchDocument" class="btn btn-lg btn-primary me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        ຄົ້ນຫາ
                    </button>
                </div>
            </div>
        </div>
        <div class="row m-1 bg-light p-1">
            <div class="col">
                <table class="table display table-striped">
                    <thead class="text-center">
                        <!-- <tr>
                            <th colspan="9" class="d-none d-sm-table-cell d-md-table-cell d-lg-table-cell d-xl-table-cell">

                            </th>
                        </tr> -->
                        <tr>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w5 d-sm-table-cell d-md-table-cell">#</th>
                            <th colspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w15">ຂໍ້ມູນຂາເຂົ້າ</th>
                            <th colspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w15">ຂໍ້ມູນເອກະສານ</th>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w15 d-sm-table-cell d-md-table-cell">ມາຈາກພາກສ່ວນ</th>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w20">ເນື້ອໃນເອກະສານ</th>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w10 d-sm-table-cell d-md-table-cell">ສະຖານະ</th>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w10">ເຊັນໂດຍ</th>
                            <th rowspan="2" class="d-none d-table-cell d-lg-table-cell align-middle w10">ຜູ້ຮັບເອກະສານ<br>ວດປ</th>
                        </tr>
                        <tr>
                            <th class="d-none d-table-cell d-lg-table-cell">ເລກທີ</th>
                            <th class="d-none d-table-cell d-lg-table-cell">ວດປ</th>
                            <th class="d-none d-table-cell d-lg-table-cell">ເລກທີ</th>
                            <th class="d-none d-table-cell d-lg-table-cell">ວດປ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($ar = $currentYearRecords->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="d-none d-table-cell d-lg-table-cell">
                                    <input type="hidden" name="record" value="<?php echo $ar['id']; ?>">
                                    <div class="btn-group" role="group" aria-label="action">
                                        <button class="btn btn-sm btn-success viewButton" data-bs-toggle="modal" data-bs-target="#viewDocument" id="<?php echo $ar['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                            <!-- <?php echo substr($ar['noin'], 4); ?> -->
                                        </button>
                                        <button class="btn btn-sm btn-warning updateButton" id="<?php echo $ar['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-danger deleteButton" id="<?php echo $ar['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell">
                                    <?php echo $ar['noin']; ?>
                                </td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">
                                    <?php echo $ar['datein']; ?>
                                </td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell">
                                    <?php echo $ar['noout']; ?>
                                </td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell"><?php echo $ar['dateout']; ?></td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell"><?php echo $ar['department']; ?></td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell"><?php echo $ar['detail']; ?></td>
                                <td class="text-truncate text-center d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">
                                    <?php
                                    $statusButton = '';
                                    $status = $ar['status'];
                                    if ($status == 'ລໍຖ້າ') {
                                        $statusButton .= '<h5><span class="badge bg-secondary form-control">';
                                        $statusButton .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>';
                                        $statusButton .= $status . '</span></h5>';
                                        echo $statusButton;
                                    } elseif ($status == 'ເຊັນແລ້ວ') {
                                        $statusButton .= '<h5><span class="badge bg-primary form-control">';
                                        $statusButton .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
  <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
</svg>';
                                        $statusButton .= $status . '</span></h5>';
                                        echo $statusButton;
                                    } else {
                                        $statusButton .= '<h5><span class="badge bg-success form-control">';
                                        $statusButton .= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
  <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
  <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
</svg>';
                                        $statusButton .= $status . '</span></h5>';
                                        echo $statusButton;
                                    }
                                    ?>
                                </td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell"><?php echo @$ar['sign']; ?></td>
                                <td class="text-truncate d-none d-table-cell d-lg-table-cell">
                                    <?php
                                    if ($ar['taker']) {
                                        echo @$ar['taker'] . "_" . @$ar['takendate'];
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require('footer.php'); ?>
    <?php require('js.php'); ?>
    <script>
        // Swal.fire({
        //     position: 'top-end',
        //     icon: 'info',
        //     title: 'Welcome back, Sir!',
        //     showConfirmButton: false,
        //     timer: 5000
        // });
    </script>
</body>

</html>