<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Inicio</title>

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

	<?php require_once "./template/header.html"; require_once "./controllers/verificarUser.php";  ?>



<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Un gran proyecto</span>
					<h1 class="mb-3 mt-3">Que nace de una idea innovadora</h1>
					
					<p class="mb-4 pr-5">Detras de este proyecto hay un gran equipo detras tanto profesional como humano. No dudes en probar nuestra página.</p>
					<div class="btn-container ">
						<a href="./restaurante.php" class="btn btn-main-2 btn-icon btn-round-full">Realizar reserva <i class="icofont-simple-right ml-2  "></i></a>
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
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<img src="https://image.flaticon.com/icons/png/512/45/45454.png" style=" width: 60px;">
						</div>
						<span>Realice la reserva que mas se adapte a usted</span>
						<h4 class="mb-3">Reservas online y en menos de 10 minutos</h4>
						<p class="mb-4">En 2 sencillos pasos.Realice la reserva de la mesa y del pack que usted desee y espere la confirmacion del hostelero.</p>
						<a href="restaurante.php" class="btn btn-main btn-round-full">Realizar reserva</a>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<img src="https://i.pinimg.com/originals/db/c5/7b/dbc57b7afeed83e858137b975af91b3f.png" style=" width: 60px;">
						</div>
						<span>Gran variedad de horarios</span>
						<h4 class="mb-3">Horarios mas comunes</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">Comidas : <span>13:30 / 14:45</span></li>
							<li class="d-flex justify-content-between">Comidas : <span>15:00 / 16:15</span></li>
		                    <li class="d-flex justify-content-between">Cenas : <span>21:00 / 22:20 </span></li>
		                    <li class="d-flex justify-content-between">Cenas : <span>22:30 / Cierre</span></li>
		                </ul>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<img src="https://cdn-icons-png.flaticon.com/512/32/32473.png" style=" width: 60px;">
						</div>
						<span>Dudas o sugerencias</span>
						<h4 class="mb-3">+34 985 34 56 66</h4>
						<p>Si tiene cualquier problema o cualquier duda sobre algo de nuestra página. Comuniquese con nosotros por correo o por telefono</p>
						<a href="contacto.php" class="btn btn-main btn-round-full">Contacto</a>
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
	<?php require_once "./template/footer.html"; ?>
  </body>
  </html>
   