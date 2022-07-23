<?php
session_start();
include 'dbconnect.php';

if (!isset($_SESSION['log'])) {
	header('location:login.php');
} else {
};

$uid = $_SESSION['id'];
$caricart = mysqli_query($conn, "SELECT * FROM cart WHERE userid='$uid' and status='Cart'");
$fetc = mysqli_fetch_array($caricart);
$orderidd = @$fetc['orderid'];
$itungtrans = mysqli_query($conn, "select count(orderid) as jumlahtrans from cart WHERE userid='$uid' and status!='Cart'");
$itungtrans2 = mysqli_fetch_assoc($itungtrans);
$itungtrans3 = $itungtrans2['jumlahtrans'];

if (isset($_POST["update"])) {
	$kode = $_POST['idproduknya'];
	$jumlah = $_POST['jumlah'];
	$q1 = mysqli_query($conn, "UPDATE detailorder set qty='$jumlah' WHERE idproduk='$kode' and orderid='$orderidd'");
	if ($q1) {
		echo "Berhasil Update Cart
		<meta http-equiv='refresh' content='1; url= cart.php'/>";
	} else {
		echo "Gagal update cart
		<meta http-equiv='refresh' content='1; url= cart.php'/>";
	}
} else if (isset($_POST["hapus"])) {
	$kode = $_POST['idproduknya'];
	$q2 = mysqli_query($conn, "delete from detailorder WHERE idproduk='$kode' and orderid='$orderidd'");
	if ($q2) {
		echo "Berhasil Hapus";
	} else {
		echo "Gagal Hapus";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Sinardunia - Daftar Belanja</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Sinardunia, Alex's Dev" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/font-awesome.css" rel="stylesheet">


	<script src="js/jquery-1.11.1.min.js"></script>

	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>

</head>

<body>

	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, BELANJA SEKARANG!</p>
			</div>
			<div class="agile-login">
				<ul>
					<?php
					if (!isset($_SESSION['log'])) {
						echo '
					<li><a href="registered.php"> Daftar</a></li>
					<li><a href="login.php">Masuk</a></li>
					';
					} else {

						if ($_SESSION['role'] == 'Member') {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="logout.php">Keluar?</a></li>
					';
						} else {
							echo '
					<li style="color:white">Halo, ' . $_SESSION["name"] . '
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="logout.php">Keluar?</a></li>
					';
						};
					}
					?>

				</ul>
			</div>
			<div class="product_list_header">
				<a href="cart.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami : (+62) 896 3773 9631</li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Sinardunia</a></h1>
			</div>
			<div class="w3l_search">
				<form action="search.php" method="post">
					<input type="search" name="Search" placeholder="Cari produk...">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>


	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">

				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Beranda</a></li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Produk<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<h6>Kategori</h6>
											<?php
											$kat = mysqli_query($conn, "SELECT * FROM jenis ORDER BY namajenis ASC");
											while ($p = mysqli_fetch_array($kat)) { ?>
												<li><a href="jenis.php?id=<?= $p['idjenis'] ?>"><?= $p['namajenis'] ?></a></li>
											<?php } ?>
										</ul>
									</div>

								</div>
							</ul>
						</li>
						<li><a href="cart.php">Keranjang Saya</a></li>
						<li><a href="daftarorder.php">Daftar Order</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>



	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Beranda</a></li>
				<li class="active">Checkout</li>
			</ol>
		</div>
	</div>


	<div class="checkout">
		<div class="container">
			<h2>Kamu memiliki <span><?= $itungtrans3 ?> transaksi</span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>
							<th>Kode Order</th>
							<th>Tanggal Order</th>
							<th>Total</th>
							<th>Status</th>
						</tr>
					</thead>

					<?php

					$brg = mysqli_query($conn, "SELECT DISTINCT(idcart), c.orderid, tglorder, status from cart c, detailorder d WHERE c.userid='$uid' and d.orderid=c.orderid and status!='Cart' ORDER BY tglorder DESC");
					$no = 1;
					while ($b = mysqli_fetch_array($brg)) {

					?>
						<tr class="rem1">
							<form method="post">
								<td class="invert"><?= $no++ ?></td>
								<td class="invert"><a href="order.php?id=<?= $b['orderid'] ?>"><?= $b['orderid'] ?></a></td>

								<td class="invert"><?= $b['tglorder'] ?></td>
								<td class="invert">

									Rp<?php $ongkir = 10000;
										$ordid = $b['orderid'];
										$result1 = mysqli_query($conn, "SELECT SUM(qty*hargaafter)+$ongkir AS count FROM detailorder d, produk p WHERE d.orderid='$ordid' and p.idproduk=d.idproduk ORDER BY d.idproduk ASC");
										$cekrow = mysqli_num_rows($result1);
										$row1 = mysqli_fetch_assoc($result1);
										$count = $row1['count'];
										if ($cekrow > 0) {
											echo number_format($count);
										} else {
											echo 'No data';
										} ?>

								</td>

								<td class="invert">
									<div class="rem">
										<?php
										if ($b['status'] == 'Diproses') {
											echo 'Pesanan Diproses (Pembayaran Diterima)';
										} else if ($b['status'] == 'Dikirim') {
											echo 'Pesanan Dikirim';
										} else if ($b['status'] == 'Selesai') {
											echo 'Pesanan Selesai';
										} else if ($b['status'] == 'Dibatalkan') {
											echo 'Pesanan Dibatalkan';
										} else if ($b['status'] == 'Pengiriman') {
											echo 'Pesanan dikirim';
										} else if ($b['status'] == 'Payment') {
											echo '<a href="konfirmasi.php?id=' . $b['orderid'] . '" class="form-control btn-primary">Konfirmasi Pembayaran</a>';
										} else {
											echo 'Pesanan Menunggu Konfirmasi';
										}

										?>
							</form>
			</div>
			<script>
				$(document).ready(function(c) {
					$('.close1').on('click', function(c) {
						$('.rem1').fadeOut('slow', function(c) {
							$('.rem1').remove();
						});
					});
				});
			</script>
			</td>
			</tr>
		<?php
					}
		?>


		<script>
			$('.value-plus').on('click', function() {
				var divUpd = $(this).parent().find('.value'),
					newVal = parseInt(divUpd.text(), 10) + 1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function() {
				var divUpd = $(this).parent().find('.value'),
					newVal = parseInt(divUpd.text(), 10) - 1;
				if (newVal >= 1) divUpd.text(newVal);
			});
		</script>

		</table>
		</div>
	</div>
	</div>


	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-4 w3_footer_grid">
					<h3>Hubungi Kami</h3>

					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Jl. Jala Utama 4 Blok G No. 1</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:assandro843@gmail.com">assandro843@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(+62) 896 3773 9631</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Tentang Kami</h3>
					<ul class="info">
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">About Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">How To</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html">FAQ</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="footer-copy">

			<div class="container">
				<p>© 2022 Alex's Dev. All rights reserved</p>
			</div>
		</div>

	</div>
	<div class="footer-botm">
		<div class="container">
			<div class="w3layouts-foot">
				<ul>
					<li><a href="#" class="w3_agile_instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="payment-w3ls">
				<img src="images/card.png" alt=" " class="img-responsive">
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>


	<script src="js/bootstrap.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear'
			};


			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>



	<script src="js/skdslider.min.js"></script>
	<link href="css/skdslider.css" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#demo1').skdslider({
				'delay': 5000,
				'animationSpeed': 2000,
				'showNextPrev': true,
				'showPlayButton': true,
				'autoSlide': true,
				'animationType': 'fading'
			});

			jQuery('#responsive').change(function() {
				$('#responsive_wrapper').width(jQuery(this).val());
			});

		});
	</script>

</body>

</html>