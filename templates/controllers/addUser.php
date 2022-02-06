<?php
//Esta es la funcion que primero ejecutamos para añadir a un usuario y nos manda a otra.
require_once "./conexion.php";

try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $data = array(
            "nombre" => $_POST["nombre"],
            "email" => $_POST["email"],
            "pass" => $_POST["pass"]
        );

		$resp = addUser($data);

		if(is_null($resp))
			echo getResponse("KO","Error interno de base de datos",);
		else {
			if($resp)
            	echo getResponse("OK","Usuario añadido correctamente!",$resp);
			else
				echo getResponse("KO_LOGIN","Usuario ya existente!",$resp);
		}


	} else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}
?>