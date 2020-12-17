<?php
    session_start();
    //Aqui se realizara el procesamiento de las variables del carrito, aqui se podran eliminar productos y agregarlos al carrito
    //haciendo uso de variables de sesion para realizar un carrito mas limpio.
    include '../DB_FUNCTIONS/DB_Functions.php';
    //variable opcional, la cual nos ayudara si es que queremos enviar alguna alerta al cliente, sobre el estado del producto 
    //agregado al carrito.
   
    //aqui validar para que solo clientes puedan agregar al carrito.

    //tanto los botones de agregar al carrito, como eliminar del carrito, deben de tener este nombre, solo cambiara el valor que lleven
    //Asi tendremos todo esto  ya mas comunicado 
    $mensaje="IMPRIME DE CARRITO";
    if(isset($_POST['btnAction'])){
        $mensaje="LLEGO AL BTN";
        switch($_POST['btnAction']){
            case 'Agregar':
                $mensaje=$mensaje."ENTRO A AGREGAR";
                if(!isset($_SESSION['CARRITO'])){
                    //SOLO MANEJARE ESTOS ATRIBUTOS DEL PRODUCTO YA QUE NO QUIERO GUARDAR TODO EL REGISTRO COMPLETO EN LA VARIABLE
                    //DE SESION, CREO QUE ES MEJOR SOLO TOMAR LOS ATRIBUTOS QUE SERVIRAN PARA LAS CUENTAS Y PARA IDENTIFICAR EL PRODUCTO
                    //CUANDO SE VEA EL DETLLE DE COMPRA, AHI SE DEBEN DE MOSTRAR TOODOS LOS DATOS
                    $producto=especific_product($_POST['ID']);
                    $prod=array(
                        'ID'=>$_POST['ID'],
                        'NOMBRE'=>$producto['nombre'],
                        'DESC'=>$producto['detalles'],
                        'PRECIO'=>doubleval($producto['precio']),
                        'CANT'=>intval($_POST['CANT']),
                        'STOCK'=>product_stock($_POST['ID'],$_POST['talla']),
                        'TALLA'=>$_POST['talla']
                    );
                    $_SESSION['CARRITO'][0]=$prod;
                    $mensaje=$mensaje."PRODUCTO AGREGADO";
                }else{
                    $id_prods=array_column($_SESSION['CARRITO'],'ID');
                
                    if(in_array($_POST['ID'],$id_prods)){
                        //Aqui podemos decididir si enviarle una alerta al usuario o simplemente agregarlo doble al carrito.
                        //las alertas que puse se pueden borrar ya que no se requieren.
                        $obj=null;
                        $keyy=null;
                        foreach($_SESSION['CARRITO'] as $key=>$prod){
                            if($prod['ID']==$_POST['ID'] && $prod['TALLA']==$_POST['TALLA'] && ($obj['STOCK']-$_POST['CANT'])>0){
                                $obj=$prod;
                                $keyy=$key;
                                
                                break;
                            }
                        }
//corregir esto hijo de la verga

                            $obj['CANT']=intval($prod['CANT'])+$_POST['CANT'];
                            $_SESSION['CARRITO'][$keyy]=$obj;


                            if($obj['TALLA']!=$_POST['talla']){
                                $num_prods=count($_SESSION['CARRITO']);
                                $producto=especific_product($_POST['ID']);
                                $prod=array(
                                    'ID'=>$_POST['ID'],
                                    'NOMBRE'=>$producto['nombre'],
                                    'DESC'=>$producto['detalles'],
                                    'PRECIO'=>doubleval($producto['precio']),
                                    'CANT'=>intval($_POST['CANT']),
                                    'STOCK'=>product_stock($_POST['ID'],$_POST['talla']),
                                    'TALLA'=>$_POST['talla']
                                );
                                $_SESSION['CARRITO'][$num_prods]=$prod;
                               
                            }
                            //echo "<script>alert('YA NO HAY MAS EN STOCK')</script>";//si se termina el stock entonces envia este mensaje
                        
                        //echo "<script>alert('El producto ya ha sido agregado')</script>";
                        $mensaje="";
                    }else{
                        //Aqui se agrega un producto nuevo.
                        $num_prods=count($_SESSION['CARRITO']);
                        $producto=especific_product($_POST['ID']);
                        $prod=array(
                            'ID'=>$_POST['ID'],
                            'NOMBRE'=>$producto['nombre'],
                            'DESC'=>$producto['detalles'],
                            'PRECIO'=>doubleval($producto['precio']),
                            'CANT'=>intval($_POST['CANT']),
                            'STOCK'=>product_stock($_POST['ID'],$_POST['talla']),
                            'TALLA'=>$_POST['talla']
                        );
                        $_SESSION['CARRITO'][$num_prods]=$prod;
                        $mensaje="Producto agregado 2";
                    }
                }
                break;
            case 'Eliminar':
                if(is_numeric($_POST['ID'])){
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$_POST['ID'] && $prod['TALLA']==$_POST['TALLA']){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('elemento eliminado');</script>";
                        }
                    }
                }
                break;
            
            case 'Cant_MAS':
                $ID=$_POST['ID'];
                if($_POST['ID']){
                    $op=null;
                    $ke=null;
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$ID && $prod['TALLA']==$_POST['TALLA']){
                            //echo "si entre perro";
                            $prod['CANT']++;
                            $op=$prod;
                            $ke=$indice;
                            break;
                            //echo "<script>alert('elemento AGREGADO');</script>";
                        }
                    }
                    $_SESSION['CARRITO'][$ke]=$op;

                }
                break;
            case 'Cant_MENOS':
                $ID=$_POST['ID'];
                if($_POST['ID']){
                    $op=null;
                    $ke=null;
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$ID && $prod['TALLA']==$_POST['TALLA']){
                            
                            if ($prod['CANT']>1) {
                                $prod['CANT']--;
                                $op=$prod;
                                $ke=$indice;
                                $_SESSION['CARRITO'][$ke]=$op;
                            }else{
                                echo "nelson";
                            }
                            //echo "<script>alert('elemento QUITADO');</script>";
                        }
                    }
                }
                break;
        }
    }
?>
