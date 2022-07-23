<?php
session_start();
include '../dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Produk - Sinardunia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Beranda</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                            <li>
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
                            <li class="active"><a href="laporan.php"><span>Laporan Keuangan</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="jenis.php">Jenis</a></li>
                                    <li><a href="kriteria.php">Kriteria</a></li>
                                    <li><a href="alternatif.php">Alternatif</a></li>
                                    <li><a href="produk.php">Produk</a></li>
                                    <li><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
                            <li><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
                            <li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
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
                                            //
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->


            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                    <h2>Laporan Keuangan</h2>
                                </div>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <select class="form-control" name="bulan">
                                                <option value="semua">Semua Bulan</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="data-tables datatable-dark divToPrint">
                                    <table id="dataTable3" class="display" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Terjual</th>
                                                <th>Harga Satuan</th>
                                                <th>Total</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_pendapatan = 0;
                                            if (isset($_POST['bulan']) && $_POST['bulan'] != 'semua') {
                                                $bulan = $_POST['bulan'];
                                                $sql = 'SELECT * , SUM(detailorder.qty) as total, SUM(detailorder.qty)*produk.hargaafter as totalharga 
                                                        FROM `detailorder` 
                                                        JOIN produk ON detailorder.idproduk = produk.idproduk 
                                                        JOIN cart on detailorder.orderid = cart.orderid 
                                                        WHERE cart.status = "Selesai" AND MONTH(cart.tglorder) = "' . $bulan . '"
                                                        GROUP BY detailorder.idproduk';
                                            } else {
                                                $sql = 'SELECT * , SUM(detailorder.qty) as total, SUM(detailorder.qty)*produk.hargaafter as totalharga 
                                                        FROM `detailorder` 
                                                        JOIN produk ON detailorder.idproduk = produk.idproduk 
                                                        JOIN cart on detailorder.orderid = cart.orderid 
                                                        WHERE cart.status = "Selesai"
                                                        GROUP BY detailorder.idproduk';
                                            }

                                            $brgs = mysqli_query($conn, $sql);
                                            $no = 1;
                                            while ($p = mysqli_fetch_array($brgs)) {
                                                $total_pendapatan += $p["totalharga"];
                                                $tgl = mysqli_fetch_array(mysqli_query($conn, "SELECT tglorder FROM `cart` WHERE orderid='" . $p['orderid'] . "'"));
                                            ?>

                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $p["namaproduk"] ?></td>
                                                    <td><?php echo $p['total'] ?></td>
                                                    <td><?php echo number_format($p['hargaafter']) ?></td>
                                                    <td><?php echo number_format($p["totalharga"]) ?></td>
                                                    <td><?php echo $tgl["tglorder"] ?></td>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br />
                                    <h3>Total Pendapatan : <?php echo number_format($total_pendapatan) ?></h3>

                                </div>
                                <a href="#" onClick="printDiv()" class="btn btn-info mt-3">Cetak Laporan</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p> vivifurniture 2022</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- modal input -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan stok manual</h4>
                </div>
                <div class="modal-body">
                    <form action="tmb_brg_act.php" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <input name="jenis" type="text" class="form-control" placeholder="Jenis / Kategori Barang">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input name="stock" type="number" min="0" class="form-control" placeholder="Qty">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input name="harga" type="number" min="0" class="form-control" placeholder="Harga">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>

    <!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        function printDiv() {
            var divToPrint = document.getElementsByClassName('divToPrint');
            console.log(divToPrint);
            var popupWin = window.open('', '_blank', 'width=800,height=800');
            popupWin.document.open();
            popupWin.document.write(`
                <html>
                    <head>
                        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
                        <style>
                        table, th, td {
                            border: 1px solid;
                        }
                        .dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter{
                            display: none;
                        }
                        </style>
                    </head>
                    <body onload="window.print()">
                        <div style="text-align:center;">
                            <h1>DUTA SINARDUNIA</h1>
                            <h2>Laporan Keuangan</h2>
                            <p>Jl. LPA air dingin Lubuk Minturun, depan komplek villa anggrek</p>
                            <i>Telp: 0836 3773 9631. e-mail: assandro843@gmail.com</i>
                        </div>
                        <hr style="border-top: 4px solid black;">
                        ${divToPrint[0].outerHTML}
                        <div style="text-align:right;">
                            <h2 style="padding-right: 60px;">Pimpinan</h2>
                            <br></br>
                            <br></br>
                            <br></br>
                            <h2 style="padding-right: 60px;">Ce Mei Ing</h2>
                        </div>
                    </body>
                </html>`);
            popupWin.document.close();
        }
    </script>


</body>

</html>