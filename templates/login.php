<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Login</title>
    <link  href="../css/style.css" rel="stylesheet">
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
    <?php require_once "./template/header.html"; session_start(); ?>
<section class="features">
<div id="formularios">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
                    <div id="cliente">
                        <div class="feature-item mb-5 mb-lg-0">
                            <div class="feature-icon mb-4">
                            <img src="../images/perfil.png" style=" width: 60px;">
                                <h1>Area Consumidor</h1>
                                <input type="submit" value="Registro Nuevo" class="btn btn-primary btn-lg btn-block" id="boton" style="width:50%;"  onclick ="mostrarRegistroUsuario()"><br>
                                <div id="clienteNuevo" style="display: none;">
                                    <form onsubmit="return addUser();" method="POST" id="formulario">
                                        <div id="addko" style="display: none; color:red; ">
                                            <p>¡Login incorrecto! Comprueba el email y la contraseña</p>
                                        </div>
                                        <div id="addok" style="display: none; color:green; ">
                                            <p>¡Login correcto!</p>
                                        </div>
                                        Registro de nuevos Consumidores <br>
                                        Nombre: <input type="text" name="addnombre" id="addnombre" required> <br>  
                                        Correo: <input type="text" name="addemail" id="addemail" required><br> 
                                        Contraseña: <input type="password" name="addpass" id="addpass" required><br> 
                                        <input type="submit" value="Enviar" id="Entrar" name="Enviar" class="btn btn-primary btn-lg btn-block" style="width:26%;">
                                        
                                    </form>
                                    <input type="image" class="flecha" onclick="atrasRegisUser()" src="https://cdn-icons-png.flaticon.com/512/860/860825.png" width="50px !important">
                                </div>
                                <input type="submit" value="Inicio sesion" id="boton2" class="btn btn-default btn-lg btn-block" style="background-color: #e2d7d7 !important; width:50%;" onclick ="mostrarInicioUsuario()"><br>
                                <div id="clienteInicio"style="display: none;">
                                    <form onsubmit="return comprobarDatos();" method="POST" id="formulario">
                                        <div id="ko" style="display: none; color:red; ">
                                            <p>¡Login incorrecto! Comprueba el email y la contraseña</p>
                                        </div>
                                        <div id="ok" style="display: none; color:green; ">
                                            <p>¡Login correcto!</p>
                                        </div>
                                        Inicio de sesion<br>
                                        Correo: <input type="text" name="email" id="email" required><br> 
                                        Contraseña: <input type="password" name="pass" id="pass" required><br> 
                                        
                                        <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block" style="width:26%;" id="Entrar">
                                    </form>
                                    <input type="image" class="flecha2" onclick="atrasUser()"  src="https://cdn-icons-png.flaticon.com/512/860/860825.png" width="50px">
                                </div>
                            </div>
                        </div>  
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php require_once "./template/footer.html"; ?>
<script src="../js/script.js" ></script>

</body>
</html>