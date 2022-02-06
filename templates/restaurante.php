<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Restaurante</title>

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

  <!-- JS principales: -->
  <script type="text/javascript" src="..//js//carrito//changeCart.js"></script>
</head>

<body id="top" onload="getRestaurante()">

	<?php require_once "./template/header.html"; require_once "./controllers/verificarUser.php";?>



<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Vea o reserve una mesa.</span>
					<h1 class="mb-3 mt-3">Area restaurante.</h1>
					<div class="btn-container ">
						<p href="" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Busca tu mesa o un pack <i class="icofont-simple-right ml-2"></i></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="ModalReserva" tabindex="-1" role="dialog" aria-labelledby="ModalReservaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione horario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-all">
       <div class='modal-body' >
          <p>Seleccione horario y tipo de mesa</p>
          <form id="realizar_Form">
            <input type="hidden" id="hidden_idLocal">
            <label>Tiempo estimado de llegada: <input type="text" name='tiempo_estimado' required>
            </label>
            <label>Personas: <select name='tipo_mesa' id="desplegar_mesas">∑
            </select>
            </label><br>
            <label>Menu: <select name='tipo_menu' id="desplegar_menu">
            </select>
            </label>
          </form>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
          <button type='button' class='btn btn-primary' id="button_realizar" data-dismiss='modal' onclick="return setCart('realizar_Form')">Realizar reserva</button>
        </div>
        </div>
    
      </div>
    </div>
  </div>
</div>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
 
          <div class="table" id="local-container" style="margin-top: 10%;"></div>

          <p id="no-bar-message" style="display: none;">No hay restaurantes disponibles en estos momentos</p>

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
    <script src="../js/restaurantes.js"></script>
	<?php require_once "./template/footer.html"; ?>
  </body>
  </html>
   