<?php

require('conn.php');
$title = basename($_SERVER['PHP_SELF']);

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

<body class="">
    <?php require('nav.php'); ?>
    <?php require('viewForm.php'); ?>
    <?php require('insertForm.php'); ?>
    <?php require('searchForm.php'); ?>
    <div class="container-fluid mt-1">
        <div class="row m-1">
            <div class="btn-group text-center">
                <button class="btn btn-success w50" onclick="myFunction()">Toggle</button>
            </div>
        </div>
        <div class="row m-1 bg-light p-1 text-center">
            <div class="col-6 m-auto p-1 border text-truncate border-dark" id="myDIV1">
                <p>DIV#1</p>
            </div>
            <div class="col-6 m-auto p-1 border text-truncate border-success" id="myDIV2">
                <p>DIV#2</p>
            </div>
        </div>
        <div class="row">
            <?php
            $year = date("Y");
            $id1 = "123-2020";
            $id2 = "12-2021";
            // echo substr($id1, -4);
            // echo "<br>";
            // echo substr($id1, 0, -5);

            // echo "<br>";
            // echo substr($id2, -4);
            // echo "<br>";
            // echo substr($id2, 0, -5);
            ?>
            <table class="table table-responsive table-responsive-lg display">
                <thead>
                    <tr class="">
                        <th class="d-none d-table-cell d-lg-table-cell">01</th>
                        <th class="d-none d-table-cell d-lg-table-cell">02</th>
                        <th class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">03</th>
                        <th class="d-none d-table-cell d-lg-table-cell">04</th>
                        <th class="d-none d-table-cell d-lg-table-cell">05</th>
                        <th class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">06</th>
                        <th class="d-none d-table-cell d-lg-table-cell">07</th>
                        <th class="d-none d-table-cell d-lg-table-cell">08</th>
                        <th class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">09</th>
                        <th class="d-none d-table-cell d-lg-table-cell">10</th>
                        <th class="d-none d-table-cell d-lg-table-cell">11</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $link->query("select * from documents");
                    while($row=$sql->fetch_assoc()){
                    ?>
                    <tr>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['id']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['noin']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">
                            <?php echo @$row['datein']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['noout']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['dateout']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">
                            <?php echo @$row['department']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['detail']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell d-sm-table-cell d-md-table-cell">
                            <?php echo @$row['status']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['sign']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['takendate']; ?>
                        </td>
                        <td class="d-none d-table-cell d-lg-table-cell">
                            <?php echo @$row['taker']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require('footer.php');
    require('js.php'); ?>
    <script src="index.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script>
        // Swal.fire({
        //     title: 'Error!',
        //     text: 'Do you want to continue',
        //     icon: 'error',
        //     confirmButtonText: 'Cool'
        // })
    </script>
</body>

</html>