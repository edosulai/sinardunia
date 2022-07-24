<?php
session_start();

include 'dbconnect.php';

$token  = $_GET['token'];

$q1   = mysqli_query($conn, "SELECT * FROM login WHERE password='" . base64_decode($token) . "'");
$n1   = mysqli_num_rows($q1);

if ($n1 < 1) {
  echo '<script>alert("Link tidak valid. Token tidak tersedia.");window.location="login.php"</script>';
} else {

  if (isset($_POST['reset'])) {
    $password   = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if ($password == '' or $konfirmasi_password == '') {
      echo '<script>alert("Silakan masukkan password serta konfirmasi password")';
    } elseif ($konfirmasi_password != $password) {
      echo '<script>alert("Konfirmasi password tidak sesuai dengan password")';
    } else {
      $pass = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($conn, "UPDATE login SET password='" . $pass . "' WHERE password = '" . base64_decode($token) . "'");
      echo '<script>alert("Password berhasil diganti");window.location="login.php"</script>';
    }
  }

?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Sinardunia - Masuk</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Sinardunia, Adam's Dev" />
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
          <p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, <a href="products.php">BELANJA SEKARANG!</a></p>
        </div>
        <div class="agile-login">
          <ul>
            <li><a href="registered.php"> Daftar</a></li>
            <li><a href="login.php">Masuk</a></li>
          </ul>
        </div>
        <div class="product_list_header">
          <form action="#" method="post" class="last">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="display" value="1">
            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
          </form>
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
          <form action="#" method="post">
            <input type="search" name="Search" placeholder="Cari produk..." required="">
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
                        $kat = mysqli_query($conn, "SELECT * FROM kategori ORDER BY namakategori ASC");
                        while ($p = mysqli_fetch_array($kat)) { ?>
                          <li><a href="kategori.php?id=<?= $p['idkategori'] ?>"><?= $p['namakategori'] ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>

                  </div>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>



    <div class="breadcrumbs">
      <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
          <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Beranda</a></li>
          <li class="active">Halaman Login</li>
        </ol>
      </div>
    </div>


    <div class="login">
      <div class="container">
        <h2>Ganti Password</h2>

        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
          <form method="post">
            <input type="password" name="password" placeholder="password" required>
            <input type="password" name="konfirmasi_password" placeholder="konfirmasi password" required>
            <input type="submit" name="reset" value="Ganti">
          </form>
        </div>
        <div>
          <h4>Sudah daftar?</h4>
          <p><a href="login.php">Login Sekarang</a></p>
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
          <p>© 2022 Adam's Dev. All rights reserved</p>
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

<?php } ?>