<?php
    require_once('..//..//conexion.php');
    session_start();
    try 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $json_reserves = $_POST["reserves"];
            $_SESSION["reserves"] = $json_reserves;
            $json_reserves = json_decode($json_reserves);
            $for_mail = Array();
            $bd = getDBConexion();
            if(!is_null($bd))
            {
                foreach($json_reserves as $reserve)
                {
                    //Sacar los datos a partir de sus id para enviarlos por mail
                    $sqlPrepared = $bd->prepare("select locales.nombre as nombre, locales.tlf as tlf, locales.adress as direccion from locales WHERE locales.id = :idLocal;" );
                    $params = array(
                        ':idLocal' => $reserve->idLocal
                    );
                    $sqlPrepared->execute($params);
                    $local=$sqlPrepared->fetchAll();
                    $local = Array('nombre' => $local[0]['nombre'], 'tlf' => $local[0]['tlf'], 'direccion' => $local[0]['direccion']);

                    $sqlPrepared = $bd->prepare("SELECT tipo_mesas.tipo FROM tipo_mesas WHERE tipo_mesas.id = :tipo_mesa;" );
                    $params = array(
                        ':tipo_mesa' => $reserve->tipo_mesa
                    );
                    $sqlPrepared->execute($params);
                    $tipo_mesa=$sqlPrepared->fetchAll();
                    $tipo_mesa=$tipo_mesa[0]['tipo'];

                    $sqlPrepared = $bd->prepare("SELECT menus.nombre as nombre, menus.detalles as detalles from menus where menus.id = :tipo_menu;");
                    $params = array(
                        ':tipo_menu' => $reserve->tipo_menu
                    );
                    $sqlPrepared->execute($params);
                    $tipo_menu=$sqlPrepared->fetchAll();
                    $tipo_menu = Array('nombre' => $tipo_menu[0]['nombre'], 'detalles' => $tipo_menu[0]['detalles']);
                
                    $for_mail[]=
                    [
                        'idLocal' => $local,
                        'tiempo_estimado' => $reserve->tiempo_estimado,
                        'tipo_mesa' => $tipo_mesa,
                        'tipo_menu' => $tipo_menu
                    ];
                }

                //AQUÍ HACE FALTA MANDAR LOS DATOS AL ARCHIVO QUE LOS SUBA A LA BBDD
                
                echo getResponse("OK", "Json editado correctamente", json_encode($for_mail));
            }
            else
            {
                //Error al conectar con la base de datos
                echo getResponse("KO","Error al conectar con la base de datos");
            }
            

            
        }
    }catch(Exception $e) {
        echo getResponse("KO","Error interno");
    }    

?>