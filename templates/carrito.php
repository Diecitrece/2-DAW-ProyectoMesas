<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Carrito</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php require_once "./template/header.html";  require_once "./controllers/verificarUser.php"; ?>
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Vea,modifique o realice una reserva.</span>
					<h1 class="mb-3 mt-3">Area Carrito.</h1>
					<div class="btn-container ">

						<a  target="_blank" class="btn btn-main-2 btn-icon btn-round-full" onclick="return send_order()">Finalizar reserva <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
    <div class="general">
        <div id="" class=""></div>
            <div class="opciones">
                <section class="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" >
                                <div class="feature-block d-lg-flex">
                                        <!--Aqui es donde imprimimos las tablas del carrito -->
                                        <div id="contener_reservas" style="display: grid;grid-template-columns: repeat(2, 1fr);margin: 30 px10px !important;">
                                            
                                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
<script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>
    <script src="../js/restaurantes.js"></script>
    <script type="text/javascript" src="..//js//carrito//changeCart.js"></script>
    <script type="text/javascript" src="..//js//carrito//ordered//factura.js"></script>
    <script type="text/javascript" src="..//js//carrito//carrito.js"></script>
	<?php require_once "./template/footer.html"; ?>
</html>