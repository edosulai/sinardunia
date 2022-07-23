<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>TAMBAH DATA</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Barang
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="nama_barang" required="required" class="form-control">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Stok Barang</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="x1" required="required" class="form-control">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jumlah Terjual</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="x2" required="required" class="form-control">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Harga Barang</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" name="x3" required="required" class="form-control">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ukuran Barang</label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select name="x4" id="" required="required" class="form-control">
                                                    <option value="besar" >besar</option>
                                                    <option value="kecil" >kecil</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="?page=c45/data" class="btn btn-danger">Kembali</a>
                                            <input type="submit" class="btn btn-success" name="simpan" value="Simpan Data">
                                        </div>

                                    </form>

                                    <?php
                                    if (isset($_POST['simpan'])) {

                                        $nama_barang      = $_POST['nama_barang'];
                                        $x1               = $_POST['x1'];
                                        $x2               = $_POST['x2'];
                                        $x3               = $_POST['x3'];
                                        $x4               = $_POST['x4'];

                                        // stok
                                        if ($x1 >= 35) {
                                            $stok = "banyak";
                                        } else {
                                            $stok = "sedikit";
                                        }

                                        // jumlah terjual
                                        if ($x2 >= 30) {
                                            $terjual = "banyak";
                                        } else {
                                            $terjual = "sedikit";
                                        }

                                        // harga
                                        if ($x3 >= 20000) {
                                            $harga = "mahal";
                                        } else {
                                            $harga = "murah";
                                        }

                                        // keputusan
                                        if ($terjual == "banyak" && $stok == "banyak" && $harga == "mahal" && $x4 == "besar") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "mahal" && $x4 == "kecil") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "murah" && $x4 == "besar") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "banyak" && $harga == "murah" && $x4 == "kecil") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "mahal" && $x4 == "besar") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "mahal" && $x4 == "kecil") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "murah" && $x4 == "besar") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "banyak" && $stok == "sedikit" && $harga == "murah" && $x4 == "kecil") {
                                            $keputusan = "Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "mahal" && $x4 == "besar") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "mahal" && $x4 == "kecil") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "murah" && $x4 == "besar") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "banyak" && $harga == "murah" && $x4 == "kecil") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "mahal" && $x4 == "besar") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "mahal" && $x4 == "kecil") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "murah" && $x4 == "besar") {
                                            $keputusan = "Kurang Laris";
                                        } elseif ($terjual == "sedikit" && $stok == "sedikit" && $harga == "murah" && $x4 == "kecil") {
                                            $keputusan = "Kurang Laris";
                                        } else {
                                            $keputusan = "There's something wrong with the rule";
                                        }

                                        $save = $koneksi->query("INSERT INTO tb_data (nama_barang, x1, x2, x3, x4, keputusan) VALUES ('$nama_barang', '$x1', '$x2', '$x3', $x4, '$keputusan' ) ");

                                        if ($save == TRUE) {
                                            echo "<script>
                                                alert('Data Tersimpan')
                                                window.location = '?page=c45/data'
                                            </script>";
                                        } else {
                                            echo "<script>
                                                alert('Data Gagal Tersimpan')
                                                window.location =  '?page=c45/data'
                                            </script>";
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>