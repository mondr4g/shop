<?php
    include 'carrito.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item View</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="resp.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="JS/catalog.js"></script>
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
            <a href="#contact"><img id="shop-car" src="img/shopping_car.png" alt="shop-car"></a>
        </nav>
	</header>	
	<main>
        <div class="home-grid">
            <div class="product-view">
                    <div class="product-img">
                        <img src="https://img.ltwebstatic.com/images3_pi/2020/11/19/1605749486189a3a3487d31976f039fd8f9ce17dcc.webp" alt="">
                    </div>
            </div>
            <div class="product-info">
                    <h2>PRODUCT NAME</h2>
                    <p>
                        Descripcion: este producto es una blusa bonita <br>
                        que es azul y es para dama <br>
                    </p>
                    <br>
                    <h3>$MXN 2450.00</h3>
                    <div>
                        <div class="tallas">
                            <h3>Talla</h3>
                            <input type="radio" value="XS" id="xs" name="size"> XS 
                            <input type="radio" value="S" id="s" name="size"> S 
                            <input type="radio" value="M" id="m" name="size"> M 
                            <input type="radio" value="L" id="l" name="size"> L 
                            <input type="radio" value="XL" id="xl" name="size"> XL 
                        </div>
                        <div class="cantidad">
                            <button class="buy" type="button" name="menos" onclick="menosCant()">-</button>
                            <label id="cant" name="cantidad">1</label>
                            <button class="buy" type="button" name="mas" onclick="masCant()">+</button> <br>
                            <span id="msgCant"></span>
                        </div>
                        <br>
                        <button class="buy" name="btnAction" value="Agregar">Add</button>
                    </div>
            </div>
            <div class="product-comments">
                <h2 id="title-comment">Comentarios</h2>
                <div class="comentario">
                    <div class="info-comment">
                        <p>Por: Jose Mena</p>
                        <p>14 DEC 2020</p>
                    </div>
                    <br>
                    <div class="desc-comment">
                        <p>Este es un comentario</p>
                    </div>
                    <hr>    
                </div>
            </div>
        </div>
	</main>
	<footer>
		<p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	
	</footer>
</body>
</html>