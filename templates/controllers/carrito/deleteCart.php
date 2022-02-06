<?php
   //require_once('utils.php');
   require_once('..//conexion.php');
   try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $idReserva=$_POST["idReserva"];
        $cart = $_COOKIE["cart"];
        $cart = json_decode($cart, true);
        
        //Tengo que crear un nuevo array donde iré metiendo aquellos objetos que no quiero borrar, y excluiré el que sí
        $newcart = Array();
        foreach($cart as $reserve)
        {
            if($reserve['id'] != $idReserva)
            {
                $newcart[] = $reserve;
            }
        }
        $cart = $newcart;
        $cart = json_encode($cart);
        if ($cart=="[]")
        {
            unset($_COOKIE["cart"]);
            setcookie("cart", null, -1, '/'); 
        }
        else
        {
            setcookie("cart", $cart, time() + 3600 * 72, '/');
        }
        echo getResponse("OK","Cookie cambiada", );
	} 
    else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}    
?>