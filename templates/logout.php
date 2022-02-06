<?php
//Esto lo hacemos para cuando le den al boton de cerrar session se borre el session y te mande a la pantalla de login
session_start();
session_destroy();
echo "<SCRIPT>window.location='./login.php';</SCRIPT>";
?>