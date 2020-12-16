<?php
    include '../Carrito/carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View</title>
    <link rel="stylesheet" type="text/css" href="../style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../resp.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="../JS/catalog.js"></script>
</head>
<body>
	<header>
        <nav>
            <h1 class="logo">LiverPuri</h1>
            <input type="checkbox" id="hamburguer-toggle">
            <label for="hamburguer-toggle" class="hamburguer">
                <span class="bar"></span>
            </label>
            <ul class="nav-list">
                <li><a href="#about-us">Nuevos Lanzamientos</a></li>
                <li><a href="#media">Hombre</a></li>
                <li><a href="#shop">Mujer</a></li>
                <li><a href="#contact">Niño/a</a></li>
                <li><a href="#contact">Rebajas</a></li>
                <?php
                    if (!isset($_SESSION['admin_on']) && !isset($_SESSION['client_on'])) {        
                ?>
                <li><a href="login.php">Sign in</a></li>
                <?php
                    }
                ?>
                <?php
                    if (isset($_SESSION['admin_on']) || isset($_SESSION['client_on'])) {      
                ?>
                <li><a href="logout.php">Sing out</a></li>
                <?php
                    }
                ?>
            </ul>
            <a href="#contact"><img id="shop-car" src="../img/shopping_car.png" alt="shop-car"></a>
        </nav>
	</header>	
	<main>
        <?php
            if(isset($_GET['id_del_prod'])){
                $prod=especific_product($_GET['id_del_prod']);//recuperar datos del producto
                $tallas=json_decode($prod['tallas']);//recuperar las tallas
                $img=json_decode($prod['imgs']);     
        ?>
        <div class="home-grid">
            <div class="product-view">
                    <div class="product-img">
                        <img src="<?php echo $img->I1 ?>" alt="">
                    </div>
            </div>
            <div class="product-info">
                <form action="" method="post">
                    <h2><?php echo $prod['nombre']; ?></h2>
                    <p>
                        Descripcion: <?php echo $prod['detalles']; ?> <br>
                    </p>
                    <br>
                    <h3>$MXN <?php echo $prod['precio']; ?>0</h3>
                    <div>
                        <!-- Falta validar las tallas existentes, para enviarla al carrito -->
                        <div class="tallas">
                            <h3>Talla</h3>
                            <?php
                                foreach($tallas as $key=>$to){
                                    if($to>0){
                            ?>  
                                    
                                    <input type="radio" value="<?php echo $key ?>" id="<?php echo $key ?>" name="size"> <?php echo $key ?>
                            <?php
                                    }
                                }
                            ?>
                            <!--
                            <input type="radio" value="XS" id="xs" name="size"> XS 
                            <input type="radio" value="S" id="s" name="size"> S 
                            <input type="radio" value="M" id="m" name="size"> M 
                            <input type="radio" value="L" id="l" name="size"> L 
                            <input type="radio" value="XL" id="xl" name="size"> XL -->
                        </div>
                        <div class="cantidad">
                            <button class="buy" type="button" name="menos" onclick="menosCant()">-</button>
                            <label id="cant" name="cantidad">1</label>
                            <button class="buy" type="button" name="mas" onclick="masCant()">+</button> <br>
                            <span id="msgCant"></span>
                        </div>
                        <br>
                        <?php if(isset($_SESSION['admin_on']) || isset($_SESSION['client_on'])){?>
                            <input type="hidden" name="ID" id="ID" value="<?php echo $prod['ID_producto']?>">
                            <input type="hidden" name="CANT" id="CANT" value=""><!--Me falta sacar este valor, del label de arriba no se como xdxd-->
                            <button class="buy" type="submit" name="btnAction" value="Agregar">Add</button>
                        <?php }?>
                    </div>
                </form>
            </div>
            <div class="product-comments">
                <h2 id="title-comment">Comentarios</h2>
                <!--Por aqui ponle el formulario para los comentarios--->
                <?php
                    $coments=select_coments_by_product($_GET['id_del_prod']);

                    foreach ($coments as $com) {
                        $user=select_user($com['Id_cliente']);
                ?>
                        <div class="comentario">
                            <div class="info-comment">
                                <p>Por: <?php echo $user['username']?> </p>
                                <p><?php echo $com['fecha']?></p>
                            </div>
                            <br>
                            <div class="desc-comment">
                                <p><?php echo $com['comentario']?></p>
                            </div>
                            <hr>    
                        </div>
                <?php
                    }
                ?>
            </div>
            <?php }else{

                }
            ?>

        </div>
	</main>
	<footer>
		<p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	
	</footer>
</body>
</html>