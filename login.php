<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="log.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="resp.css?v=<?php echo time(); ?>">
</head>
<body>
	<main>
		<div class="home-grid">
			<div class="main-img">
            </div>
            <div class="login">
                <h3>LIVERPURI.</h3>
                <div class="form-login">
                    <form method="POST" action="">
                        <h1> Iniciar Sesión </h1>
                        <div class="input-group">
                            <label> Usuario </label>
                            <input type="text"id="user" name="txtusr" autocomplete="off">
                        </div>
                        <div class="input-group">
                            <label> Contraseña </label>
                            <input type="password" name="txtpasswd" autocomplete="off">
                        </div>  
                        <button type="submit" name="iniciar" class="sign-in"> Login </button>
                        <a href="regist.html">Registrarse</a>
                    </form>
                </div>
                <div class="copy">
                    <p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	    
                </div>
            </div>
		</div>	
	</main>
</body>
</html>