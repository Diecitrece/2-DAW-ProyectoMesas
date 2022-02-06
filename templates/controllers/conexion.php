<?php
//Esta función Devuelve todas las respuestas de la misma forma y es lo optimo para futuras funciones
function getResponse($status="",$message="",$data="") {
    $response = array(
        "status"=>$status,
        "message"=>$message,
        "data"=>$data
    );

    return json_encode($response);
}
//Esta funcion es para ponerle los datos de la conexion 
function getDBConfig() {
    $dbFileConfig=dirname(__FILE__)."/dbconfiguration.xml";

	$config = new DOMDocument();
	$config->load($dbFileConfig);

	$datos = simplexml_load_file($dbFileConfig);	
	$ip = $datos->xpath("//ip");
	$name = $datos->xpath("//dbname");
	$user = $datos->xpath("//user");
	$pass = $datos->xpath("//pass");
	$cad = sprintf("mysql:dbname=%s;host=%s", $name[0], $ip[0], 'charset=utf8');
    $result = array(
        "cad" => $cad,
        "user" => $user[0],
        "pass" => $pass[0]
    );

	return $result;
} 
//Esta funcion establece la conexion con la BBDD
function getDBConexion() {
    try {
        $res = getDBConfig();

        $bd = new PDO($res["cad"], $res["user"], $res["pass"]);

        return $bd;
    } catch(Exception $e) {
        return null;
    }
}
//Esta funcion sirve para chequear que el usuario y la constraseña coinciden con la BBDD
function checkLogin($email, $pass) {
    try {
    	$bd = getDBConexion();

        if(!is_null($bd)) {
            $sqlPrepared = $bd->prepare("SELECT * from usuarios WHERE email = :email AND pass = :pass " );
            $params = array(    
                ':email' => $email,
                ':pass' => $pass
            );
            $sqlPrepared->execute($params);
            $array=$sqlPrepared->fetchAll();
            if (count($array)>0){
                session_start();
                $_SESSION["email"]= $email;
                $_SESSION["nombre"]= $array[0]["nombre"];
                $_SESSION["pass"]= $pass;
                $_SESSION["rol"] = $array[0]["rol"];
                $_SESSION['instante'] = time();
                $_SESSION["id"] = $array[0]["id"];
            }
            
            return $sqlPrepared->rowCount() > 0 ? true : false;
         } else
            return $bd;

    } catch (PDOException $e) {
       return null;
    }
}
//Esta funcion sirve para comprobar que el email no esta en la BBDD y si no esta agregar el usuario.
function addUser($data) {
    try {
    	$bd = getDBConexion();

        
        $email = $data["email"]; 
        $sql = $bd->prepare("SELECT * FROM usuarios where email = :email");
        $sql->bindParam(':email', $email);
        $sql->execute();
        $rows= $sql->rowCount();

        if(!is_null($bd)) { 
            if ($rows == 0){
                $sqlPrepared = $bd->prepare("
                    INSERT INTO usuarios (nombre,email,pass)
                    VALUES (:nombre,:email,:pass);
                ");
                $params = array(
                    ':nombre' => $data["nombre"],
                    ':email' => $data["email"],
                    ':pass' => $data["pass"]
                );
                session_start();
                $_SESSION["email"]= $email;
                $_SESSION["nombre"]= $data["nombre"];
                $_SESSION['instante'] = time();
                
                $sqlPrepared->execute($params);
                $sqlPrepared2 = $bd->prepare("
                    SELECT id FROM usuarios WHERE email = (:email)
                ");
                $params2 = array(
                    ':email' => $data["email"]
                );
                $sqlPrepared2->execute($params2);
                $resultados=$sqlPrepared2->fetchAll();
                

                $_SESSION['id'] = $resultados["0"]["id"];


                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
       return null;
    }
}
//Esta funcion sirve para obtener los restaurantes de la BBDD
function getRestaurantes() {
    try {
    	$bd = getDBConexion();

        if(!is_null($bd)) {
            $sqlPrepared = $bd->prepare("SELECT locales.id, locales.nombre, locales.detalles, locales.tlf, locales.adress, locales.img, locales.abierto, categorias.name as nombreCat FROM locales INNER JOIN rel_categorias ON locales.id = rel_categorias.idLocal INNER JOIN categorias on rel_categorias.idCategoria = categorias.id;");
            $sqlPrepared->execute();

            return $sqlPrepared->fetchAll();
        } else
            return $bd;

    } catch (PDOException $e) {
       return null;
    }
}

?>


