<?php
    //Aqui se realizara el procesamiento de las variables del carrito, aqui se podran eliminar productos y agregarlos al carrito
    //haciendo uso de variables de sesion para realizar un carrito mas limpio.
    session_start();

    
    //variable opcional, la cual nos ayudara si es que queremos enviar alguna alerta al cliente, sobre el estado del producto 
    //agregado al carrito.
    $mensaje=null;

    //tanto los botones de agregar al carrito, como eliminar del carrito, deben de tener este nombre, solo cambiara el valor que lleven
    //Asi tendremos todo esto  ya mas comunicado 
    if(isset($_POST['btnAccion'])){
        switch($_POST['btnAccion']){
            case 'Agregar':
                if(!isset($_SESSION['CARRITO'])){
                    //SOLO MANEJARE ESTOS ATRIBUTOS DEL PRODUCTO YA QUE NO QUIERO GUARDAR TODO EL REGISTRO COMPLETO EN LA VARIABLE
                    //DE SESION, CREO QUE ES MEJOR SOLO TOMAR LOS ATRIBUTOS QUE SERVIRAN PARA LAS CUENTAS Y PARA IDENTIFICAR EL PRODUCTO
                    //CUANDO SE VEA EL DETLLE DE COMPRA, AHI SE DEBEN DE MOSTRAR TOODOS LOS DATOS
                    $prod=array(
                        'ID'=>$_POST['ID'],
                        'NOMBRE'=>$_POST['NOMBRE'],
                        'DESC'=>$_POST['DESC'],
                        'PRECIO'=>$_POST['PRECIO'],
                        'CANT'=>$_POST['CANT'],
                        'STOCK'=>$_POST['STOCK']
                    );
                    $_SESSION['CARRITO'][0]=$prod;
                    $mensaje="Producto agregado";
                }else{
                    $id_prods=array_column($_SESSION['CARRITO'],'ID');

                    if(in_array($_POST['ID'],$id_prods)){
                        //Aqui podemos decididir si enviarle una alerta al usuario o simplemente agregarlo doble al carrito.
                        //las alertas que puse se pueden borrar ya que no se requieren.
                        if($_SESSION['CARRITO'][$id_prods]['STOCK']>0)
                            $_SESSION['CARRITO'][$id_prods]['CANT']++;//Agrega uno mas
                        else
                            echo "<script>alert('YA NO HAY MAS EN STOCK')</script>";//si se termina el stock entonces envia este mensaje
                        echo "<script>alert('El producto ya ha sido agregado')</script>";
                        $mensaje="";
                    }else{
                        //Aqui se agrega un producto nuevo.
                        $num_prods=count($_SESSION['CARRITO']);
                        $prod=array(
                            'ID'=>$_POST['ID'],
                            'NOMBRE'=>$_POST['NOMBRE'],
                            'DESC'=>$_POST['DESC'],
                            'PRECIO'=>$_POST['PRECIO'],
                            'CANT'=>$_POST['CANT'],
                            'STOCK'=>$_POST['STOCK']
                        );
                        $_SESSION['CARRITO'][$num_prods]=$prod;
                        $mensaje="Producto agregado";
                    }
                }
                break;
            case 'Eliminar':
                if(is_numeric($_POST['id'])){
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$_POST['id']){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('elemento eliminado');</script>";
                        }
                    }
                }
                break;
            
            case 'Cant_+':
                $ID=$_POST['id'];
                if(is_numeric($_POST['id'])){
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$ID){
                            $_SESSION['CARRITO'][$ID]['CANT']++;
                            //echo "<script>alert('elemento eliminado');</script>";
                        }
                    }
                }
                break;
            case 'Cant_-':
                $ID=$_POST['id'];
                if(is_numeric($_POST['id'])){
                    foreach($_SESSION['CARRITO'] as $indice=>$prod){
                        if($prod['ID']==$ID){
                            $_SESSION['CARRITO'][$ID]['CANT']--;
                            //echo "<script>alert('elemento eliminado');</script>";
                        }
                    }
                }
                break;
        }
    }


?>