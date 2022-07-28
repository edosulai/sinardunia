<?php
session_start();
include '../dbconnect.php';

// $itungcust = mysqli_query($conn, "select count(userid) as jumlahcust from login WHERE role='Member'");
// $itungcust2 = mysqli_fetch_assoc($itungcust);
// $itungcust3 = $itungcust2['jumlahcust'];

// $itungorder = mysqli_query($conn, "select count(idcart) as jumlahorder from cart WHERE status not like 'Selesai' and status not like 'Canceled'");
// $itungorder2 = mysqli_fetch_assoc($itungorder);
// $itungorder3 = $itungorder2['jumlahorder'];

// $itungtrans = mysqli_query($conn, "select count(orderid) as jumlahtrans from konfirmasi");
// $itungtrans2 = mysqli_fetch_assoc($itungtrans);
// $itungtrans3 = $itungtrans2['jumlahtrans'];

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
                                <div>
                                    <!-- <code>IF (TERJUAL = BANYAK) THEN <i>LARIS</i></code>
                                    <br>
                                    <code>IF (TERJUAL = SEDIKIT) AND (STOK = BANYAK) AND (HARGA = MAHAL) THEN <i>TIDAK LARIS</i></code>
                                    <br>
                                    <code>IF (TERJUAL = SEDIKIT) AND (STOK = BANYAK) AND (HARGA = MURAH) THEN <i>LARIS</i></code>
                                    <br>
                                    <code>IF (TERJUAL = SEDIKIT) AND (STOK = SEDIKIT) THEN <i>TIDAK LARIS</i></code> -->

                                    <code>IF terjual == banyak AND stok == banyak AND harga == mahal AND ukuran == besar THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == banyak AND harga == mahal AND ukuran == kecil THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == banyak AND harga == murah AND ukuran == besar THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == banyak AND harga == murah AND ukuran == kecil THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == sedikit AND harga == mahal AND ukuran == besar THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == sedikit AND harga == mahal AND ukuran == kecil THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == sedikit AND harga == murah AND ukuran == besar THEN keputusan = Laris</code><br>
                                    <code>IF terjual == banyak AND stok == sedikit AND harga == murah AND ukuran == kecil THEN keputusan = Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == banyak AND harga == mahal AND ukuran == besar THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == banyak AND harga == mahal AND ukuran == kecil THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == banyak AND harga == murah AND ukuran == besar THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == banyak AND harga == murah AND ukuran == kecil THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == sedikit AND harga == mahal AND ukuran == besar THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == sedikit AND harga == mahal AND ukuran == kecil THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == sedikit AND harga == murah AND ukuran == besar THEN keputusan = Kurang Laris</code><br>
                                    <code>IF terjual == sedikit AND stok == sedikit AND harga == murah AND ukuran == kecil THEN keputusan = Kurang Laris</code><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="page-title">
                                        <div class="title_left">
                                            <h3>OUTPUT C45</h3>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 ">
                                            <div class="x_panel">
                                                <div class="text-right">
                                                    <h2>
                                                        <small>
                                                            <a href="data_tree.php" class="btn btn-success">Pohon Keputusan</a>
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
                                                                <table id="" class="table table-bordered" style="width:100%">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Nomor</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Harga Barang</th>
                                                                            <th>Ukuran Barang</th>
                                                                            <th>Stok Barang</th>
                                                                            <th>Jumlah Terjual</th>
                                                                            <th>Keputusan</th>
                                                                            <!-- <th>Action</th> -->
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <?php
                                                                        $alldata = mysqli_query($conn, "SELECT * FROM produk");
                                                                        $no = 1;
                                                                        while ($data = mysqli_fetch_assoc($alldata)) {

                                                                            if ($data['stok'] >= 35) {
                                                                                $stok = "banyak";
                                                                            } else {
                                                                                $stok = "sedikit";
                                                                            }

                                                                            $sumjumlah =  mysqli_query($conn, "SELECT SUM(qty) as jumlah FROM detailorder WHERE idproduk='$data[idproduk]' GROUP BY idproduk");
                                                                            $jumlahterjual = mysqli_fetch_assoc($sumjumlah);
                                                                            // echo '<pre>';
                                                                            // var_dump($jumlahterjual);
                                                                            // var_dump($jumlahterjual >= 30);
                                                                            // echo '</pre>';

                                                                            // jumlah terjual
                                                                            if ($jumlahterjual['jumlah'] >= 30) {
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

                                                                            // if ($terjual == "banyak") {
                                                                            //     $keputusan = "Laris";
                                                                            // } else if ($terjual == "sedikit" && $stok == "banyak" && $harga == "mahal") {
                                                                            //     $keputusan = "Kurang Laris";
                                                                            // } else if ($terjual == "sedikit" && $stok == "banyak" && $harga == "murah") {
                                                                            //     $keputusan = "Laris";
                                                                            // } else if ($terjual == "sedikit" && $stok == "sedikit") {
                                                                            //     $keputusan = "Kurang Laris";
                                                                            // }

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
                                                                        ?>

                                                                            <tr>
                                                                                <td><?php echo $no++ ?></td>
                                                                                <td><?php echo $data['namaproduk'] ?></td>
                                                                                <td><?php echo $harga ?></td>
                                                                                <td><?php echo $data['ukuran'] ?></td>
                                                                                <td><?php echo $stok ?></td>
                                                                                <td><?php echo $terjual ?></td>

                                                                                <?php
                                                                                if ($keputusan == 'Laris') {
                                                                                ?>
                                                                                    <td class="text-white bg-success"><?php echo $keputusan ?></td>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <td class="text-white bg-danger"><?php echo $keputusan ?></td>
                                                                                <?php } ?>

                                                                            </tr>

                                                                        <?php } ?>
                                                                    </tbody>
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