<?php
    include 'global/config.php';

    //ESTA ES LA CONEXION QUE SE UTILIZARA EN LOS QUERYS
    $conn=mysqli_connect(SERVER,USUARIO,PASSWORD,BD);

    if(!$conn){
        die("Error: conexion incorrecta".mysqli_connect_error());
    }

    $cdb=mysqli_select_db($conn,BD);

    if(!$cdb){
        die("ERROR EN LA BD");
    }
?> 