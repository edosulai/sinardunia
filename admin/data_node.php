<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>PROSES PERHITUNGAN NODE</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php

        $alldata = mysqli_query($conn, "SELECT * FROM produk")->fetch_assoc();

        $total = mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk ")->fetch_assoc();
        $laris = mysqli_query($conn, "SELECT COUNT(*) AS laris FROM produk WHERE keputusan = 'Laris' ")->fetch_assoc();
        $kuranglaris = mysqli_query($conn, "SELECT COUNT(*) AS kuranglaris FROM produk WHERE keputusan = 'Kurang Laris' ")->fetch_assoc();

        ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="text-right">
                        <h2>
                            <small>
                                <a href="?page=c45/data_output" class="btn btn-danger">Kembali</a>
                                <a href="?page=c45/data_tree" class="btn btn-success">Pohon Keputusan</a>
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

                                    <!-- node 1 -->
                                    <table class="table table-bordered" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Node</th>
                                                <th></th>
                                                <th></th>
                                                <th>Jumlah Kasus (S)</th>
                                                <th>Kurang Laris (S1)</th>
                                                <th>Laris (S2)</th>
                                                <th>Entropy</th>
                                                <th>Gain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1</td>
                                                <td>Total</td>
                                                <td></td>
                                                <td>15</td>
                                                <td>5</td>
                                                <td>6</td>
                                                <td class="bg-warning font-weight-bold"> 1,5655 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td>Stok Barang</td>
                                                <td></td>
                                                <td></td>                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-success font-weight-bold"> 1,1329 </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Sedikit</td>
                                                <td>8</td>
                                                <td>2</td>
                                                <td>6</td>
                                                <td> 0,8112 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Tetap</td>
                                                <td>3</td>
                                                <td>3</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Banyak</td>
                                                <td>4</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td>Jumlah Terjual</td>
                                                <td></td>
                                                <td></td>                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-success font-weight-bold"> 1,1983 </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Naik</td>
                                                <td>6</td>
                                                <td>0</td>
                                                <td>6</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Tetap</td>
                                                <td>3</td>
                                                <td>3</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Turun</td>
                                                <td>6</td>
                                                <td>2</td>
                                                <td>0</td>
                                                <td>0,9182</td>
                                                <td></td>

                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td>Harga</td>
                                                <td></td>
                                                <td></td>                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-success font-weight-bold"> 0,2799 </td>

                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Murah</td>
                                                <td>6</td>
                                                <td>2</td>
                                                <td>4</td>
                                                <td> 0,9182 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Mahal</td>
                                                <td>9</td>
                                                <td>3</td>
                                                <td>2</td>
                                                <td> 1,5304 </td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" style="width: 100%">
                                        <!-- entropy -->
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total)</td>
                                            <td> (-(4/15) * log_2(4/15)) + (-(5/15) * log_2(5/15)) (-(6/15) * log_2(6/15)) </td>
                                            <td class="text-center font-weight-bold"> 1,5655 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Stok Barang - Sedikit)</td>
                                            <td> (-(6/8) * log_2(6/8)) + (-(2/8) * log_2(2/8)) (-(0/8) * log_2(0/8)) </td>
                                            <td class="text-center font-weight-bold"> 0,8112 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Stok Barang - Tetap)</td>
                                            <td> (-(0/3) * log_2(0/3)) + (-(3/3) * log_2(2/3)) (-(0/3) * log_2(0/3)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Stok Barang - Banyak)</td>
                                            <td> (-(4/4) * log_2(4/4)) + (-(0/4) * log_4(0/4)) (-(0/4) * log_2(0/4)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>

                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Harga - Murah)</td>
                                            <td> (-(0/6) * log_2(0/6)) + (-(2/6) * log_2(2/6)) (-(4/6) * log_2(4/6)) </td>
                                            <td class="text-center font-weight-bold"> 0,9182 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Harga - Mahal)</td>
                                            <td> (-(4/9) * log_2(4/9)) + (-(3/9) * log_2(3/9)) (-(2/7) * log_2(2/9)) </td>
                                            <td class="text-center font-weight-bold"> 1,5304 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Jumlah Terjual - Naik)</td>
                                            <td> (-(6/6) * log_2(6/6)) + (-(0/6) * log_2(0/6)) (-(0/6) * log_2(0/6)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Jumlah Terjual - Tetap)</td>
                                            <td> (-(0/3) * log_2(0/3)) + (-(3/3) * log_2(2/3)) (-(0/3) * log_2(0/3)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total - Jumlah Terjual - Turun)</td>
                                            <td> (-(4/6) * log_2(4/6)) + (-(2/6) * log_4(2/6)) (-(0/6) * log_2(0/6)) </td>
                                            <td class="text-center font-weight-bold"> 0,9182 </td>
                                        </tr>

                                        <!-- gain -->
                                        <tr>
                                            <td class="font-weight-bold">Gain (Total - Stok Barang)</td>
                                            <td> 1,56559 - (8/15 * 0,8112) + (3/15 * 0) + (4/15 * 0) </td>
                                            <td class="text-center font-weight-bold"> 1,1329 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Gain (Total - Jumlah Terjual)</td>
                                            <td> 1,56559 - (6/15 * 0) + (3/15 * 0) + (6/15 * 0,9182) </td>
                                            <td class="text-center font-weight-bold"> 1,1983 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Gain (Total - Harga)</td>
                                            <td> 1,56559 - (6/15 * 0,9182) + (9/15 * 1,5304) </td>
                                            <td class="text-center font-weight-bold"> 0,2799 </td>
                                        </tr>

                                    </table>
                                    <!-- /node 1 -->

                                    <!-- node 1.1 -->
                                    <table class="table table-bordered mt-4" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Node</th>
                                                <th></th>
                                                <th></th>
                                                <th>Jumlah Kasus (S)</th>
                                                <th>Kurang Laris (S1)</th>
                                                <th>Laris (S2)</th>
                                                <th>Entropy</th>
                                                <th>Gain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>1.1</td>
                                                <td>Jumlah Terjual (Turun)</td>
                                                <td></td>
                                                <td>6</td>
                                                <td>2</td>
                                                <td>0</td>
                                                <td class="bg-warning font-weight-bold"> 0,9182 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td>Stok Barang</td>
                                                <td></td>
                                                <td></td>                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-success font-weight-bold"> 0,9182 </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Sedikit</td>
                                                <td>2</td>
                                                <td>2</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Tetap</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Banyak</td>
                                                <td>4</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td>Harga</td>
                                                <td></td>
                                                <td></td>                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="bg-success font-weight-bold"> 0,9182 </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Murah</td>
                                                <td>8</td>
                                                <td>2</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-center">
                                                <td></td>
                                                <td></td>
                                                <td>Mahal</td>
                                                <td>4</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td> 0,0000 </td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" style="width: 100%">
                                        <!-- entropy -->
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Total)</td>
                                            <td> (-(4/6) * log_2(4/6)) + (-(2/6) * log_2(2/6)) (-(0/0) * log_2(6/6)) </td>
                                            <td class="text-center font-weight-bold"> 0,9182 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Jumlah Terjual - Turun - Stok Barang - Sedikit)</td>
                                            <td> (-(2/2) * log_2(2/2)) + (-(2/2) * log_2(2/2)) (-(0/2) * log_2(0/2)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Jumlah Terjual - Turun - Stok Barang - Tetap)</td>
                                            <td> (-(0/0) * log_2(0/0)) + (-(0/0) * log_2(2/0)) (-(0/0) * log_2(0/0)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Jumlah Terjual - Turun - Stok Barang - Banyak)</td>
                                            <td> (-(4/4) * log_2(4/4)) + (-(0/4) * log_4(0/4)) (-(0/4) * log_2(0/4)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>

                                        <tr>
                                            <td class="font-weight-bold">Entropy (Jumlah Terjual - Turun - Harga - Murah)</td>
                                            <td> (-(0/2) * log_2(0/2)) + (-(2/2) * log_2(2/2)) (-(0/2) * log_2(0/2)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Entropy (Jumlah Terjual - Turun - Harga - Mahal)</td>
                                            <td> (-(0/4) * log_2(0/4)) + (-(4/4) * log_2(4/4)) (-(0/4) * log_2(0/4)) </td>
                                            <td class="text-center font-weight-bold"> 0,0000 </td>
                                        </tr>

                                        <!-- gain -->
                                        <tr>
                                            <td class="font-weight-bold">Gain (Total - Stok Barang)</td>
                                            <td> 0,9182 - (2/6 * 0,8112) + (0/6 * 0) + (4/6 * 0) </td>
                                            <td class="text-center font-weight-bold"> 0,9182 </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Gain (Total - Harga)</td>
                                            <td> 0,9182 - (2/6 * 0) + (4/6 * 0) </td>
                                            <td class="text-center font-weight-bold"> 0,9182 </td>
                                        </tr>
                                    </table>
                                    <!-- /node 1.1 -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>