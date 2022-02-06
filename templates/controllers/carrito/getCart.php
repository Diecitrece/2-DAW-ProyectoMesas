<?php
    //require_once('utils.php');
    require_once('..//conexion.php');
    try {
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            if(!isset($_COOKIE["cart"]))
            {
                $cart="No hay reservas en curso";
                echo getResponse("OK", "No hay reservas en curso", $cart);
            }
            else                                                                                                                                                                                            
            {
                $cart = $_COOKIE["cart"];
                $cart = json_decode($cart, true);
                //Modificar json para contener los datos de la bbdd
                $bd = getDBConexion();
                if(!is_null($bd)) 
                {
                    for($i=0; $i < count($cart); $i++)
                    {
                        $cart[$i];
                        $sqlPrepared = $bd->prepare("SELECT locales.nombre as nombreLocal, locales.adress as direcLocal FROM locales WHERE locales.id = :idLocal;" );
                        $params = array(
                            ':idLocal' => $cart[$i]['idLocal']
                        );
                        $sqlPrepared->execute($params);
                        $resultados=$sqlPrepared->fetchAll();

                        $sqlPrepared = $bd->prepare("SELECT mesas.tipo as id_tipo, tipo_mesas.tipo as tipo FROM mesas INNER JOIN tipo_mesas on mesas.tipo = tipo_mesas.id WHERE mesas.idLocal = :idLocal;" );
                        $params = array(
                            ':idLocal' => $cart[$i]['idLocal']
                        );
                        $sqlPrepared->execute($params);
                        $resultadosMesas=$sqlPrepared->fetchAll();

                        $sqlPrepared = $bd->prepare("SELECT menus.id as id, menus.nombre as menu, menus.detalles as descripcion FROM menus WHERE menus.idLocal = :idLocal;" );
                        $params = array(
                            ':idLocal' => $cart[$i]['idLocal']
                        );
                        $sqlPrepared->execute($params);
                        $resultadosMenu=$sqlPrepared->fetchAll();

                        if (count($resultados)!=0 && count($resultadosMesas)!=0 && count($resultadosMenu)!=0)
                        {
                            $tipos_mesas = Array();
                            $tipos_menu = Array();

                            foreach($resultadosMesas as $tipo_mesa)
                            {
                                    $tipos_mesas[$tipo_mesa['id_tipo']] = $tipo_mesa['tipo'];
                            }
                            foreach($resultadosMenu as $menu)
                            {
                                    $tipos_menu[$menu["id"]] = 
                                    [
                                        "menu" => $menu["menu"],
                                        "descripcion" => $menu["descripcion"]
                                    ];
                            }
                            $cart[$i] = 
                            [
                                "id" => $cart[$i]['id'],
                                "idLocal" => $cart[$i]['idLocal'],
                                "nombreLocal" => $resultados[0]["nombreLocal"],
                                "direcLocal" => $resultados[0]["direcLocal"],
                                "tiempo_estimado" => $cart[$i]['tiempo_estimado'],
                                "tipos_mesas" => $tipos_mesas,
                                "tipo_mesa_seleccionado" => $cart[$i]['tipo_mesa'],
                                "tipos_menu" => $tipos_menu,
                                "tipo_menu_seleccionado" => $cart[$i]['tipo_menu']
                            ];
                        }
                    }
                    echo getResponse("OK", "Enviadas las reservas en curso", $cart);
                }
                else
                {
                    //Error al conectar con la base de datos
                    echo getResponse("KO","Error al conectar con la base de datos");
                }
                
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