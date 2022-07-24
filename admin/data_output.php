<script>
    alert('Data Berhasil Diproses')
</script>

<div class="right_col" role="main">
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
                                <a href="?page=c45/data" class="btn btn-danger">Kembali</a>
                                <a href="?page=c45/data_tree" class="btn btn-success">Pohon Keputusan</a>
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
                                    <table id="" class="table table-bordered" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Nama Barang</th>
                                                <th>Stok Barang</th>
                                                <th>Jumlah Terjual</th>
                                                <th>Harga Barang</th>
                                                <th>Ukuran Barang</th>
                                                <th>Keputusan</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $alldata = mysqli_query($conn, "SELECT * FROM produk");
                                            $no = 1;
                                            while ($data = $alldata->fetch_assoc()) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['namaproduk'] ?></td>
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

                                                    <!-- <td>
                                            <a href="?page=c45/data_detail&id=<?php echo $data['idproduk'] ?>" class="btn btn-warning">Detail</a>
                                        </td> -->
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