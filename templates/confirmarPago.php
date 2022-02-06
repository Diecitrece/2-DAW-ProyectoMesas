<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">
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
    <title>Confirmar Pago</title>
    <script type="text/javascript" src="..//js//carrito//ordered//factura.js"></script>
    <script type="text/javascript" src="..//js//carrito//carrito.js"></script>
</head>

<body onload="loadFactura()">
<?php require_once "./controllers/verificarUser.php"; ?>
<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@mesabar.es"><i class="icofont-support-faq mr-2"></i>soporte@mesabar.es</a></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							
							<span class="h4">CONSIGUE LA MESA EN EL BAR QUE QUIERAS </span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.php">
			  	<img src="../images/favicon.ico" alt="" class="img-fluid" style="width: 20%; height: 20%;">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  
		</div>
	</nav>
</header>
<section class="features">
  <div id="formularios">
	  <div class="container">
		  <div class="row">
			  <div class="col-lg-12">
				  <div class="feature-block d-lg-flex">
            <div class="feature-item mb-5 mb-lg-0" style="flex-basis: 100% !important;background-color: rgb(222, 222, 222)">
            <h1>Datos factura de <?php echo $_SESSION["nombre"]; ?></h1>
            <!--Dentro de este DIV es donde imprimimos los datos dinamicos de la factura-->
              <div class="factura" id="crearFactura">
                  
              </div>
            <div>
          </div>
        <div>
      </div>
    <div class="botonesFactura">
        <button class="btn btn-main btn-round-full" id="botonFacturaCancelar" onclick="cancelar()" >Cancelar</button>
        
        <button onclick="return confirmarPedido()" class="btn btn-main btn-round-full" id="botonFacturaConfirmar" >Confirmar</button>
  </div>
</section>
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