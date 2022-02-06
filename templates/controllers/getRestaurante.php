<?php

require_once "./conexion.php";
//Esto documento lo usamos para ver la respuesta que tiene la BBDD
try {
	if ($_SERVER["REQUEST_METHOD"] == "GET") {

		$resp = getRestaurantes();

		if(is_null($resp))
			echo getResponse("KO","Error interno de base de datos");
		else
			echo getResponse("OK", "Restaurantes obtenidos correctamente", $resp);

	} else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}