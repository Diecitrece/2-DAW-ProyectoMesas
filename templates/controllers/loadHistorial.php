<?php
    require_once('./conexion.php');
    session_start();
    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
                $bd = getDBConexion();
                if(!is_null($bd)) 
                {
                    $sqlPrepared = $bd->prepare("SELECT locales.nombre as local, locales.adress as direccion, reservas.tiempo_estimado as tiempo_estimado, tipo_mesas.tipo as personas, menus.nombre as menu from reservas inner JOIN locales ON locales.id = reservas.idLocal INNER JOIN tipo_mesas ON reservas.tipo_mesa = tipo_mesas.id INNER JOIN menus on reservas.tipo_menu = menus.id WHERE reservas.idUsuario = :idUsuario ORDER BY reservas.id;" );
                    $params = array(
                        ':idUsuario' => $_SESSION["id"]
                    );
                    $sqlPrepared->execute($params);
                    $resultados=$sqlPrepared->fetchAll();
                    echo getResponse("OK", "Enviadas las reservas en curso", $resultados);
                }
                else
                {
                    //Error al conectar con la base de datos
                    echo getResponse("KO","Error al conectar con la base de datos");
                }
                
        } else 
            {
                echo getResponse("KO","Tipo de petición incorrecta");
            }
    } 
    catch(Exception $e) 
        {
            echo getResponse("KO","Error interno");
        }
?>