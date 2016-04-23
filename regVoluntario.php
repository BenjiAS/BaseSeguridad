<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Registro Voluntario</title>
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
			<h1>Registro de Voluntario</h1>
		</div>

		<div class='sideMenu container col-xs-3'>
			<h3>Menú Administrativo</h3>
			<a href=""><p>Administración de Voluntarios</p></a>
			<a href=""><p>Administración de Instituciones</p></a>
			<a href=""><p>Administración de Patrocinadores</p></a>
			<a href=""><p>Administración de Usuarios</p></a>
		</div>


		<div class='mainContent'>
			<div class='registroForm container col-xs-6'>
				<form action="php/registroVoluntarios.php"  role="form">
					<div class="container col-xs-12">
						<label>Nombre(s): </label>
						<br>
						<input id="nombresVoluntario" name="nombresVoluntario" class="form-control" type="text" placeholder="i.e. Juan Ricardo">
						<br><br>
					</div>

					<div class="container col-xs-12">
						<label id="apellidoPatVoluntario">Apellido Paterno: </label>
						<br>
						<input id="apellidoPatVoluntario" name="apellidoPatVoluntario" class="form-control" type="text" placeholder="i.e. Hernández">
						<br><br>
					</div>

					<div class="container col-xs-12">
						<label id="apellidoMatVoluntario">Apellido Materno: </label>
						<br>
						<input id="apellidoMatVoluntario" name="apellidoMatVoluntario" class="form-control" type="text" placeholder="i.e. López">
						<br><br>
					</div>

					<div class="container col-xs-6">
						<label id="matriculaVoluntario">Matrícula: </label>
						<br>
						<input id="matriculaVoluntario" name="matriculaVoluntario" class="form-control" type="text" placeholder="i.e. A01233188">
						<br><br>
					</div>

					<div class="container col-xs-6">
						<label id="emailVoluntario">E-mail: </label>
						<br>
						<input id="emailVoluntario" name="emailVoluntario" class="form-control" type="email" placeholder="i.e. juanhernandez@hotmail.com">
						<br><br>
					</div>

					<!------------------------------------------------------------------------------>
				
					<div class="container col-xs-12">
						<label id="fechaNac">Fecha de Nacimiento: </label>
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
						
						<br><br><br>
					</div>	



<!------------------------------------------------------------------------------>


					<div class="container col-xs-6">
						
						<label id="celularVoluntario">Celular: </label>
						<br>
						<input id="celularVoluntario" name="celularVoluntario" class="form-control" type="text" placeholder="i.e. 8713567890">
						<br><br>
					</div>

					<div class="container col-xs-6">
						<label id="telefonoVoluntario">Teléfono: </label>
						<br>
						<input id="telefonoVoluntario" name="telefonoVoluntario" class="form-control" type="text" placeholder="i.e. 7567890">
						<br><br>
					</div>

					<div class="container col-xs-6">
						<label id="carreraVoluntario">Carrera/Prepa: </label>
						<br>
						<input id="carreraVoluntario" name="carreraVoluntario" class="form-control" type="text" placeholder="i.e. ITIC">
						<br><br>
					</div>
					<div class="container col-xs-6">
						<label id="semestreVoluntario">Semestre: </label>
						<br>
						<input id="semestreVoluntario" name="semestreVoluntario" class="form-control" type="text" placeholder="i.e. 6">
						<br><br>
					</div>
					<div id="buttonDiv"><button class="btn btn-primary" type="submit">Registrar Voluntario</button></div>
				</form>
			</div>
		</div>

	</div>


</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>