<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Area Cliente</title>

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

<body id="top">

	<?php require_once "./template/header.html"; require_once "./controllers/verificarUser.php"; ?>



<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Vea o modifique sus datos.</span>
					<h1 class="mb-3 mt-3">Area usuario.</h1>
					<div class="btn-container ">
						<a href="restaurante.php" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Modificar datos <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex" style="display:flex !important;">
					<div class="feature-item mb-5 mb-lg-0" style="margin: 0 auto;">
						<div class="feature-icon mb-4">
							<img src="../images/perfil.png" style=" width: 60px;">
						</div>
						<div id="actualizarNormal" >
							<h4 class="mb-3">Datos personales</h4>
							<ul class="w-hours list-unstyled">
								<li class="d-flex justify-content-between">Nombre : <span><?php echo $_SESSION["nombre"]; ?></span></li>
								<li class="d-flex justify-content-between">Correo : <span><?php echo $_SESSION["email"]; ?> </span></li>
								<li class="d-flex justify-content-between">Hora acceso sesión : <span><?php echo date('d/m/Y H:i:s ', $_SESSION['instante']); ?></span></li>
							</ul>
							<input type="submit" value="Modificar datos" onclick="botonModificar()" class="btn btn-main btn-round-full">
							<input value="Historial de reservas" onclick="window.location.replace('historial.php')" class="btn btn-main btn-round-full" style="margin-top: 11px !important;">
						</div>
						<div id="actualizar">
							<h4 class="mb-3" >Modificar datos personales</h4>
							<ul class="w-hours list-unstyled">
								<li class="d-flex justify-content-between">Nombre : <span><input type="text" value="<?php echo $_SESSION["nombre"]; ?>"</span></li>
								<li class="d-flex justify-content-between">Correo : <span><input type="text" value="<?php echo $_SESSION["email"]; ?>"</span></li>
								<li class="d-flex justify-content-between">Pass antigua : <span><input type="password" value="<?php echo $_SESSION["pass"]; ?>"</span></li>
								<li class="d-flex justify-content-between">Pass nueva : <span><input type="password" value=""</span></li>
								<li class="d-flex justify-content-between">Rol : <span><?php echo $_SESSION["rol"]; ?></span></li>
							</ul>
							<input type="submit" value="Actualizar" onclick="actualizarDatos()" class="btn btn-main btn-round-full">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
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
	<script src="../js/script.js" ></script>
	
	<?php require_once "./template/footer.html"; ?>
  </body>
  </html>
   