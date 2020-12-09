<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="log.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="resp.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <nav>
            <h1 class="logo">LiverPuri</h1>
        </nav>
    </header>
	<main>
		<div class="home-grid">
            <div class="regist">
                <div class="form-regist">
                    <form method="POST" action="">
                        <h1> Registro </h1>
                        <div class="input-group">
                            <label> Usuario </label>
                            <input type="text"id="user" name="txtusr" autocomplete="off">
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Contraseña </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Confirmar Contraseña </label>
                                <input type="password" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Primer Nombre </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Segundo Nombre </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Apellido Paterno </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Apellido Materno </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input-group">
                            <label> Fecha de Nacimiento </label>
                            <input type="date">
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Email </label>
                                <input type="email" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Telefono </label>
                                <input type="tel" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Email </label>
                                <input type="email" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Telefono </label>
                                <input type="tel" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label>Estado</label>
                                <select name="estado">
                                    <option value="no">Seleccione uno...</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja California">Baja California</option>
                                    <option value="Baja California Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="CDMX">Ciudad de México</option>
                                    <option value="Coahuila">Coahuila</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Estado de México">Estado de México</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Michoacán">Michoacán</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo León">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="Quintana Roo">Quintana Roo</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yucatán">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label> Ciudad </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>   
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Colonia </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Calle </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>    
                        </div>
                        <div class="input2">
                            <div class="input-group">
                                <label> Num Ext. </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <label> Num Int. </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div> 
                            <div class="input-group">
                                <label> Codigo Postal </label>
                                <input type="text" name="txtpasswd" autocomplete="off">
                            </div>      
                        </div>
                        <button type="submit" name="iniciar" class="sign-in" id="new-user"> Registrar </button>
                    </form>
                </div>
            </div>
		</div>	
    </main>
    <footer>
        <p>&copy; 2020 | Drackode | Aguascalientes, Mexico</p>      	    
    </footer>
</body>
</html>