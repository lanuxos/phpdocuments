<?php
require('conn.php');
$title = basename($_SERVER['PHP_SELF']);
$all = $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;
$q1 = $q2 = $q3 = $q4 = $jan1 = $feb1 = $mar1 = $apr2 = $may2 = $jun2 = $jul3 = $aug3 = $sep3 = $oct4 = $nov4 = $dec4 = 0;
$year = date("Y");
$month = date("m");
$sqlAnnual = $link->query("select * from documents where year(datein) = $year");
while ($rows = $sqlAnnual->fetch_assoc()) {
    $all += 1;
    $row = strtotime($rows['datein']);
    if (date('m', $row) == "01") {
        $jan += 1;
    } elseif (date('m', $row) == "02") {
        $feb += 1;
    } elseif (date('m', $row) == "03") {
        $mar += 1;
    } elseif (date('m', $row) == "04") {
        $apr += 1;
    } elseif (date('m', $row) == "05") {
        $may += 1;
    } elseif (date('m', $row) == "06") {
        $jun += 1;
    } elseif (date('m', $row) == "07") {
        $jul += 1;
    } elseif (date('m', $row) == "08") {
        $aug += 1;
    } elseif (date('m', $row) == "09") {
        $sep += 1;
    } elseif (date('m', $row) == "10") {
        $oct += 1;
    } elseif (date('m', $row) == "11") {
        $nov += 1;
    } elseif (date('m', $row) == "12") {
        $dec += 1;
    }
}
$sqlQ1 = $link->query("select * from documents where year(datein) = $year");
while ($rows = $sqlQ1->fetch_assoc()) {
    $row = strtotime($rows['datein']);
    if (date('m', $row) == "01") {
        $q1 += 1;
        $jan1 += 1;
    } elseif (date('m', $row) == "02") {
        $q1 += 1;
        $feb1 += 1;
    } elseif (date('m', $row) == "03") {
        $q1 += 1;
        $mar1 += 1;
    }
}
$sqlQ2 = $link->query("select * from documents where year(datein) = $year");
while ($rows = $sqlQ2->fetch_assoc()) {
    $row = strtotime($rows['datein']);
    if (date('m', $row) == "04") {
        $q2 += 1;
        $apr2 += 1;
    } elseif (date('m', $row) == "05") {
        $q2 += 1;
        $may2 += 1;
    } elseif (date('m', $row) == "06") {
        $q2 += 1;
        $jun2 += 1;
    }
}
$sqlQ3 = $link->query("select * from documents where year(datein) = $year");
while ($rows = $sqlQ3->fetch_assoc()) {
    $row = strtotime($rows['datein']);
    if (date('m', $row) == "07") {
        $q3 += 1;
        $jul3 += 1;
    } elseif (date('m', $row) == "08") {
        $q3 += 1;
        $aug3 += 1;
    } elseif (date('m', $row) == "09") {
        $q3 += 1;
        $sep3 += 1;
    }
}
$sqlQ4 = $link->query("select * from documents where year(datein) = $year");
while ($rows = $sqlQ4->fetch_assoc()) {
    $row = strtotime($rows['datein']);
    if (date('m', $row) == "10") {
        $q4 += 1;
        $oct4 += 1;
    } elseif (date('m', $row) == "11") {
        $q4 += 1;
        $nov4 += 1;
    } elseif (date('m', $row) == "12") {
        $q4 += 1;
        $dec4 += 1;
    }
}
$total = 'ເອກະສານທັງໝົດ ' . $all;
$currentYearRecords = $link->query("SELECT * FROM documents WHERE YEAR(datein) = '$year' ORDER BY id");
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
    <?php require('viewForm.php'); ?>
    <?php require('insertForm.php'); ?>
    <?php require('searchForm.php'); ?>
    <div class="container-fluid mt-1">
        <div class="row m-1 bg-light p-3">
            <div class="col">
                <div class="text-center m-3">
                    <canvas id="myChart" height="300" width="700"></canvas>
                </div>
            </div>
        </div>
        <div class="row m-1 bg-light p-1">
            <div class="col">
                <table class="table table-responsive table-striped">
                    <caption style="caption-side: top;" class="text-center fs-3 fw-bold fst-italic text-decoration-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                        </svg>
                        ລາຍການເອກະສານປະຈຳປີ <?php echo $year; ?>
                    </caption>
                    <thead class="text-center">
                        <!-- <tr>
                            <th colspan="9" class="text-center"></th>
                        </tr> -->
                        <tr>
                            <th colspan="2" class="align-middle w-15">ຂໍ້ມູນຂາເຂົ້າ</th>
                            <th colspan="2" class="align-middle w-15">ຂໍ້ມູນເອກະສານ</th>
                            <th rowspan="2" class="align-middle w15">ມາຈາກພາກສ່ວນ</th>
                            <th rowspan="2" class="align-middle w25">ເນື້ອໃນເອກະສານ</th>
                            <th rowspan="2" class="align-middle w10">ສະຖານະ</th>
                            <th rowspan="2" class="align-middle w10">ເຊັນໂດຍ</th>
                            <th rowspan="2" class="align-middle w10">ຜູ້ຮັບເອກະສານ<br>ວດປ</th>
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
                        while ($ar = $currentYearRecords->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-truncate"><?php echo $ar['noin']; ?></td>
                                <td class="text-truncate"><?php echo $ar['datein']; ?></td>
                                <td class="text-truncate"><?php echo $ar['noout']; ?></td>
                                <td class="text-truncate"><?php echo $ar['dateout']; ?></td>
                                <td class="text-truncate"><?php echo $ar['department']; ?></td>
                                <td class="text-truncate"><?php echo $ar['detail']; ?></td>
                                <td class="text-truncate text-center"><?php echo $ar['status']; ?></td>
                                <td class="text-truncate"><?php echo @$ar['sign']; ?></td>
                                <td class="text-truncate">
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
        var ctx = document.getElementById('myChart').getContext('2d');
        Chart.defaults.global.defaultFontFamily = "'defago', 'Defago Noto Sans', 'Phetsarath OT'";
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['ມັງກອນ', 'ກຸມພາ', 'ມີນາ', 'ເມສາ', 'ພຶດສະພາ', 'ມີຖຸນາ', 'ກໍລະກົດ', 'ສິງຫາ', 'ກັນຍາ', 'ຕຸລາ', 'ພະຈິກ', 'ທັນວາ'],
                datasets: [{
                        label: 'ຈຳນວນເອກະສານທັງໝົດ: ' + <?php echo $all; ?> + ' ລາຍການ',
                        data: [
                            <?php echo $jan; ?>,
                            <?php echo $feb; ?>,
                            <?php echo $mar; ?>,
                            <?php echo $apr; ?>,
                            <?php echo $may; ?>,
                            <?php echo $jun; ?>,
                            <?php echo $jul; ?>,
                            <?php echo $aug; ?>,
                            <?php echo $sep; ?>,
                            <?php echo $oct; ?>,
                            <?php echo $nov; ?>,
                            <?php echo $dec; ?>,
                        ],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 2
                    },
                    {
                        label: 'ຈຳນວນເອກະສານໄຕມາດ 1: ' + <?php echo $q1; ?> + ' ລາຍການ',
                        data: [
                            <?php echo $jan1; ?>,
                            <?php echo $feb1; ?>,
                            <?php echo $mar1; ?>,
                            0, 0, 0, 0, 0, 0, 0, 0, 0
                        ],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'ຈຳນວນເອກະສານໄຕມາດ 2: ' + <?php echo $q2; ?> + ' ລາຍການ',
                        data: [
                            0, 0, 0,
                            <?php echo $apr2; ?>,
                            <?php echo $may2; ?>,
                            <?php echo $jun2; ?>,
                            0, 0, 0, 0, 0, 0
                        ],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'ຈຳນວນເອກະສານໄຕມາດ 3: ' + <?php echo $q3; ?> + ' ລາຍການ',
                        data: [
                            0, 0, 0, 0, 0, 0,
                            <?php echo $jul3; ?>,
                            <?php echo $aug3; ?>,
                            <?php echo $sep3; ?>,
                            0, 0, 0
                        ],
                        backgroundColor: [
                            // 'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            // 'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'ຈຳນວນເອກະສານໄຕມາດ 4: ' + <?php echo $q4; ?> + ' ລາຍການ',
                        data: [
                            0, 0, 0, 0, 0, 0, 0, 0, 0,
                            <?php echo $oct4; ?>,
                            <?php echo $nov4; ?>,
                            <?php echo $dec4; ?>,
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            // 'rgba(54, 162, 235, 0.2)',
                            // 'rgba(255, 206, 86, 0.2)',
                            // 'rgba(75, 192, 192, 0.2)',
                            // 'rgba(153, 102, 255, 0.2)',
                            // 'rgba(255, 159, 64, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            // 'rgba(54, 162, 235, 1)',
                            // 'rgba(255, 206, 86, 1)',
                            // 'rgba(75, 192, 192, 1)',
                            // 'rgba(153, 102, 255, 1)',
                            // 'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20,
                                family: ['Phetsarath OT', 'Defago Noto Sans', 'Times New Roman']
                            },
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>