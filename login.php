<?php
    session_start();
    include 'DB_FUNCTIONS/DB_Functions.php';
    //validar si aun no se ha realizado el login
    if ($_POST) {
   
?>
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
<?php
     }elseif($_POST && (!isset($_SESSION['admin_on']) && !isset($_SESSION['client_on'])  )){
        $usuario=validate_user($_POST['user'],$_POST['pass']);

        if($usuario){
            //aqui se decide que tipo de usuario es 
            if($usuario['usr_type']==1){
                $_SESSION['admin_on']=$usuario['id_usuario'];
            
            }
            //puta madreeee
        }else{
            $_SESSION['admin_on']=null;
            $_SESSION['client_on']=null;
            header('location:login.php');
        }


    }
?>