<?php
    session_start();

    include '../DB_FUNCTIONS/DB_functions';

    if(isset($_SESSION['admin_on'])){

        if($_POST){//Aqui para realizar la actualizacion de los valores.
            //envia por post, la info o lo que sea, tambien un distintivo para saber, cuando se modifica un admin o un cliente normal.
            //todavia no acabo aqui xdxdxdxd

            switch($_POST['tipo']){
                case 'u';
                    $user_data=array(
                        "id"=>$$_POST['id_us'],
                        "username" => $_POST['txtusr'],
                        "password" => $_POST['txtpasswd'],
                        "nom_1" => $_POST['nom1'],
                        "nom_2" => $_POST['nom2'],
                        "ape_1" => $_POST['ape1'],
                        "ape_2" => $_POST['ape2'],
                        "fec_nac" => $_POST['fecha'],
                        "email" => $_POST['email'],
                        "tel" => $_POST['tel'],
                        "estado" => $_POST['estado'],
                        "ciudad" => $_POST['ciudad'],
                        "colonia" => $_POST['colonia'],
                        "calle" => $_POST['calle'],
                        "num_ext" => $_POST['num_e'],
                        "num_int" => $_POST['num_i'],
                        "codigo" => $_POST['c_p']
                    );
                    $usuario=null;
                    if($_GET['imp']=="a"){
                        $user_data+=['Id_admin' => $_GET['id_us']];
                        modify_admin($user_data);
                    }elseif($_GET['imp']=="c"){
                        $user_data+=['Id_cliente' => $_GET['id_us']];
                        $user_data+=['gustos' => $_GET['gustos']];
                        $user_data+=['genero' => $_GET['genero']];
            
                        modify_cliente($user_data);
                    }

                break;
                
                case 'p':
                    # code...

                    break;
            }
        }

?>
    <!-- AQUI METELE LO PRIMERO DEL DISEÑO -->
<?php

        if($_GET){
            switch($_GET['tipo']){
                case'u'://Aqui es cuando llega un usuario
                    $usuario=null;
                    if($_GET['imp']=="a"){
                        $usuario=get_admin($_GET['id_us']);
                    }elseif($_GET['imp']=="c"){
                        $usuario=get_client($_GET['id_us']);
                    }

                    //$usuario contiene toda la info del usuario ya sea admin o cliente, puedes utilizar
                    //estas comparaciones para separar los campos que tenga cada uno.
?>
    <!-- AQUI LE METES LO DELUSUARIO. -->
<?php

                    break;
                
                case 'p':
                    //Aqui traere el producto y las tallas aparte.
                    $info_prod=especific_product($_GET['id_prod']);//ya viene como un array asociado
                    $tallas=rec_tallas($_GET['id_prod']);//este recorrelo con un foreach, si los quieres mostrar

?>
    <!--- Aqui le metes lo del formulario para el producto. --->
<?php                    
                    break;

            }
        }
    }
    
?>