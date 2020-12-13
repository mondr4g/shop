<?php
    session_start();
    include 'DB_FUNCTIONS/DB_Functions.php';
    //Aqui estoy incluyendo el codigo que realiza el manejo del carrito.
    include 'carrito.php';
?>

<!-- Aqui pones html-->

    <?php
        //aqui es para validar si hay algo en el carrito, los ID's de los productos vienen aqui.
        if(!empty($_SESSION['CARRITO'])){
    ?>

            <?php
                //variable para el total
                $total=0;
                //aqui recorremos el carrito.
                foreach ($_SESSION['CARRITO'] as $indice=>$prod) {
                    //en esta variable esta toda la info de cada producto en el carrito, ya que la obtuve mediente un query a la base de datos
                    //Esta la podemos eliminar, pero la puse, por ejemplo por si quieres mostrar como un detalle de compra y aqui estan todos los datos del registro.
                    $producto=especific_product($prod['ID']);

            ?>
            <!-- Aqui puedes meter para mostrar los productos, para ponerle acciones a cada producto osea como botones de eliminar, o modificar la cantidad
                a todos llamaslos btnAccion, y en el value le pones otro diferente, por ejemplo "cant_menos"..etc o que se yo xd 
                de cajon es un formulario POST que envie a esta misma pagina. Con que envies el puro ID ya sea para eliminar o modificar cantidad o eliminar el producto del carrito-->

            <?php
                    //Aqui se hace la suma o cuenta del total
                    $total+=$prod['CANTIDAD']*$prod['PRECIO'];
                }
            ?>
    <?php
        }else{
    ?>
    <!-- Aqui para mostrar algun mensaje o lo que sea, para cuando no hayan elementos agregados al carrito -->
    <?php
        }
    ?>