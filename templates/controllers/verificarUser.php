<?php
//Aqui entramos en todas la paginas que tenemos que queremos que solo se puedan acceder con el usuario logeado
session_start();

$hora=$_SESSION['instante'];
if (!isset($_SESSION['nombre'])){
    echo "<script>window.location.replace('./login.php')</script>";
}

?>