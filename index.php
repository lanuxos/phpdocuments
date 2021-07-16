<?php
require('conn.php');
$title = basename($_SERVER['PHP_SELF']);
$allRecords = $link->query("SELECT doc.id, doc.noin, doc.datein, doc.noout, doc.dateout, dep.department, doc.detail, doc.status, sign.name, doc.takendate, doc.taker FROM documents as doc 
LEFT JOIN departments as dep ON doc.department = dep.id
LEFT JOIN sign ON doc.sign = sign.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php require('header.php'); ?>
</head>

<body class="bg-dark">
    <?php require('nav.php'); ?>
    <?php require('add.php'); ?>
    <?php require('search.php'); ?>
    <div class="container-fluid mt-1">
        <div class="row m-1 bg-light p-1">
            <div class="col">
                <table class="table display table-striped">
                    <thead class="text-center">
                        <tr>
                            <th colspan="9">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addDocument" class="btn btn-lg btn-success me-1">
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
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#" class="btn btn-lg btn-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                                        </svg>
                                        ທັງໝົດ
                                    </button>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="align-middle w-15">ຂໍ້ມູນຂາເຂົ້າ</th>
                            <th colspan="2" class="align-middle w-15">ຂໍ້ມູນເອກະສານ</th>
                            <th rowspan="2" class="align-middle w15">ຊື່ກົມກອງ</th>
                            <th rowspan="2" class="align-middle w25">ເນື້ອໃນເອກະສານ</th>
                            <th rowspan="2" class="align-middle w10">ເຊັນໂດຍ</th>
                            <th rowspan="2" class="align-middle w10">ວດປ ປ່ອຍເອກະສານ</th>
                            <th rowspan="2" class="align-middle w10">ສະຖານະ <br> ຜູ້ຮັບເອກະສານ</th>
                        </tr>
                        <tr>
                            <th>ເລກທີ</th>
                            <th>ວດປ</th>
                            <th>ເລກທີ</th>
                            <th>ວດປ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($ar = $allRecords->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-truncate">
                                    <button class="btn btn-sm btn-warning edit_btn" id="<?php echo $ar['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                        <?php echo $ar['noin']; ?>
                                    </button>
                                </td>
                                <td class="text-truncate">
                                    <?php echo $ar['id']; ?>
                                    <button class="btn btn-sm btn-danger delete_btn" id="<?php echo $ar['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                        <?php echo $ar['datein']; ?>
                                    </button>
                                </td>
                                <td class="text-truncate"><?php echo $ar['noout']; ?></td>
                                <td class="text-truncate"><?php echo $ar['dateout']; ?></td>
                                <td class="text-truncate"><?php echo $ar['department']; ?></td>
                                <td class="text-truncate"><?php echo $ar['detail']; ?></td>
                                <td class="text-truncate"><?php echo $ar['name']; ?></td>
                                <td class="text-truncate text-center">
                                    <?php
                                    $status = $ar['status'];
                                    if ($status == 'ລໍຖ້າ') {
                                        echo "<button class='btn btn-sm w75 btn-secondary' id='await'> $status </button>";
                                    } elseif ($status == 'ເຊັນແລ້ວ') {
                                        echo "<button class='btn btn-sm w75 btn-primary' id='signed'> $status </button>";
                                    } else {
                                        echo "<button class='btn btn-sm w75 btn-success' id='taken'> $status </button>";
                                    }
                                    ?>
                                </td>
                                <td class="text-truncate"><?php echo $ar['taker']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <!-- <tfoot class="text-center">
                        <tr>
                            <th colspan="2" class="align-middle w-15">ກົມ ອພ-ບພ</th>
                            <th colspan="2" class="align-middle w-15">ກົມກອງ</th>
                            <th rowspan="2" class="align-middle w15">ຊື່ກົມກອງ</th>
                            <th rowspan="2" class="align-middle w25">ເນື້ອໃນເອກະສານ</th>
                            <th rowspan="2" class="align-middle w10">ເຊັນໂດຍ</th>
                            <th rowspan="2" class="align-middle w10">ວດປ ປ່ອຍເອກະສານ</th>
                            <th rowspan="2" class="align-middle w10">ຜູ້ຮັບເອກະສານ</th>
                        </tr>
                        <tr>
                            <th>ເລກທີ</th>
                            <th>ວດປ</th>
                            <th>ເລກທີ</th>
                            <th>ວດປ</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
    <?php require('footer.php'); ?>
    <?php require('js.php'); ?>
</body>

</html>