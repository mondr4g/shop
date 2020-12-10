<?php
    include 'DB_connection.php';
    //asignacion de la conexion a mysql como una variable global para que sea accesible dentro de este archivo.
    $GLOBALS['conne']=$conne;
    //funcion para obtener el usuario
    function validate_user($username,$password){
        $usuario=null;
        $sql_select = "SELECT * FROM usuario WHERE username = '$username';";
        $result = $GLOBALS['conne']->query($sql_select);
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            /*if (sha1($password)!=$usuario['passw']) {
                return null;
            }*/
            if ($password!=$usuario['passw']) {
                return null;
            }
            return $usuario;
        }else{
            return $usuario;
        }
    }

    function select_user_id($username){
        $usuario=null;
        $sql_select = "SELECT Id_usuario FROM usuario WHERE username = '$username';";
        $result = $GLOBALS['conne']->query($sql_select);
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            return $usuario;
        }else{
            return $usuario;
        }
    }
    //funcion para identificar el usuario como cliente
    function select_client($id_usuario){
        $sql_select_client= "SELECT * FROM cliente WHERE Id_cliente = '$id_usuario';";
        $cli=$GLOBALS['conne']->query($sql_select_client);
        if($cli->num_rows>0){
            return true ;
        }else{
            echo $cli->mysqli_error();
            return false;
        }
    }
    //funcion para identificar al usuario como admin
    function select_admin($id_usuario){
        $sql_select_admin= "SELECT * FROM administrador WHERE Id_admin = '$id_usuario' ;";
        $ad=$GLOBALS['conne']->query($sql_select_admin);
        if($ad->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

    //insertar usuarios en general
    function insert_user($user_data){
        $sql_insert="INSERT INTO `usuario`(`Id_usuario`, `username`, `passw`, `email`, `p_nombre`, `s_nombre`, `ape_pat`, `ape_mat`, ".
        "`fec_nac`, `telefono`, `ciudad`, `colonia`, `estado`, `calle`, `numero`, `num_interior`, `cod_postal`) VALUES ".
        "( ,'".$user_data['username']."','".sha1($user_data['password'])."','".$user_data['email']."',".
        "'".$user_data['nom_1']."','".$user_data['nom_2']."','".$user_data['ape_1']."','".$user_data['ape_2']."',".
        "'".$user_data['fecha']."','".$user_data['tel']."','".$user_data['ciudad']."','".$user_data['colonia']."',".
        "'".$user_data['estado']."','".$user_data['calle']."',".intval($user_data['num_e']).",'".$user_data['num_i']."','".$user_data['c_p']."');";

        if($GLOBALS['conne']->query($sql_insert)){
            return true;
        }else{
            return false;
        }
    }
    //inertar administrador
    function insert_admin($id_user){
        $sql_insert="INSERT INTO `administrador`(`Id_cliente`) VALUES ".
        "(".intval($id_user).");";
        $GLOBALS['conne']->query($sql_insert);
    }
    //insertar clientes
    function insert_client($id_user,$genero,$gustos){
        $sql_insert="INSERT INTO `cliente`(`Id_cliente`, `gustos`,`genero`) VALUES ".
        "(".intval($id_user).",'".$gustos."','".$genero."');";
        $GLOBALS['conne']->query($sql_insert);
    }

    
?>