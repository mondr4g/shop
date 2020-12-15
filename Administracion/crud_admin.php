<?php
    session_start();

    include '../DB_FUNCTIONS/DB_functions.php';

    if(isset($_SESSION['admin_on'])){
        //Aqui a gregar la parte a procesar
        
        if($_POST['btnAccionUs']){
            $id_us=$_POST['id_us'];
            switch($$_POST['btnAccionUs']){
                case 'Eliminar':
                    if($id_us!=$_SESSION['admin_on']){
                        //proceder a eliminar

                        //Haber si podemos meter un yes/no
                        delete_user($id_us);
                    } 
                    break; 
                case 'Actualizar':
                    //Conviene recuperar los datos y mostrarlos en un formulario para luego modificarlos y volver a sobrescribir el registro.
                    switch($_POST['tipo']){
                        case 'ad':
                            $imp="a";
                            break;
                        case 'cl':
                            $imp="c";
                            break;
                    }
                    header("location:edit_registro.php?id_us=$id_us&tipo=u&imp=$imp");
                    break;
                case 'Agregar':
                    header('location:../regist.php');
                    break;

            }

        }
        if($_POST['btnAccionProd']){
            $id_prod=$_POST['id_prod'];
            switch($$_POST['btnAccionProd']){
                case 'Eliminar':
                    //Aqui tambien realizar la confirmacion.
                    delete_product($id_prod);
                    break;
                case 'Actualizar':
                    header("location:edit_registro.php?id_prod=$id_prod&tipo=p");
                    break;
                case 'Agregar':
                    header("location:Add_producto.php");
                    break;

            }
        }
    }

?>