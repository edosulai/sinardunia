<?php
session_start();
include 'dbconnect.php';

$idk = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Sinardunia - Kategori</title>

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
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Beranda</a></li>
				<li class="active">Kategori</li>
			</ol>
		</div>
	</div>


	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						<?php
						$kat = mysqli_query($conn, "SELECT * FROM jenis ORDER BY namajenis ASC");
						while ($p = mysqli_fetch_array($kat)) { ?>
							<li><a href="jenis.php?id=<?= $p['idjenis'] ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?= $p['namajenis'] ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="agile_top_brands_grids">
					<?php
					$jenis = mysqli_query($conn, "SELECT * FROM jenis WHERE idjenis='$idk'") or die(mysqli_error($conn)());
					$jenis = mysqli_fetch_array($jenis);

					include 'algoritma.php';

					$ahp = new AHP();

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

					$ahp->setCriterias(array_map(function ($each) {
						return $each['namakriteria'];
					}, $kriteria), false);

					$ahp->setCandidates(array_map(function ($each) {
						return $each['idalternatif'];
					}, $alternatif));

					$ahp->setIr([
						0.00,
						0.00,
						0.58,
						0.90,
						1.12,
						1.24,
						1.32,
						1.41,
						1.45,
						1.49
					]);

					$kriteria_input = [];
					for ($j = 0; $j < count($kriteria); $j++) {
						for ($k = 0; $k < count($kriteria); $k++) {
							$id = $kriteria[$j]['idkriteria'] . "-" . $kriteria[$k]['idkriteria'];

							if ($j == $k) {
								$kriteria_input[$j][] = 1;
							} else if (isset(json_decode($jenis['ahpsetting'], true)[$id])) {
								$value_abs = abs((int) json_decode($jenis['ahpsetting'], true)[$id]) + 1;
								$kriteria_input[$j][] = json_decode($jenis['ahpsetting'], true)[$id] > 0 ? ($value_abs / 10) : $value_abs;
							} else {
								$kriteria_input[$j][] = null;
							}
						}
					}

					$ahp->setRelativeInterestMatrix($kriteria_input);

					$alternatif_input = [];
					foreach ($kriteria as $krit) {
						for ($j = 0; $j < count($alternatif); $j++) {
							for ($k = 0; $k < count($alternatif); $k++) {
								$id = $krit['idkriteria'] . "-" . $alternatif[$j]['idalternatif'] . "-" . $alternatif[$k]['idalternatif'];

								if ($j == $k) {
									$alternatif_input[$krit['namakriteria']][$j][] = 1;
								} else if (isset(json_decode($jenis['ahpsetting'], true)[$id])) {
									$value_abs = abs((int) json_decode($jenis['ahpsetting'], true)[$id]) + 1;
									$alternatif_input[$krit['namakriteria']][$j][] = json_decode($jenis['ahpsetting'], true)[$id] > 0 ? ($value_abs / 10) : $value_abs;
								} else {
									$alternatif_input[$krit['namakriteria']][$j][] = null;
								}
							}
						}
					}

					$ahp->setBatchCriteriaPairWise($alternatif_input);

					$ahp->finalize();

					$sorted = implode(",", array_map(function ($each) {
						return (int) $each['name'];
					}, $ahp->getRank()));

					$brgs = mysqli_query($conn, "SELECT * FROM produk WHERE idjenis='$idk' ORDER BY FIELD(idjenis, $sorted)");
					$x = mysqli_num_rows($brgs);
					if ($x > 0) {
						while ($p = mysqli_fetch_array($brgs)) { ?>

							<div class="col-md-4 top_brand_left">
								<div class="hover14 column rounded mb-1">
									<div class="agile_top_brand_left_grid rounded">
										<!-- <div class="agile_top_brand_left_grid_pos">
											<img src="images/offer.png" alt=" " class="img-responsive" />
										</div> -->
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="product.php?idproduk=<?= $p['idproduk'] ?>"><img src="<?= $p['gambar'] ?>" width="200px" height="200px"></a>
														<p><?= $p['namaproduk'] ?></p>
														<!-- <h4>Rp<?= number_format($p['hargaafter']) ?> <span>Rp<?= number_format($p['hargabefore']) ?></span></h4> -->
														<h4>Rp<?= number_format($p['hargaafter']) ?></h4>
													</div>
													<div class="snipcart-details top_brand_home_details">
														<fieldset>
															<a href="product.php?idproduk=<?= $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
														</fieldset>
													</div>
												</div>
											</figure>
										</div>
									</div>
								</div>
							</div>
					<?php
						}
					} else {
						echo "Data tidak ditemukan";
					}
					?>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
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