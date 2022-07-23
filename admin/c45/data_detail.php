<script>
    // alert('Data Berhasil Diproses')
</script>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>DETAIL PROSES</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php

        $id = $_GET['id'];
        $data = $koneksi->query("SELECT * FROM tb_data WHERE id_data = $id ")->fetch_assoc();

        $stkbanyak = $koneksi->query("SELECT COUNT(*) AS stkbanyak FROM tb_data WHERE x1 >= 35 ")->fetch_assoc();
        $stkbanyaklaris = $koneksi->query("SELECT COUNT(*) AS stkbanyaklaris FROM tb_data WHERE x1 >= 35 AND keputusan = 'Laris' ")->fetch_assoc();
        $stkbanyakkurang = $koneksi->query("SELECT COUNT(*) AS stkbanyakkurang FROM tb_data WHERE x1 >= 35 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

        $stksedikit = $koneksi->query("SELECT COUNT(*) AS stksedikit FROM tb_data WHERE x1 < 35 ")->fetch_assoc();
        $stksedikitlaris = $koneksi->query("SELECT COUNT(*) AS stksedikitlaris FROM tb_data WHERE keputusan = 'Laris' AND x1 < 35 ")->fetch_assoc();
        $stksedikitkurang = $koneksi->query("SELECT COUNT(*) AS stksedikitkurang FROM tb_data WHERE keputusan = 'Kurang Laris' AND x1 < 35 ")->fetch_assoc();

        // terjual
        $tjnaik = $koneksi->query("SELECT COUNT(*) AS tjnaik FROM tb_data WHERE x2 >= 30 ")->fetch_assoc();
        $tjnaiklaris = $koneksi->query("SELECT COUNT(*) AS tjnaiklaris FROM tb_data WHERE keputusan = 'Laris' AND x2 >= 30")->fetch_assoc();
        $tjnaikkurang = $koneksi->query("SELECT COUNT(*) AS tjnaikkurang FROM tb_data WHERE  keputusan = 'Kurang Laris' AND x2 >= 30")->fetch_assoc();

        $tjturun = $koneksi->query("SELECT COUNT(*) AS tjturun FROM tb_data WHERE x2 < 30 ")->fetch_assoc();
        $tjturunlaris = $koneksi->query("SELECT COUNT(*) AS tjturunlaris FROM tb_data WHERE x2 < 30 AND keputusan = 'Laris' ")->fetch_assoc();
        $tjturunkurang = $koneksi->query("SELECT COUNT(*) AS tjturunkurang FROM tb_data WHERE x2 < 30 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

        //harga
        $hrgmahal = $koneksi->query("SELECT COUNT(*) AS hrgmahal FROM tb_data WHERE x3 >= 20000 ")->fetch_assoc();
        $hrgmahallaris = $koneksi->query("SELECT COUNT(*) AS hrgmahallaris FROM tb_data WHERE x3 >= 20000 AND keputusan = 'Laris' ")->fetch_assoc();
        $hrgmahalkurang = $koneksi->query("SELECT COUNT(*) AS hrgmahalkurang FROM tb_data WHERE x3 >= 20000 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

        $hrgmurah = $koneksi->query("SELECT COUNT(*) AS hrgmurah FROM tb_data WHERE x3 < 20000 ")->fetch_assoc();
        $hrgmurahlaris = $koneksi->query("SELECT COUNT(*) AS hrgmurahlaris FROM tb_data WHERE x3 < 20000 AND keputusan = 'Laris' ")->fetch_assoc();
        $hrgmurahkurang = $koneksi->query("SELECT COUNT(*) AS hrgmurahkurang FROM tb_data WHERE x3 < 20000 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

        //ukuran
        $ukuranbesar = $koneksi->query("SELECT COUNT(*) AS ukuranbesar FROM tb_data WHERE x4 = 'besar' ")->fetch_assoc();
        $ukuranbesarllaris = $koneksi->query("SELECT COUNT(*) AS ukuranbesarllaris FROM tb_data WHERE x4 = 'besar' AND keputusan = 'Laris' ")->fetch_assoc();
        $ukuranbesarlkurang = $koneksi->query("SELECT COUNT(*) AS ukuranbesarlkurang FROM tb_data WHERE x4 = 'besar' AND keputusan = 'Kurang Laris' ")->fetch_assoc();

        $ukurankecil = $koneksi->query("SELECT COUNT(*) AS ukurankecil FROM tb_data WHERE x4 = 'kecil' ")->fetch_assoc();
        $ukurankecillaris = $koneksi->query("SELECT COUNT(*) AS ukurankecillaris FROM tb_data WHERE x4 = 'kecil' AND keputusan = 'Laris' ")->fetch_assoc();
        $ukurankecilkurang = $koneksi->query("SELECT COUNT(*) AS ukurankecilkurang FROM tb_data WHERE x4 = 'kecil' AND keputusan = 'Kurang Laris' ")->fetch_assoc();
        ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="text-right">
                        <h2>
                            <small>
                                <a href="?page=c45/data_output" class="btn btn-danger">Kembali</a>
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
                                                <th>Nama Barang</th>
                                                <th>Stok Barang</th>
                                                <th>Jumlah Terjual</th>
                                                <th>Harga Barang</th>
                                                <th>Ukuran Barang</th>
                                                <th>Keputusan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $data['nama_barang'] ?></td>
                                                <td><?php echo $data['x1'] ?></td>
                                                <td><?php echo $data['x2'] ?></td>
                                                <td><?php echo number_format($data['x3']) ?></td>
                                                <td><?php echo $data['x4'] ?></td>

                                                <?php
                                                if ($data['keputusan'] == 'Laris') {
                                                ?>
                                                    <td class="text-white bg-success"><?php echo $data['keputusan'] ?></td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td class="text-white bg-danger"><?php echo $data['keputusan'] ?></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered">

                                        <tr class="bg-dark text-white text-center">
                                            <th colspan="5">RULE</th>
                                            <th>KEPUTUSAN</th>
                                        </tr>

                                        <tr>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Jumlah Terjual (Naik = <?= $tjnaik['tjnaik'] ?>, Turun = <?= $tjturun['tjturun'] ?>) </td>
                                            <td colspan="4"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-center">Naik (<?= $tjnaik['tjnaik'] ?>) </td>
                                            <td>Laris = <?= $tjnaiklaris['tjnaiklaris'] ?> </td>
                                            <td>Kurang Laris = <?= $tjnaikkurang['tjnaikkurang'] ?> </td>
                                            <td></td>
                                            <td class="bg-success font-weight-bold text-center">Laris</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-center">Turun (<?= $tjturun['tjturun'] ?>) </td>
                                            <td>Laris = <?= $tjturunlaris['tjturunlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $tjturunkurang['tjturunkurang'] ?> </td>
                                            <td></td>
                                            <td class="bg-info font-weight-bold text-center">?</td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Stok Barang(Sedikit = <?= $stksedikit['stksedikit'] ?>, Banyak = <?= $stkbanyak['stkbanyak'] ?>) </td>
                                            <td colspan="3"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold text-center">Sedikit (<?= $stksedikit['stksedikit'] ?>) </td>
                                            <td>Laris = <?= $stksedikitlaris['stksedikitlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $stksedikitkurang['stksedikitkurang'] ?> </td>
                                            <td class="bg-warning font-weight-bold text-center">Kurang Laris</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold text-center">Banyak (<?= $stkbanyak['stkbanyak'] ?>) </td>
                                            <td>Laris = <?= $stkbanyaklaris['stkbanyaklaris'] ?> </td>
                                            <td>Kurang Laris = <?= $stkbanyakkurang['stkbanyakkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Harga (Mahal = <?= $hrgmahal['hrgmahal'] ?>, Murah = <?= $hrgmurah['hrgmurah'] ?>) </td>
                                            <td colspan="2"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">Mahal (<?= $hrgmahal['hrgmahal'] ?>) </td>
                                            <td>Laris = <?= $hrgmahallaris['hrgmahallaris'] ?> </td>
                                            <td>Kurang Laris = <?= $hrgmahalkurang['hrgmahalkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">Murah (<?= $hrgmurah['hrgmurah'] ?>) </td>
                                            <td>Laris = <?= $hrgmurahlaris['hrgmurahlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $hrgmurahkurang['hrgmurahkurang'] ?> </td>
                                            <td class="bg-success font-weight-bold text-center">Laris</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Ukuran (besar = <?= $ukuranbesar['ukuranbesar'] ?>, kecil = <?= $ukurankecil['ukurankecil'] ?>) </td>
                                            <td colspan="2"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">besar (<?= $ukuranbesar['ukuranbesar'] ?>) </td>
                                            <td>Laris = <?= $ukuranbesarllaris['ukuranbesarllaris'] ?> </td>
                                            <td>Kurang Laris = <?= $ukuranbesarlkurang['ukuranbesarlkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">kecil (<?= $ukurankecil['ukurankecil'] ?>) </td>
                                            <td>Laris = <?= $ukurankecillaris['ukurankecillaris'] ?> </td>
                                            <td>Kurang Laris = <?= $ukurankecilkurang['ukurankecilkurang'] ?> </td>
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