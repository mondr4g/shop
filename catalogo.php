<?php
    
    include 'carrito.php';

    //Aqui agregaremos lo del catalogo de los productos
?>
<!DOCTYPE html> 
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liverpuri Official</title>
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
            <div class="filter" onchange="getFilter()">
                    <div class="input-group">
                        <h3>Articulo</h3>
                        <input type="checkbox" value="Playera" id="playera" name="playera"> Playeras <br>
                        <input type="checkbox" value="Pantalon" id="pantalon" name="pantalon"> Pantalones <br>
                        <input type="checkbox" value="Chamarra" id="chamarra" name="chamarra"> Chamarras <br>
                        <input type="checkbox" value="Sudadera" id="sudadera" name="sudadera"> Sudaderas <br>
                        <input type="checkbox" value="Abrigo" id="abrigo" name="abrigo"> Abrigos <br>
                    </div>
                    <br>
                    <div class="input-group">
                        <h3>Talla</h3>
                        <input type="checkbox" value="XS" id="xs" name="xs"> XS <br>
                        <input type="checkbox" value="S" id="s" name="s"> S <br>
                        <input type="checkbox" value="M" id="m" name="m"> M <br>
                        <input type="checkbox" value="L" id="l" name="l"> L <br>
                        <input type="checkbox" value="XL" id="xl" name="xl"> XL <br>
                    </div>
                    <br>
                    <div class="input-group">
                        <h3>Precio Minimo</h3>
                        $500 <input type="range" id="iprice" name="initial_price" min="500" max="3000" list="tickmarks" value="500" step="500" onchange="imaxPrice()"> <label id="imaxPrice">$3000</label><br><br>
                        <h3>Precio Maximo</h3>
                        $500 <input type="range" id="fprice" name="final_price" min="500" max="3000" list="tickmarks" value="3000" step="500" onchange="fmaxPrice()"> <label id="fmaxPrice">$3000</label><br>
                        <datalist id="tickmarks">
                            <option value="500">
                            <option value="1000">
                            <option value="1500">
                            <option value="2000">
                            <option value="2500">
                            <option value="3000">
                        </datalist>
                    </div>
            </div>
            <div class="products">
                <?php
                    //$productos=select_all_products();
                    //foreach ($productos as $prod) {
                        # code...
                      //  $imgs=json_decode($prod['imgs']);
                ?> 
                    <div class="item-box">
                        <form action="">
                            <div class="img-item">
                                <a href=""><img class="imgi" src="https://img.ltwebstatic.com/images3_pi/2020/11/09/16048900530a1b8c44456c07d817aad5a8e09217d5.webp<?php //echo $prod['imgs']->principal?>" alt="item1"></a> 
                            </div><!--El boton de añadir cada producto al carrito, metelo dentro de un formulario-->
                            <div class="description">
                                <h4 name="nombre">Producto<?php //echo $prod['nombre']?></h4>
                                <p name="precio">$MXN568<??></p>
                                <div class="info-item">
                                    <p name="ID"></p>
                                    <p name="CANT"></p>
                                </div>
                                <button class="buy" name="btnAction" value="Agregar">Add</button>
                            </div>
                        </form>
                    </div>
                <?php
                    //}
                ?>
            </div>
        </div>
	</main>
	<footer>
		<p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	
	</footer>
</body>
</html>