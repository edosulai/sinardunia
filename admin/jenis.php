<?php
session_start();
include '../dbconnect.php';

if (isset($_POST['addjenis'])) {

    $namajenis = $_POST['namajenis'];
    $idkriteria = $_POST['idkriteria'];
    $idalternatif = $_POST['idalternatif'];

    $ahpparam = [
        "kriteria" => array_map('intval', $idkriteria),
        "alternatif" => array_map('intval', $idalternatif)
    ];

    $kriteria = [];
    $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
    while ($row = mysqli_fetch_array($sql_kriteria)) {
        if (in_array($row['idkriteria'], $idkriteria)) {
            $kriteria[] = $row;
        }
    }

    $alternatif = [];
    $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
    while ($row = mysqli_fetch_array($sql_alternatif)) {
        if (in_array($row['idalternatif'], $idalternatif)) {
            $alternatif[] = $row;
        }
    }

    $ahpsetting = [];

    for ($j = 0; $j < count($kriteria); $j++) {
        for ($k = $j + 1; $k < count($kriteria); $k++) {
            $id = $kriteria[$j]['idkriteria'] . "-" . $kriteria[$k]['idkriteria'];
            $ahpsetting['kriteria'][$id] = 0;
        }
    }

    foreach ($kriteria as $krit) {
        for ($j = 0; $j < count($alternatif); $j++) {
            for ($k = $j + 1; $k < count($alternatif); $k++) {
                $id = $krit['idkriteria'] . "-" . $alternatif[$j]['idalternatif'] . "-" . $alternatif[$k]['idalternatif'];
                $ahpsetting['alternatif'][$id] = 0;
            }
        }
    }

    $ahpparam = json_encode($ahpparam);
    $ahpsetting = json_encode($ahpsetting);

    $tambahkat = mysqli_query($conn, "INSERT INTO jenis (namajenis, ahpparam, ahpsetting) values ('$namajenis','$ahpparam','$ahpsetting')");
    if ($tambahkat) {
        echo "<meta http-equiv='refresh' content='0; url= jenis.php'/>  ";
    } else {
        echo "<meta http-equiv='refresh' content='0; url= jenis.php'/> ";
    }
} elseif (isset($_POST['editjenis'])) {

    $namajenis = $_POST['namajenis'];
    $idkriteria = $_POST['idkriteria'];
    $idalternatif = $_POST['idalternatif'];
    $idjenis = $_POST['idjenis'];

    $ahpparam = [
        "kriteria" => array_map('intval', $idkriteria),
        "alternatif" => array_map('intval', $idalternatif)
    ];

    $kriteria = [];
    $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
    while ($row = mysqli_fetch_array($sql_kriteria)) {
        if (in_array($row['idkriteria'], $idkriteria)) {
            $kriteria[] = $row;
        }
    }

    $alternatif = [];
    $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
    while ($row = mysqli_fetch_array($sql_alternatif)) {
        if (in_array($row['idalternatif'], $idalternatif)) {
            $alternatif[] = $row;
        }
    }

    $ahpsetting = [];

    for ($j = 0; $j < count($kriteria); $j++) {
        for ($k = $j + 1; $k < count($kriteria); $k++) {
            $id = $kriteria[$j]['idkriteria'] . "-" . $kriteria[$k]['idkriteria'];
            $ahpsetting[$id] = isset($_POST[$id]) ? $_POST[$id] : 0;
        }
    }

    foreach ($kriteria as $krit) {
        for ($j = 0; $j < count($alternatif); $j++) {
            for ($k = $j + 1; $k < count($alternatif); $k++) {
                $id = $krit['idkriteria'] . "-" . $alternatif[$j]['idalternatif'] . "-" . $alternatif[$k]['idalternatif'];
                $ahpsetting[$id] = isset($_POST[$id]) ? $_POST[$id] : 0;
            }
        }
    }

    $ahpparam = json_encode($ahpparam);
    $ahpsetting = json_encode($ahpsetting);

    $editkat = mysqli_query($conn, "UPDATE jenis SET namajenis='$namajenis', ahpparam='$ahpparam', ahpsetting='$ahpsetting' WHERE idjenis='$idjenis'") or die(mysqli_error($conn)());
    if ($editkat) {
        echo "<meta http-equiv='refresh' content='0; url= jenis.php'/>  ";
    } else {
        echo "<meta http-equiv='refresh' content='0; url= jenis.php'/> ";
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Jenis - Sinardunia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- <div id="preloader">
        <div class="loader"></div>
    </div> -->


    <div class="page-container">

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
                            <li><a href="laporan.php"><span>Laporan Keuangan</span></a></li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="jenis.php">Jenis</a></li>
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
                                            // var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            // var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            // var date = new Date();
                                            // var day = date.getDate();
                                            // var month = date.getMonth();
                                            // var thisDay = date.getDay(),
                                            //     thisDay = myDays[thisDay];
                                            // var yy = date.getYear();
                                            // var year = (yy < 1000) ? yy + 1900 : yy;
                                            // document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                            // //
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
            if (@$_GET['p'] == 'edit') {
                $jenis = mysqli_query($conn, "SELECT * FROM jenis WHERE idjenis='" . $_GET['id'] . "'") or die(mysqli_error($conn)());
                $jenis = mysqli_fetch_array($jenis);

                $kriteria = [];
                $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                while ($row = mysqli_fetch_array($sql_kriteria)) {
                    if (in_array($row['idkriteria'], json_decode($jenis['ahpparam'])->kriteria)) {
                        $kriteria[] = $row;
                    }
                }

                $alternatif = [];
                $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
                while ($row = mysqli_fetch_array($sql_alternatif)) {
                    if (in_array($row['idalternatif'], json_decode($jenis['ahpparam'])->alternatif)) {
                        $alternatif[] = $row;
                    }
                }

            ?>
                <div class="main-content-inner">
                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <h2>Edit Jenis</h2>
                                    </div>

                                    <div>
                                        <form method="post">
                                            <input type="hidden" name="idjenis" value="<?= $jenis['idjenis'] ?>">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama Jenis</label>
                                                    <input name="namajenis" type="text" class="form-control" required autofocus value="<?= $jenis['namajenis'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label>Kriteria</label>
                                                    <select multiple name="idkriteria[]" class="form-control">
                                                        <?php
                                                        $det = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY namakriteria ASC") or die(mysqli_error($conn)());
                                                        while ($d = mysqli_fetch_array($det)) { ?>
                                                            <option <?= in_array($d['idkriteria'], json_decode($jenis['ahpparam'])->kriteria) ? 'selected' : '' ?> value="<?= $d['idkriteria'] ?>"><?= $d['namakriteria'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Alternatif</label>
                                                    <select multiple name="idalternatif[]" class="form-control">
                                                        <?php
                                                        $det = mysqli_query($conn, "SELECT * FROM alternatif ORDER BY namaalternatif ASC") or die(mysqli_error($conn)());
                                                        while ($d = mysqli_fetch_array($det)) { ?>
                                                            <option <?= in_array($d['idalternatif'], json_decode($jenis['ahpparam'])->alternatif) ? 'selected' : '' ?> value="<?= $d['idalternatif'] ?>"><?= $d['namaalternatif'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Skala Kriteria</label>

                                                    <table border="1" cellspacing="0" class="table">
                                                        <thead>
                                                            <tr>
                                                                <td>Kriteria 1</td>
                                                                <td>9</td>
                                                                <td>8</td>
                                                                <td>7</td>
                                                                <td>6</td>
                                                                <td>5</td>
                                                                <td>4</td>
                                                                <td>3</td>
                                                                <td>2</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td>4</td>
                                                                <td>5</td>
                                                                <td>6</td>
                                                                <td>7</td>
                                                                <td>8</td>
                                                                <td>9</td>
                                                                <td>Kriteria 2</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            for ($j = 0; $j < count($kriteria); $j++) {
                                                                for ($k = $j + 1; $k < count($kriteria); $k++) {
                                                                    $id = $kriteria[$j]['idkriteria'] . "-" . $kriteria[$k]['idkriteria']; ?>
                                                                    <tr>
                                                                        <td>
                                                                            <label for="<?= $id ?>"><?= $kriteria[$j]['namakriteria'] ?></label>
                                                                        </td>
                                                                        <td width="70%" colspan="17">
                                                                            <input class="range" id="<?= $id ?>" name="<?= $id ?>" type="range" min="-8" max="8" value="<?= json_decode($jenis['ahpsetting'], true)[$id] ?>" step="1" style="width: 100%;" />
                                                                        </td>
                                                                        <td>
                                                                            <label for="<?= $id ?>"><?= $kriteria[$k]['namakriteria'] ?></label>
                                                                        </td>
                                                                    </tr>
                                                            <?php }
                                                            } ?>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <?php
                                                foreach ($kriteria as $krit) { ?>

                                                    <div class="form-group">
                                                        <label>Skala Alternatif <?= $krit['namakriteria'] ?></label>
                                                    </div>

                                                    <table border="1" cellspacing="0" class="table">
                                                        <thead>
                                                            <tr>
                                                                <td>Alternatif 1</td>
                                                                <td>9</td>
                                                                <td>8</td>
                                                                <td>7</td>
                                                                <td>6</td>
                                                                <td>5</td>
                                                                <td>4</td>
                                                                <td>3</td>
                                                                <td>2</td>
                                                                <td>1</td>
                                                                <td>2</td>
                                                                <td>3</td>
                                                                <td>4</td>
                                                                <td>5</td>
                                                                <td>6</td>
                                                                <td>7</td>
                                                                <td>8</td>
                                                                <td>9</td>
                                                                <td>Alternatif 2</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            for ($j = 0; $j < count($alternatif); $j++) {
                                                                for ($k = $j + 1; $k < count($alternatif); $k++) {
                                                                    $id = $krit['idkriteria'] . "-" . $alternatif[$j]['idalternatif'] . "-" . $alternatif[$k]['idalternatif']; ?>
                                                                    <tr>
                                                                        <td>
                                                                            <label for="<?= $id ?>"><?= $alternatif[$j]['namaalternatif'] ?></label>
                                                                        </td>
                                                                        <td width="70%" colspan="17">
                                                                            <input class="range" id="<?= $id ?>" name="<?= $id ?>" type="range" min="-8" max="8" value="<?= json_decode($jenis['ahpsetting'], true)[$id] ?>" step="1" style="width: 100%;" />
                                                                        </td>
                                                                        <td>
                                                                            <label for="<?= $id ?>"><?= $alternatif[$k]['namaalternatif'] ?></label>
                                                                        </td>
                                                                    </tr>
                                                            <?php }
                                                            } ?>

                                                        </tbody>
                                                    </table>

                                                <?php } ?>

                                            </div>
                                            <div class="modal-footer">
                                                <a href="jenis.php" class="btn btn-default">Kembali</a>
                                                <input name="editjenis" type="submit" class="btn btn-primary" value="Edit">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } elseif (@$_GET['p'] == 'delete') {
                mysqli_query($conn, "DELETE FROM jenis WHERE idjenis='" . $_GET['id'] . "' ");
                echo '<script>window.location="jenis.php"</script>';
            } else { ?>
                <div class="main-content-inner">

                    <div class="row mt-5 mb-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <h2>Daftar Jenis</h2>
                                        <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Jenis</button>
                                    </div>
                                    <div class="data-tables datatable-dark">
                                        <table id="dataTable3" class="display" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Jenis</th>
                                                    <th>Kriteria</th>
                                                    <th>Alternatif</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $brgs = mysqli_query($conn, "SELECT * FROM jenis ORDER BY idjenis ASC");

                                                $no = 1;
                                                while ($p = mysqli_fetch_array($brgs)) {
                                                    $kriteria = [];
                                                    $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
                                                    while ($row = mysqli_fetch_array($sql_kriteria)) {
                                                        if (in_array($row['idkriteria'], json_decode($p['ahpparam'])->kriteria)) {
                                                            $kriteria[] = $row['namakriteria'];
                                                        }
                                                    }

                                                    $alternatif = [];
                                                    $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
                                                    while ($row = mysqli_fetch_array($sql_alternatif)) {
                                                        if (in_array($row['idalternatif'], json_decode($p['ahpparam'])->alternatif)) {
                                                            $alternatif[] = $row['namaalternatif'];
                                                        }
                                                    }
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $p['namajenis'] ?></td>
                                                        <td><?= implode(",", $kriteria) ?></td>
                                                        <td><?= implode(",", $alternatif) ?></td>
                                                        <td>
                                                            <a href="jenis.php?p=edit&id=<?= $p['idjenis'] ?>" class="btn btn-success">Edit</a>
                                                            <button onclick="confirm('Apakah Anda Yakin Ingin Mendelete Daftar Jenis <?= $p['namajenis'] ?>') == true ? window.location='jenis.php?p=delete&id=<?= $p['idjenis'] ?>' : false" class="btn btn-danger">Hapus</button>
                                                        </td>
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
            <?php
            } ?>

        </div>
    </div>

    <footer>
        <div class="footer-area">
            <p>By Alex's Dev</p>
        </div>
    </footer>

    </div>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jenis</h4>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Jenis</label>
                            <input name="namajenis" type="text" class="form-control" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Kriteria</label>
                            <select multiple name="idkriteria[]" class="form-control">
                                <?php
                                $det = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY namakriteria ASC") or die(mysqli_error($conn)());
                                while ($d = mysqli_fetch_array($det)) { ?>
                                    <option value="<?= $d['idkriteria'] ?>"><?= $d['namakriteria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alternatif</label>
                            <select multiple name="idalternatif[]" class="form-control">
                                <?php
                                $det = mysqli_query($conn, "SELECT * FROM alternatif ORDER BY namaalternatif ASC") or die(mysqli_error($conn)());
                                while ($d = mysqli_fetch_array($det)) { ?>
                                    <option value="<?= $d['idalternatif'] ?>"><?= $d['namaalternatif'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <input name="addjenis" type="submit" class="btn btn-primary" value="Tambah">
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


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

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