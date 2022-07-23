<?php
session_start();
include '../dbconnect.php'; 

if (isset($_POST['tambah'])) {
    echo '<pre>';
    var_dump(json_encode($_POST));
    echo '</pre>';
    exit;
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

    <form method="post">
        <?php
            $kriteria = [];
            $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria");
            while ($row = mysqli_fetch_array($sql_kriteria)) $kriteria[] = $row;

            $alternatif = [];
            $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
            while ($row = mysqli_fetch_array($sql_alternatif)) $alternatif[] = $row; 
            ?>

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
                                        <input class="range" id="<?= $id ?>" name="<?= $id ?>" type="range" min="-8" max="8" value="0" step="1" style="width: 100%;" />
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
                                        <input class="range" id="<?= $id ?>" name="<?= $id ?>" type="range" min="-8" max="8" value="0" step="1" style="width: 100%;" />
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

        <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
    </form>

</body>

</html>