<?php
   //require_once('utils.php');
   require_once('..//conexion.php');
   try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $idLocal=$_POST["idLocal"];
        $tiempo_estimado=$_POST["tiempo_estimado"];
        $tipo_mesa=$_POST["tipo_mesa"];
        $tipo_menu=$_POST["tipo_menu"];
        $idReserva=$_POST["idReserva"];
        $cart = $_COOKIE["cart"];
        $cart = json_decode($cart, true);
        $exists = 0;
        $savedId = "";
        for ($i=0; $i < count($cart); $i++)
        {
            if ($cart[$i]['id'] == $idReserva)
            {
                $savedId = $i;
            }
        }
        $cart[$savedId] = 
        [
            "id" => $idReserva,
            "idLocal" => $idLocal,
            "tiempo_estimado" => $tiempo_estimado,
            "tipo_mesa" => $tipo_mesa,
            "tipo_menu" => $tipo_menu
        ];
            
        $cart = json_encode($cart);
        setcookie("cart", $cart, time() + 3600 * 72, '/');
        echo getResponse("OK","Cookie cambiada");
	} 
    else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}    
?>