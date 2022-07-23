<?php
//stok
$stkbanyak = $koneksi->query("SELECT COUNT(*) AS stkbanyak FROM tb_data WHERE x1 >= 35 ")->fetch_assoc();
$stkbanyaklaris = $koneksi->query("SELECT COUNT(*) AS stkbanyaklaris FROM tb_data WHERE x1 >= 35 AND keputusan = 'Laris' ")->fetch_assoc();
$stkbanyakkurang = $koneksi->query("SELECT COUNT(*) AS stkbanyakkurang FROM tb_data WHERE x1 >= 35 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

$stksedikit = $koneksi->query("SELECT COUNT(*) AS stksedikit FROM tb_data WHERE x1 < 35 ")->fetch_assoc();
$stksedikitlaris = $koneksi->query("SELECT COUNT(*) AS stksedikitlaris FROM tb_data WHERE keputusan = 'Laris' AND x1 < 35 ")->fetch_assoc();
$stksedikitkurang = $koneksi->query("SELECT COUNT(*) AS stksedikitkurang FROM tb_data WHERE keputusan = 'Kurang Laris' AND x1 < 35 ")->fetch_assoc();

// terjual
$tjbanyak = $koneksi->query("SELECT COUNT(*) AS tjbanyak FROM tb_data WHERE x2 >= 30 ")->fetch_assoc();
$tjbanyaklaris = $koneksi->query("SELECT COUNT(*) AS tjbanyaklaris FROM tb_data WHERE keputusan = 'Laris' AND x2 >= 30")->fetch_assoc();
$tjbanyakkurang = $koneksi->query("SELECT COUNT(*) AS tjbanyakkurang FROM tb_data WHERE  keputusan = 'Kurang Laris' AND x2 >= 30")->fetch_assoc();

$tjsedikit = $koneksi->query("SELECT COUNT(*) AS tjsedikit FROM tb_data WHERE x2 < 30 ")->fetch_assoc();
$tjsedikitlaris = $koneksi->query("SELECT COUNT(*) AS tjsedikitlaris FROM tb_data WHERE x2 < 30 AND keputusan = 'Laris' ")->fetch_assoc();
$tjsedikitkurang = $koneksi->query("SELECT COUNT(*) AS tjsedikitkurang FROM tb_data WHERE x2 < 30 AND keputusan = 'Kurang Laris' ")->fetch_assoc();

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


<div class="right_col" role="main">
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
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Jumlah Terjual (Banyak = <?= $tjbanyak['tjbanyak'] ?>, Sedikit = <?= $tjsedikit['tjsedikit'] ?>) </td>
                                            <td colspan="5"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-center">Banyak (<?= $tjbanyak['tjbanyak'] ?>) </td>
                                            <td>Laris = <?= $tjbanyaklaris['tjbanyaklaris'] ?> </td>
                                            <td>Kurang Laris = <?= $tjbanyakkurang['tjbanyakkurang'] ?> </td>
                                            <td class="bg-success font-weight-bold text-center">Laris</td>
                                            <td colspan="2"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-center">Sedikit (<?= $tjsedikit['tjsedikit'] ?>) </td>
                                            <td>Laris = <?= $tjsedikitlaris['tjsedikitlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $tjsedikitkurang['tjsedikitkurang'] ?> </td>
                                            <td class="bg-info font-weight-bold text-center">?</td>
                                            <td colspan="2"></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Stok Barang(Sedikit = <?= $stksedikit['stksedikit'] ?>, Banyak = <?= $stkbanyak['stkbanyak'] ?>) </td>
                                            <td colspan="4"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold text-center">Sedikit (<?= $stksedikit['stksedikit'] ?>) </td>
                                            <td>Laris = <?= $stksedikitlaris['stksedikitlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $stksedikitkurang['stksedikitkurang'] ?> </td>
                                            <td class="bg-warning font-weight-bold text-center">Kurang Laris</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="font-weight-bold text-center">Banyak (<?= $stkbanyak['stkbanyak'] ?>) </td>
                                            <td>Laris = <?= $stkbanyaklaris['stkbanyaklaris'] ?> </td>
                                            <td>Kurang Laris = <?= $stkbanyakkurang['stkbanyakkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Harga (Mahal = <?= $hrgmahal['hrgmahal'] ?>, Murah = <?= $hrgmurah['hrgmurah'] ?>) </td>
                                            <td colspan="3"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">Mahal (<?= $hrgmahal['hrgmahal'] ?>) </td>
                                            <td>Laris = <?= $hrgmahallaris['hrgmahallaris'] ?> </td>
                                            <td>Kurang Laris = <?= $hrgmahalkurang['hrgmahalkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                            <td></td>
                                        </tr>   
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="font-weight-bold text-center">Murah (<?= $hrgmurah['hrgmurah'] ?>) </td>
                                            <td>Laris = <?= $hrgmurahlaris['hrgmurahlaris'] ?> </td>
                                            <td>Kurang Laris = <?= $hrgmurahkurang['hrgmurahkurang'] ?> </td>
                                            <td class="bg-success font-weight-bold text-center">Laris</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="bg-primary font-weight-bold" style="width: 170px;">Ukuran (besar = <?= $ukuranbesar['ukuranbesar'] ?>, kecil = <?= $ukurankecil['ukurankecil'] ?>) </td>
                                            <td colspan="2"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="font-weight-bold text-center">besar (<?= $ukuranbesar['ukuranbesar'] ?>) </td>
                                            <td>Laris = <?= $ukuranbesarllaris['ukuranbesarllaris'] ?> </td>
                                            <td>Kurang Laris = <?= $ukuranbesarlkurang['ukuranbesarlkurang'] ?> </td>
                                            <td class="bg-danger font-weight-bold text-center">Kurang Laris</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
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