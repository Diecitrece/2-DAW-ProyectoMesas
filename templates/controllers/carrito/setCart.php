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
        if(!isset($_COOKIE["cart"]))
        {
            $cart = Array();
            $cart[] = 
            [
                "id" => 0,
                "idLocal" => $idLocal,
                "tiempo_estimado" => $tiempo_estimado,
                "tipo_mesa" => $tipo_mesa,
                "tipo_menu" => $tipo_menu
            ];
            $cart = json_encode($cart);
            setcookie("cart", $cart, time() + 3600 * 72, '/');
            echo getResponse("OK","Cookie establecida desde cero");
        }
        else
        {
            $cart = $_COOKIE["cart"];
            $cart = json_decode($cart, true);
            $id = ($cart[count($cart)-1]["id"]) + 1;
            $cart[] = 
            [
                "id" => $id,
                "idLocal" => $idLocal,
                "tiempo_estimado" => $tiempo_estimado,
                "tipo_menu" => $tipo_menu,
                "tipo_mesa" => $tipo_mesa
            ];
            $cart = json_encode($cart);
            setcookie("cart", $cart, time() + 3600 * 72, '/');
            echo getResponse("OK","Cookie establecida");
        }    
	} 
    else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}    
?>