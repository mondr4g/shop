<?php
   include 'crud_admin.php';

    if(isset($_SESSION['admin_on'])){
        //ENSEGUIDA METERLE ESTILOS PARA QUE SE VEA BONITO.
?>

<?php
    }
?>

<!DOCTYPE html> 
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liverpuri Official</title>
    <link rel="stylesheet" type="text/css" href="../style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../resp.css?v=<?php echo time(); ?>">
    <script type="text/javascript">
        window.onload = function() {
            checkView();
        }

        function checkView() {
            var result = document.getElementsByClassName("switch-input")[0].checked ? 'yes' : 'no';
            console.log(result);
            if(result == 'yes') {
                document.getElementById('uID').style.display = "flex";
                document.getElementById('pID').style.display = "none";
            }
            else {
                document.getElementById('uID').style.display = "none";
                document.getElementById('pID').style.display = "flex";                
            }
        }
    </script>
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
        <div class="home-grid">
            <div class="info-admin">
                    <div class="img-admin">
                        <img src="../img/user.png" alt="">
                    </div>
                    <div class="data-admin">
                        <h3>Usuario</h3>
                        <br><br>
                        <p>Nombre</p>
                        <p>correo</p>
                        <p>tel</p>
                    </div>
                    <div class="toggle-switch">
                        <label class="switch">
                            <input class="switch-input" type="checkbox" onclick="checkView()"/>
                            <span class="switch-label" data-on="Users" data-off="Products"></span> 
                            <span class="switch-handle"></span> 
                        </label>
                    </div>
            </div>
            <div class="products" id="pID">
                <?php
                    //$productos=select_all_products();
                    //foreach ($productos as $prod) {
                        # code...
                      //  $imgs=json_decode($prod['imgs']);
                ?> 
                    <div class="item-box">
                        <form action="">
                            <div class="img-item">
                                <img class="imgi" src="https://img.ltwebstatic.com/images3_pi/2020/11/09/16048900530a1b8c44456c07d817aad5a8e09217d5.webp<?php //echo $prod['imgs']->principal?>" alt="item1"> 
                            </div><!--El boton de añadir cada producto al carrito, metelo dentro de un formulario-->
                            <div class="description">
                                <h4 name="nombre">Producto<?php //echo $prod['nombre']?></h4>
                                <p name="precio">$MXN568<??></p>
                                <div class="info-item">
                                    <p name="ID"></p>
                                    <p name="CANT"></p>
                                </div>
                                <div>
                                    <button class="update" name="btnAction" value="Editar">Editar</button>
                                    <button class="update" name="btnAction" value="Borrar">Borrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php
                    //}
                ?>
            </div>
            <div class="usuarios" id="uID">
                <?php
                    //$productos=select_all_products();
                    //foreach ($productos as $prod) {
                        # code...
                      //  $imgs=json_decode($prod['imgs']);
                ?> 
                    <div class="item-box">
                        <form action="">
                            <div class="img-item">
                                <img class="imgi" src="https://img.ltwebstatic.com/images3_pi/2020/05/14/1589453206be52f96c784942fc706faa761d263462.webp<?php //echo $prod['imgs']->principal?>" alt="item1">
                            </div><!--El boton de añadir cada producto al carrito, metelo dentro de un formulario-->
                            <div class="description">
                                <h4 name="nombre">USUARIO<?php //echo $prod['nombre']?></h4>
                                <p name="ID">ID<??></p>
                                <div>
                                    <button class="update" name="btnAction" value="Editar">Editar</button>
                                    <button class="update" name="btnAction" value="Borrarr">Borrar</button>
                                </div>
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