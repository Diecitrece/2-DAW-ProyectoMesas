<?php
    require_once('..//..//conexion.php');
    session_start();
    try 
    {
        $json_reserves = $_SESSION["reserves"];
        $idUser = $_SESSION["id"];
        $json_reserves = json_decode($json_reserves);
        $bd = getDBConexion();
        if(!is_null($bd))
        {
            $bd->beginTransaction();
            $sqlPrepared = $bd->prepare("INSERT INTO macrorreservas (macrorreservas.idUsuario) VALUES (:idUsuario);");
            $params = array(
                ':idUsuario' => $idUser
            );
            $confirmed=$sqlPrepared->execute($params);
            $macroID = $bd->lastInsertId();
            if (!$confirmed)
                {
                    $bd->rollBack();
                    echo getResponse("KO", "Error al subir a la bbdd");
                }
            else
            {
                foreach($json_reserves as $reserve)
            {
                $sqlPrepared = $bd->prepare("INSERT INTO reservas (idLocal, idUsuario, tiempo_estimado, tipo_mesa, tipo_menu, macrorreserva) VALUES (:idLocal, :idUsuario, :tiempo_estimado, :tipo_mesa, :tipo_menu, :macroID)");
                $params = array(
                    ':idLocal' => $reserve->idLocal,
                    ':idUsuario' => $idUser,
                    ':tiempo_estimado' => $reserve->tiempo_estimado,
                    ':tipo_mesa' => $reserve->tipo_mesa,
                    ':tipo_menu' => $reserve->tipo_menu,
                    ':macroID' => $macroID
                );
                $confirmed=$sqlPrepared->execute($params);
                if (!$confirmed)
                {
                    $bd->rollBack();
                    echo getResponse("KO", "Error al subir a la bbdd");
                }
                else
                {
                    $bd->commit();
                    unset($_COOKIE["cart"]);
                    setcookie("cart", null, -1, '/'); 
                    echo getResponse("OK", "Todo subido correctamente");
                }
                
            }
            }
        }
        else
        {
            //Error al conectar con la base de datos
            echo getResponse("KO","Error al conectar con la base de datos");
        }
    }catch(PDOException $e) {
        echo 'Error al conectar: ' . $e->getMessage();
    }    
?>