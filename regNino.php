<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Regisro Niño</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel='stylesheet' href='css/style.css'>
</head>

<body>
	<header>
		<nav>
			<a href="index.php"><img class="logo" src="img/scc2.png"></a>
            <ul class='mainMenu'>
                 <?php
                require_once 'conexion.php';


                $query = 'SELECT * FROM opcionesNavegacion WHERE display = "1"';
                $resQuery = $db->query($query);
                //echo $resQuery->num_rows;


                for ($i=0; $i < $resQuery->num_rows; $i++) { 
                    $opcion = $resQuery->fetch_assoc();
                    echo '<li><a href="'.$opcion['href'].'">'.$opcion['nombre'].'</a></li>';
                }

                $db->close();

            ?>
            
                <!--li><a href="eventos.html">Eventos</a></li>
                <li><a href="acerca.html">¿Quiénes somos?</a></li>
                <li><a href="patrocinadores.html">Patrocinadores</a></li>
                <li><a href="donaciones.html">Donaciones</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href="sesion.php">Iniciar Sesión</a></li-->
            </ul>
		</nav>
	</header>

	<div class='mainDiv'>

		<div id="pageTitle">
			<h1>Registro de Niño</h1>
		</div>

		<div class='sideMenu container col-xs-3'>
			<h3>Menú Administrativo</h3>
			<a href="regVoluntario.php"><p>Administración de Voluntarios</p></a>
			<a href="regInstitucion.php"><p>Administración de Instituciones</p></a>
			<a href="regPatrocinador.php"><p>Administración de Patrocinadores</p></a>
			<a href="regUsuario.php"><p>Administración de Usuarios</p></a>
			<a href="regNino.php"><p>Administración de Niños</p></a>
		</div>


		<div class='mainContent'>
			<div class='registroForm container col-xs-6'>
				<form action="php/registroNino.php"  role="form">
					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $nombreVoluntarioErr;?></h3> -->
						<label for="nombreNino">Nombre(s): </label>
						<br>
						<input id="nombresNino" name="nombreNino" <?php if (isset($_POST['nombreNino'])) echo 'value="'.$_POST['nombreNino'].'"';?> class="form-control" type="text" placeholder="i.e. Juan Ricardo"
						value= "<?php echo htmlspecialchars($nombreNino);?>">
						<span class="error"><?php echo $nombreNinoErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoPaternoErr;?></h3> -->
						<label for="apellidoPaterno">Apellido Paterno: </label>
						<br>
						<input id="apellidoPatNino" name="apellidoPaterno" <?php if (isset($_POST['apellidoPaterno'])) echo 'value="'.$_POST['apellidoPaterno'].'"';?>  class="form-control" type="text" placeholder="i.e. Hernández"
						value= "<?php echo htmlspecialchars($apellidoPaterno);?>">
						<span class="error"><?php echo $apellidoPaternoErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoMaternoErr;?></h3> -->
						<label for="apellidoMaterno">Apellido Materno: </label>
						<br>
						<input id="apellidoMatNino" name="apellidoMaterno" <?php if (isset($_POST['apellidoMaterno'])) echo 'value="'.$_POST['apellidoMaterno'].'"';?>  class="form-control" type="text" placeholder="i.e. López"
						value= "<?php echo htmlspecialchars($apellidoMaterno);?>">
						<span class="error"><?php echo $apellidoMaternoErr;?></span>
						<br><br>
					</div>

			<!------------------------------------------------------------------------------>
				
					<div class="container col-xs-12">
					<!-- 	<h3 class="error"> <?php echo $fechaDeNacErr;?></h3> -->
						<label for="fechaNac">Fecha de Nacimiento: </label>
						<br>

						<div class="container col-xs-4">
							<select>
								<option value="-" selected>Día</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value=""></option>
							</select>
						</div>

						<div class="container col-xs-4">
							<select>
								<option value="-" selected>Mes</option>
								<option value="Ene">Enero</option>
								<option value="Feb">Febrero</option>
								<option value="Mar">Marzo</option>
								<option value="Abr">Abril</option>
							</select>
						</div>

						<div class="container col-xs-4">
							<select>
								<option value="-" selected>Año</option>
								<option value="1995">1995</option>
								<option value="1996">1996</option>
								<option value="1997">1997</option>
								<option value="1998">1998</option>
							</select>
						</div>
						
						<br>
						<span class="error"><?php echo $fechaDeNacErr;?></span>
					</div>	



<!------------------------------------------------------------------------------>


					<div class="container col-xs-12">
					<!-- 	<h3 class="error"> <?php echo $fechaDeNacErr;?></h3> -->
						<label for="discapacidad">Discapacidad: </label>
						<br>

						<div class="container col-xs-4">
							<select>
								<option value="-" selected>--Seleccione una--</option>
								<option value="1">Down</option>
								<option value="2">Ceguera</option>
								<option value="3">Silente</option>
								<option value="4">Autismo</option>
							</select>
						</div>
						<br>
						<span class="error"><?php echo $fechaDeNacErr;?></span>
					</div>	

					<div class="container col-xs-12">
					<!-- 	<h3 class="error"> <?php echo $fechaDeNacErr;?></h3> -->
						<label for="genero">Género: </label>
						<br>

						<div class="container col-xs-4">
							<select>
								<option value="-" selected>--Seleccione uno--</option>
								<option value="f">Femenino</option>
								<option value="m">Masculino</option>
							</select>
						</div>
						<br>
						<span class="error"><?php echo $fechaDeNacErr;?></span>
					</div>	

					<div id="buttonDiv"><button class="btn btn-primary" type="submit">Registrar Niño</button></div>
				</form>
			</div>
		</div>

	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>