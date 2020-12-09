<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Liverpuri Official</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="resp.css?v=<?php echo time(); ?>">
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
            </ul>
            <a href="#contact"><img id="shop-car" src="img/shopping_car.png" alt="shop-car"></a>
        </nav>
	</header>	
	<main>
		<div class="home-grid">
            <div class="slide">
                <div class="slogan">
                    <h1>LIVERPURI es parte de mi vida!</h1>
                    <button>Shop Now</button>
                </div>
            </div>

            <div class="container">
                <div class="info">
                    <h1>Nuevos Lanzamientos</h1>
                    <p>
                        No te pierdas los nuevos lanzamientos <br>
                        de temporada.
                    </p>
                    <button>Nuevos Lanzamientos</button>
                </div>
                <div class="img-cont">
                    <img src="img/new.jpg" alt="new">
                </div>    
            </div>

            <div class="container2">
                <div class="title-box">
                    <h1>Ropa para toda la familia</h1>
                </div>
                <div class="container-box">
                    <div class="card">
                        <a href=""><img src="img/men.jpg" alt="Hombres"></a> 
                        <p>Hombre</p>
                    </div>
                    <div class="card">
                        <a href=""><img src="img/women.jpg" alt="Mujeres"></a> 
                        <p>Mujer</p>
                    </div>
                    <div class="card">
                        <a href=""><img src="img/kids.jpg" alt="Kids"></a> 
                        <p>Niño/a</p>
                    </div>
                </div>
            </div>

            <div class="container3">
                <div class="info2">
                    <h1>Rebajas %</h1><br>
                    <p>
                        No te pierdas las rebajas <br>
                        de hasta 50% de descuento.
                    </p>
                    <button>Ver mas</button>
                </div>    
            </div>
		</div>	
	</main>
	<footer>
		<p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	
	</footer>
</body>
</html>