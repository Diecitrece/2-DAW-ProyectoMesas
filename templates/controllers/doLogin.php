<?php
require_once "./conexion.php";
//Esta es la funcion que usamos para comprobar que el usuario es correcto y mandamos el responde con los datos
try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$resp = checkLogin($_POST['email'],$_POST['pass']);

		if(is_null($resp))
			echo getResponse("KO","Error interno de base de datos");
		else
			echo $resp ? getResponse("OK","Login correcto!") : getResponse("KO_LOGIN","Login incorrecto!");

	} else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}
?>