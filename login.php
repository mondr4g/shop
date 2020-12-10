<?php
    session_start();
    include 'DB_FUNCTIONS/DB_Functions.php';
    //validar si aun no se ha realizado el login
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
    <?php
        if (!$_POST) {
    ?>
	<main>
		<div class="home-grid">
			<div class="main-img">
            </div>
            <div class="login">
                <h3>LIVERPURI.</h3>
                <div class="form-login">
                    <form method="POST" action="login.php">
                        <h1> Iniciar Sesión </h1>
                        <div class="input-group">
                            <label> Usuario </label>
                            <input type="text" id="user" name="user" autocomplete="off">
                        </div>
                        <div class="input-group">
                            <label> Contraseña </label>
                            <input type="password" id="passw" name="passw" autocomplete="off">
                        </div>  
                        <button type="submit" name="iniciar" class="sign-in"> Login </button>
                        <a href="regist.php">Registrarse</a>
                    </form>
                </div>
                <div class="copy">
                    <p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	    
                </div>
            </div>
		</div>	
	</main>
    <?php
        }elseif($_POST && (!isset($_SESSION['admin_on']) && !isset($_SESSION['client_on']) )){
            echo $_POST['txtusr'],$_POST['txtpasswd'];
            $usuario=validate_user($_POST['user'],$_POST['passw']);
            if($usuario){
                //aqui se decide que tipo de usuario es 
                if(select_admin($usuario['Id_usuario'])){
                    $_SESSION['admin_on']=$usuario['Id_usuario'];
                    header("location:Adminis.php");
                }else{
                    $_SESSION['client_on']=$usuario['Id_usuario'];
                    header("location:Index.php");
                }
                //puta madreeee
            }else{
                $_SESSION['admin_on']=null;
                $_SESSION['client_on']=null;
                header('location:regist.php');
            }


        }
?>
</body>
</html>
