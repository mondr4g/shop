<?php
    include 'DB_connection.php';
    //asignacion de la conexion a mysql como una variable global para que sea accesible dentro de este archivo.
    $GLOBALS['conne']=$conne;

    //*********************** 
    //Funciones para el login
    //***********************
    //SELECT * FROM `producto` NATURAL JOIN `descripcion_producto` WHERE descripcion_producto.talla='xs'
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
        $sql_select = "SELECT * FROM usuario WHERE username = '$username';";
        $result = $GLOBALS['conne']->query($sql_select);
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            return $usuario['Id_usuario'];
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

    //funcion que retorna un usuario
    function select_user($id_usuario){
        $sql_select_admin= "SELECT * FROM usuario WHERE Id_usuario = '$id_usuario' ;";
        $ad=$GLOBALS['conne']->query($sql_select_admin);
        if($ad->num_rows>0){
            return $ad->fetch_assoc();
        }else{
            return null;
        }
    }

    //***********************
    //Funciones para insertar nuevos usuarios
    //***********************
    //insertar usuarios en general
    function insert_user($user_data){
        //$user_data['fecha']
       
        $nueva_fecha="";
        $sql_insert="INSERT INTO `usuario`( `username`, `passw`, `email`, `p_nombre`, `s_nombre`, `ape_pat`, `ape_mat`, ".
        "`fec_nac`, `telefono`, `ciudad`, `colonia`, `estado`, `calle`, `numero`, `num_interior`, `cod_postal`) VALUES ".
        "('".$user_data['username']."','".sha1($user_data['password'])."','".$user_data['email']."',".
        "'".$user_data['nom_1']."','".$user_data['nom_2']."','".$user_data['ape_1']."','".$user_data['ape_2']."',".
        "'".$user_data['fec_nac']."','".$user_data['tel']."','".$user_data['ciudad']."','".$user_data['colonia']."',".
        "'".$user_data['estado']."','".$user_data['calle']."',".intval($user_data['num_ext']).",'".$user_data['num_int']."','".$user_data['codigo']."');";

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
        "(".intval($id_user).",'$gustos','$genero');";
        $GLOBALS['conne']->query($sql_insert);
    }


    //RECUPERAR TODOS LOS CLIENTES
    function select_all_clients(){
        $sql_select_client="SELECT * FROM usuario NATURAL JOIN cliente;";
        $result=$GLOBALS['conne']->query($sql_select_client);
        if($result->num_rows()>0){
            return $result;
        }else{
            return null;
        }
    }

    //busqueda de cliente por username
    function search_client_by_name($username){
        $sql_bus="SELECT * FROM usuario NATURAL JOIN cliente WHERE usuario.username LIKE '%$username%';";
        $result=$GLOBALS['conne']->query($sql_bus);
        if($result->num_rows()>0){
            return $result->fetch_assoc();
        }else{
            return null;
        }
    }

    //busqueda de admin por username
    function search_admin_by_name($username){
        $sql_bus="SELECT * FROM usuario NATURAL JOIN administrador WHERE usuario.username LIKE '%$username%';";
        $result=$GLOBALS['conne']->query($sql_bus);
        if($result->num_rows()>0){
            return $result->fetch_assoc();
        }else{
            return null;
        }
    }

    //recuperar todos los administradores
    function select_all_admins(){
        $sql_select_client="SELECT * FROM usuario NATURAL JOIN administrador;";
        $result=$GLOBALS['conne']->query($sql_select_client);
        if($result->num_rows()>0){
            return $result;
        }else{
            return null;
        }
    }

    //recuperar un admin especifico
    function get_admin($id_admin){
        $sql_sel="SELECT * FROM usuario NATURAL JOIN administrador WHERE usuario.Id_usuario=".intval($id_admin).";";
        $result=$GLOBALS['conne']->query($sql_sel);
        if($result->num_rows()>0){
            return $result->fetch_assoc();
        }else{
            return null;
        }
    }

    //recuperar un cliente especific
    function get_client($id_client){
        $sql_sel="SELECT * FROM usuario NATURAL JOIN cliente WHERE usuario.Id_usuario=".intval($id_client).";";
        $result=$GLOBALS['conne']->query($sql_sel);
        if($result->num_rows()>0){
            return $result->fetch_assoc();
        }else{
            return null;
        }
    }

    //funcion para eliminar cualquier usuario, se supone que la base de datos realiza una eliminacion e actualizacion en cascada
    function delete_user($id_usuario){
        $sql_del="DELETE FROM usuario WHERE usuario.Id_usuario=".$id_usuario.";";
        if($GLOBALS['conne']->query($sql_del)){
            return true;
        }else{
            return false;
        }
    }

    //***********************
    //Funciones para los productos
    //***********************
    //retorna todos los productos de la base de datos
    function select_all_products(){
        $sql_select = "SELECT * FROM `producto` WHERE producto.status=1;";
        $result = $GLOBALS['conne']->query($sql_select);
        if ($result->num_rows > 0) {
            return $result;
        }else{
            return null;
        }
    }
    //Retorna un producto de acuerdo al ID que se recibe como parametro.
    function especific_product($id_product){
        $producto=null;
        $sql_select="SELECT * FROM producto WHERE Id_producto = ".intval($id_product).";";
        $result=$GLOBALS['conne']->query($sql_select);
        if($result->num_rows>0){
            $producto=$result->fetch_assoc();
            return $producto;
        }else{
            return $producto;
        }
    }
    //insertar producto
    function insert_product($p_data, $tallas){
        //Asumimos que los datos del nuevo producto vienen definidos en un vector.
        //se supone que la estructura de las imagenes ya viene definida como JSON.
        //,".doubleval($p_data['precio']).",".intval($p_data['stock']).",
        $sql_insert="INSERT INTO `producto`(`nombre`, `detalles`,`precio`, `marca`, `tipo`, ".
        "`Fecha_lanzamiento`, `categoria`, `imgs`, `status`) VALUES ".
        "('".$p_data['nombre']."','".$p_data['detal']."',".doubleval($p_data['precio']).",'".$p_data['marca']."',".
        "'".$p_data['tipo']."','".$p_data['fecha']."','".$p_data['categoria']."','".$p_data['imgs']."',".intval($p_data['status']).");";

        if($GLOBALS['conne']->query($sql_insert)){
            $res="SELECT MAX(usuario.Id_usuario) as id FROM usuario;";
            $r=$GLOBALS['conne']->query($res);
            $id=$r->fetch_assoc();
            foreach($tallas as $talla){
                insertar_talla( $id['id'], $talla['talla'], $talla['stock']);
            }
            return true;
        }else{
            return false;
        }
    }

    function insertar_talla($id_product,$talla,$stock){
        $sql_insert="INSERT INTO `descripcion_producto` (`Id_producto`,`stock`,`talla`) VALUES (".intval($id_product).", ".intval($stock).", '$talla');";
        if($GLOBALS['conne']->query($sql_insert)){
            return true;
        }else{
            return false;
        }
    }

    //funcion para el prodcuto mas caro
    function producto_mas(){
        $sql_prod="SELECT * FROM producto WHERE producto.precio = MAX(producto.precio);";
        $result=$GLOBALS['conne']->query($sql_prod);
        if ($result->num_rows>0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    function producto_menos(){
        //funcion para el prodcuto mas barato
        $sql_prod="SELECT * FROM producto WHERE producto.precio = MIN(producto.precio);";
        $result=$GLOBALS['conne']->query($sql_prod);
        if ($result->num_rows>0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }    
    //funcion para seleccionar productos de acuerdo a los filtros
    function products_by_price($min, $max){
        $sql_prod="SELECT * FROM producto WHERE producto.precio BETWEEN $min AND $max;";
        $result=$GLOBALS['conne']->query($sql_prod);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }

    //obtener productos por categoria

    function products_by_cat($cat){
        $sql_select="SELECT * FROM producto WHERE producto.categoria LIKE '%$cat%';";
        $result=$GLOBALS['conne']->query($sql_select);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }

    //obtener rebajas
    function get_rebajas(){
        $sql_ofertas="SELECT * FROM ofertas WHERE fec_inicio <= NOW() AND fec_fin >= NOW();";
        $result=$GLOBALS['conne']->query($sql_ofertas);
        if($result->num_rows>0){
            $rebajas=array();
            foreach($result as $reb){
                array_push($rebajas,especific_product($reb['Id_producto']));
            }
            return $rebajas;   
        }else{
            return null;
        }
    }



    //funcion para manejar el stock del producto
    function product_stock($id_prod){
        $sql_prod_stock="SELECT producto.ID_producto, SUM(tallas.stock) as Stock_tot FROM producto NATURAL JOIN tallas WHERE producto.ID_producto=$id_prod;";
        $result=$GLOBALS['conne']->query($sql_prod_stock);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }    
    //***********************
    function new_sale($data_compra){
        $sql_insert="INSERT INTO `compra`(`Id_cliente`, `total`) VALUES (".intval($data_compra['cliente']).",".doubleval($data_compra['total']).");";
        if ($GLOBALS['conne']->query($sql_insert)) {
            return true;
        }else{
            return false;
        }
    }

    //eliminar un producto.
    function delete_product($id_prod){
        $sql_del="DELETE FROM producto WHERE producto.ID_producto=".$id_prod.";";
        if($GLOBALS['conne']->query($sql_del)){
            return true;
        }else{
            return false;
        }
    }

    //faltan
    function modify_cliente($a_data){
        $sql_update="UPDATE usuario u INNER JOIN cliente c ON u.Id_usuario=c.Id_usuario SET username=".
        "'".$a_data['username']."', email='".$a_data['email']."',".
        "p_nombre='".$a_data['nom_1']."',s_nombre='".$a_data['nom_2']."',ape_pat='".$a_data['ape_1']."',ape_mat='".$a_data['ape_2']."',".
        "fec_nac='".$a_data['fec_nac']."',telefono='".$a_data['tel']."',ciudad='".$a_data['ciudad']."',colonia='".$a_data['colonia']."',".
        "estado='".$a_data['estado']."',calle='".$a_data['calle']."',numero=".intval($a_data['num_ext']).",num_interior='".$a_data['num_int']."',cod_postal'".$a_data['codigo']."', ".
        "gustos='".$a_data['gustos']."', genero='".$a_data['genero']."' WHERE Id_usuario=".intval($a_data['id'])." ;";
        if($GLOBALS['conne']->query($sql_update)){
            return true;
        }else{
            return false;
        }

    }

    function modify_admin($a_data){
        $sql_update="UPDATE usuario u INNER JOIN administrador a ON u.Id_usuario=a.Id_usuario SET username=".
        "'".$a_data['username']."', email='".$a_data['email']."',".
        "p_nombre='".$a_data['nom_1']."',s_nombre='".$a_data['nom_2']."',ape_pat='".$a_data['ape_1']."',ape_mat='".$a_data['ape_2']."',".
        "fec_nac='".$a_data['fec_nac']."',telefono='".$a_data['tel']."',ciudad='".$a_data['ciudad']."',colonia='".$a_data['colonia']."',".
        "estado='".$a_data['estado']."',calle='".$a_data['calle']."',numero=".intval($a_data['num_ext']).",num_interior='".$a_data['num_int']."',cod_postal'".$a_data['codigo']."', ".
        " WHERE Id_usuario=".intval($a_data['id'])." ;";
        if($GLOBALS['conne']->query($sql_update)){
            return true;
        }else{
            return false;
        }

    }


    //***********************
    //Funciones para los comentarios
    //***********************
    //insertar nuevo comentario
    function new_coment($coment_data){
        /*
            Estructura del array $coment_data:
                cliente: Id_cliente
                producto: Id_prodcuto
                comentario: comentario
        */
        $sql_insert="INSERT INTO `comentarios`(`Id_cliente`,`Id_producto`,`comentario`) VALUES ".
        "(".intval($coment_data['cliente']).",".intval($coment_data['producto']).",'".$coment_data['comentario']."' ) ;";
        if($GLOBALS['conne']->query($sql_insert)){
            return true;
        }else{
            return false;
        }

    }
    //seleccionar todos los comantarios, por producto
    function select_coments_by_product($id_producto){
        $sql_select="SELECT * FROM comentarios WHERE  Id_producto=".intval($id_producto)." ;";
        $result=$GLOBALS['conne']->query($sql_select);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }
    //Seleccionar comentarios por cliente
    function select_coments_by_client($id_cliente){
        $sql_select="SELECT * FROM comentarios WHERE  comentarios.Id_cliente = ".intval($id_cliente)." ;";
        $result=$GLOBALS['conne']->query($sql_select);
        if($result->num_rows>0){
            return $result;
        }else{
            return null;
        }
    }
    //eliminar un comentario

    //***********************
    //Funciones para los ofertas
    //***********************

     //***********************
    //Funciones para los productos
    //***********************
?>