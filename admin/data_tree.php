<?php

session_start();
include '../dbconnect.php';

function keputusan($data)
{
    global $conn;

    if ($data['stok'] >= 35) {
        $stok = "banyak";
    } else {
        $stok = "sedikit";
    }

    $sumjumlah =  mysqli_query($conn, "SELECT SUM(qty) as jumlah FROM detailorder WHERE idproduk='$data[idproduk]' GROUP BY idproduk");
    $jumlahterjual = mysqli_fetch_assoc($sumjumlah);

    // jumlah terjual
    if ($jumlahterjual >= 30) {
        $terjual = "banyak";
    } else {
        $terjual = "sedikit";
    }

    // harga
    if ($data['hargaafter'] >= 20000) {
        $harga = "mahal";
    } else {
        $harga = "murah";
    }

    // keputusan
    if ($terjual == "banyak" && $stok == "banyak" && $harga == "mahal" && $data['ukuran'] == "besar") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "mahal" && $data['ukuran'] == "kecil") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "murah" && $data['ukuran'] == "besar") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "murah" && $data['ukuran'] == "kecil") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "mahal" && $data['ukuran'] == "besar") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "mahal" && $data['ukuran'] == "kecil") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "murah" && $data['ukuran'] == "besar") {
        $keputusan = "Laris";
    } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "murah" && $data['ukuran'] == "kecil") {
        $keputusan = "Laris";
    } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "mahal" && $data['ukuran'] == "besar") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "mahal" && $data['ukuran'] == "kecil") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "murah" && $data['ukuran'] == "besar") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "murah" && $data['ukuran'] == "kecil") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "mahal" && $data['ukuran'] == "besar") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "mahal" && $data['ukuran'] == "kecil") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "murah" && $data['ukuran'] == "besar") {
        $keputusan = "Kurang Laris";
    } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "murah" && $data['ukuran'] == "kecil") {
        $keputusan = "Kurang Laris";
    } else {
        $keputusan = "There's something wrong with the rule";
    }

    return $keputusan;
}

//stok banyak
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE stok >= 35");
$stkbanyaklaris = 0;
$stkbanyakkurang = 0;
$stkbanyak = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $stkbanyak++;
        $kepu = keputusan($data);

        if ($kepu == 'Laris') {
            $stkbanyaklaris++;
        } else if ($kepu == 'Kurang Laris') {
            $stkbanyaklaris++;
        }
    }
}

//stok sedikit
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE stok < 35");
$stksedikitlaris = 0;
$stksedikitkurang = 0;
$stksedikit = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $stksedikit++;

        if ($kepu == 'Laris') {
            $stksedikitlaris++;
        } else if ($kepu == 'Kurang Laris') {
            $stksedikitkurang++;
        }
    }
}

// terjual banyak
$sql = mysqli_query($conn, "SELECT * FROM produk JOIN detailorder ON detailorder.idproduk=produk.idproduk WHERE detailorder.qty >= 30");
$tjbanyaklaris = 0;
$tjbanyakkurang = 0;
$tjbanyak = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $tjbanyak++;

        if ($kepu == 'Laris') {
            $tjbanyaklaris++;
        } else if ($kepu == 'Kurang Laris') {
            $tjbanyakkurang++;
        }
    }
}

// terjual sedikit
$sql = mysqli_query($conn, "SELECT * FROM produk JOIN detailorder ON detailorder.idproduk=produk.idproduk WHERE detailorder.qty < 30");
$tjsedikitlaris = 0;
$tjsedikitkurang = 0;
$tjsedikit = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $tjsedikit++;

        if ($kepu == 'Laris') {
            $tjsedikitlaris++;
        } else if ($kepu == 'Kurang Laris') {
            $tjsedikitkurang++;
        }
    }
}

//harga mahal
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE harga >= 20000");
$hrgmahallaris = 0;
$hrgmahalkurang = 0;
$hrgmahal = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $hrgmahal++;

        if ($kepu == 'Laris') {
            $hrgmahallaris++;
        } else if ($kepu == 'Kurang Laris') {
            $hrgmahalkurang++;
        }
    }
}


//harga murah
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE harga < 20000");
$hrgmurahlaris = 0;
$hrgmurahkurang = 0;
$hrgmurah = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $hrgmurah++;

        if ($kepu == 'Laris') {
            $hrgmurahlaris++;
        } else if ($kepu == 'Kurang Laris') {
            $hrgmurahkurang++;
        }
    }
}

//ukuran besar
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE ukuran < 'besar'");
$ukuranbesarllaris = 0;
$ukuranbesarlkurang = 0;
$ukuranbesar = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $ukuranbesar++;

        if ($kepu == 'Laris') {
            $ukuranbesarllaris++;
        } else if ($kepu == 'Kurang Laris') {
            $ukuranbesarlkurang++;
        }
    }
}

//kecil besar
$sql = mysqli_query($conn, "SELECT * FROM produk WHERE ukuran < 'kecil'");
$ukurankecillaris = 0;
$ukurankecilkurang = 0;
$ukurankecil = 0;

if ($sql) {
    while ($data = mysqli_fetch_assoc($sql)) {
        $kepu = keputusan($data);
        $ukurankecil++;

        if ($kepu == 'Laris') {
            $ukurankecillaris++;
        } else if ($kepu == 'Kurang Laris') {
            $ukurankecilkurang++;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Sinardunia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">


    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="page-container">

        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="index.php"><span>Beranda</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                            <li>
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
                            <li><a href="laporan.php"><span>Laporan Keuangan</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk</a></li>
                                    <li><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
                            <li><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
                            <li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li><a href="data_output.php"><span>C.45 - Data</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>


        <div class="main-content">

            <div class="header-area">
                <div class="row align-items-center">

                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-content-inner">

                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="page-title">
                                        <div class="title_left">
                                            <h3>POHON KEPUTUSAN</h3>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 ">
                                            <div class="x_panel">
                                                <div class="text-right">
                                                    <h2>
                                                        <small>
                                                            <a href="?page=c45/data_output" class="btn btn-danger">Kembali</a>
                                                            <a href="?page=c45/data_node" class="btn btn-primary">Perhitungan Node</a>
                                                        </small>
                                                    </h2>
                                                    <ul class="nav navbar-right panel_toolbox">
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box table-responsive">

                                                                <table class="table table-bordered">
                                                                    <tr class="bg-dark text-white text-center">
                                                                        <th colspan="6">RULE</th>
                                                                        <th>KEPUTUSAN</th>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="bg-primary font-weight-bold" style="width: 170px;">Jumlah Terjual (Banyak = <?= $tjbanyak ?>, Sedikit = <?= $tjsedikit ?>) </td>
                                                                        <td colspan="5"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold text-center">Banyak (<?= $tjbanyak ?>) </td>
                                                                        <td>Laris = <?= $tjbanyaklaris ?> </td>
                                                                        <td>Kurang Laris = <?= $tjbanyakkurang ?> </td>
                                                                        <td class="bg-success font-weight-bold text-center">Laris</td>
                                                                        <td colspan="2"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="font-weight-bold text-center">Sedikit (<?= $tjsedikit ?>) </td>
                                                                        <td>Laris = <?= $tjsedikitlaris ?> </td>
                                                                        <td>Kurang Laris = <?= $tjsedikitkurang ?> </td>
                                                                        <td class="bg-info font-weight-bold text-center">?</td>
                                                                        <td colspan="2"></td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="bg-primary font-weight-bold" style="width: 170px;">Stok Barang(Sedikit = <?= $stksedikit ?>, Banyak = <?= $stkbanyak ?>) </td>
                                                                        <td colspan="4"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="font-weight-bold text-center">Sedikit (<?= $stksedikit ?>) </td>
                                                                        <td>Laris = <?= $stksedikitlaris ?> </td>
                                                                        <td>Kurang Laris = <?= $stksedikitkurang ?> </td>
                                                                        <td class="bg-warning font-weight-bold text-center">Kurang Laris</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="font-weight-bold text-center">Banyak (<?= $stkbanyak ?>) </td>
                                                                        <td>Laris = <?= $stkbanyaklaris ?> </td>
                                                                        <td>Kurang Laris = <?= $stkbanyakkurang ?> </td>
                                                                        <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td class="bg-primary font-weight-bold" style="width: 170px;">Harga (Mahal = <?= $hrgmahal ?>, Murah = <?= $hrgmurah ?>) </td>
                                                                        <td colspan="3"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td class="font-weight-bold text-center">Mahal (<?= $hrgmahal ?>) </td>
                                                                        <td>Laris = <?= $hrgmahallaris ?> </td>
                                                                        <td>Kurang Laris = <?= $hrgmahalkurang ?> </td>
                                                                        <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td class="font-weight-bold text-center">Murah (<?= $hrgmurah ?>) </td>
                                                                        <td>Laris = <?= $hrgmurahlaris ?> </td>
                                                                        <td>Kurang Laris = <?= $hrgmurahkurang ?> </td>
                                                                        <td class="bg-success font-weight-bold text-center">Laris</td>
                                                                        <td></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td class="bg-primary font-weight-bold" style="width: 170px;">Ukuran (besar = <?= $ukuranbesar ?>, kecil = <?= $ukurankecil ?>) </td>
                                                                        <td colspan="2"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td class="font-weight-bold text-center">besar (<?= $ukuranbesar ?>) </td>
                                                                        <td>Laris = <?= $ukuranbesarllaris ?> </td>
                                                                        <td>Kurang Laris = <?= $ukuranbesarlkurang ?> </td>
                                                                        <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3"></td>
                                                                        <td class="font-weight-bold text-center">kecil (<?= $ukurankecil ?>) </td>
                                                                        <td>Laris = <?= $ukurankecillaris ?> </td>
                                                                        <td>Kurang Laris = <?= $ukurankecilkurang ?> </td>
                                                                        <td class="bg-success font-weight-bold text-center">Laris</td>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <footer>
            <div class="footer-area">
                <p>by Adam's Dev</p>
            </div>
        </footer>

    </div>


    <!-- 
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script> -->

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <script src="assets/js/line-chart.js"></script>

    <script src="assets/js/pie-chart.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>