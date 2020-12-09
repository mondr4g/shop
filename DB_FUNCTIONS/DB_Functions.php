<?php
    include 'DB_connection.php';
    //asignacion de la conexion a mysql como una variable global para que sea accesible dentro de este archivo.
    $GLOBALS['conne']=$conne;
    //funcion para obtener el usuario
    function obtener_user($username,$password){
        $usuario=null;
        $sql_select = "SELECT * FROM usuario WHERE username = '$username';";
        $result = $GLOBALS['conne']->query($sql_select);
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            if ($password!=$usuario['passw']) {
                return null;
            }
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

    
?>