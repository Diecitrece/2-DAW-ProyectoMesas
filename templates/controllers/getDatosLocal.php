<?php
//En este documento entramos a la BBDD y cargamos los datos de los locales para imprimirlos por pantalla
    include "./conexion.php";
    $idLocal = $_POST["idLocal"];
    $idLocal=intval($idLocal);
    $bd = getDBConexion();
    if(!is_null($bd)) 
    {
        
            $sqlPrepared = $bd->prepare("SELECT mesas.tipo as id_tipo, tipo_mesas.tipo as tipo FROM mesas INNER JOIN tipo_mesas on mesas.tipo = tipo_mesas.id WHERE mesas.idLocal = :idLocal;" );
            $params = array(
                ':idLocal' => $idLocal
            );
            $sqlPrepared->execute($params);
            $resultadosMesas=$sqlPrepared->fetchAll();

            $tipos_mesas = Array();
            if (count($resultadosMesas)!=0)
            {
                foreach($resultadosMesas as $tipo_mesa)
                {
                        $tipos_mesas[$tipo_mesa['id_tipo']] = $tipo_mesa['tipo'];
                }
            }
            else
            {
                $tipos_mesas = null;
            }

            //SELECT menus.nombre as menu, menus.detalles as descripcion FROM menus WHERE menus.idLocal = 1; 

            $sqlPrepared = $bd->prepare("SELECT menus.id as id, menus.nombre as menu, menus.detalles as descripcion FROM menus WHERE menus.idLocal = :idLocal;" );
            $params = array(
                ':idLocal' => $idLocal
            );
            $sqlPrepared->execute($params);
            $resultadosMenu=$sqlPrepared->fetchAll();

            $menus = Array();
            if (count($resultadosMenu)!=0)
            {
                foreach($resultadosMenu as $menu)
                {
                        $menus[] = 
                        [
                            "id" => $menu["id"],
                            "menu" => $menu["menu"],
                            "descripcion" => $menu["descripcion"]
                        ];
                }
            }
            else
            {
                $menus = null;
            }
            
            $params=[$tipos_mesas, $menus];
            echo getResponse("OK", "Enviadas las reservas en curso", $params);
    }
    else
    {
        //Error al conectar con la base de datos
        echo getResponse("KO","Error al conectar con la base de datos");
    }
?>