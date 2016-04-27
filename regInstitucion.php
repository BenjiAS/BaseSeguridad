<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Regisro Institución</title>
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
			<h1>Registro de Institución</h1>
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
				<form action="php/registroInstitucion.php"  role="form">
					<div class="container col-xs-12">
						<label>Nombre: </label>
						<br>
						<input id="nombre" name="nombreInstitucion" class="form-control" type="text" placeholder="i.e. Ver Contigo">
						<br><br>
					</div>

					<div class="container col-xs-12">
						<!-- <h3 class="error"> <?php echo $tallaErr;?></h3> -->
						<label for="semestre">Dirección:</label>
						<br>
						<textarea id="direccion" name="direccion" <?php if (isset($_POST['direccion'])) echo 'value="'.$_POST['direccion'].'"';?>  class="form-control" type="text" placeholder="..."
						value= "<?php echo htmlspecialchars($direccion);?>" >
						</textarea>
						<!-- <span class="error"><?php echo $textErr;?></span> -->
						<br><br>
					</div>

					<div class="container col-xs-12">
						<label>Contacto: </label>
						<br>
						<input id="contacto" name="contactoInstitucion" class="form-control" type="text" placeholder="i.e. Dora Gómez">
						<br><br>
					</div>

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $telefonoErr;?></h3> -->
						<label for="telefono">Teléfono: </label>
						<br>
						<input id="telefonoInstitucion" name="telefonoInstitucion" 
							<?php 
								if (isset($_POST['telefonoInstitucion'])) 
									echo 'value="'.$_POST['telefonoInstitucion'].'"';
							?> 
							class="form-control" type="text" placeholder="i.e. 7567890" 
							value= "<?php echo htmlspecialchars($telefonoInstitucion);?>">
						<span class="error"><?php echo $telefonoErr;?></span>
						<br><br>
					</div>

					<div id="buttonDiv"><button class="btn btn-primary" type="submit">Registrar Institución</button></div>
				</form>
			</div>
		</div>

	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>