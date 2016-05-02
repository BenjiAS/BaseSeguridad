<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Registro Usuario</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel='stylesheet' href='css/style.css'>
</head>


<?php 
	session_start();
	require_once'conexion.php';
	$nombreUsuarioErr = "";
	$matriculaUsuarioErr = "";
	$contrasenaErr = "";
	$confcontrasenaErr = "";
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$matriculaUsuario = trim(filter_input(INPUT_POST,"matriculaUsuario",FILTER_SANITIZE_STRING));
	// echo $nombrepatrocinador;
	$contrasena = trim(filter_input(INPUT_POST,"contrasena",FILTER_SANITIZE_STRING));
	$confcontrasena = trim(filter_input(INPUT_POST,"confcontrasena",FILTER_SANITIZE_STRING));
	}
	
	$matricula= $contrasena = $confcontrasena = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["matriculaUsuario"])) {
    $matriculaUsuarioErr = "Ingresa una matricula";
    $valid = false;
  } else {
    $matriculaUsuario= test_input($_POST["matriculaUsuario"]);
  }

  if (empty($_POST["contrasena"])) {
    $contrasenaErr = "Ingresa una contraseña";
    $valid = false;
  } else {
    $contrasena = test_input($_POST["contrasena"]);
  }

    if (empty($_POST["confcontrasena"])) {
    $confcontrasenaErr = "Ingresa de nuevo la contraseña";
    $valid = false;
  } else {
    $confcontrasena = test_input($_POST["confcontrasena"]);
  }
  
  if($valid){
	header("Location: registrarExitoso.php");
	exit();
}
}


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>



<body>
	<header class='header'>
        <nav>
            <a href="index.php"><img class="logo" src="img/scc2.png"></a>
            <ul id ='navBar' class='mainMenu'>
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
			<h1>Registro de Usuario</h1>
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
				<form action="php/registroVoluntarios.php"  role="form">
					<div class="container col-xs-12">
						<label>Matrícula: </label>
						<br>
						<input id="matriculaUsuario" name="matriculaUsuario" <?php if (isset($_POST['matriculaUsuario'])) echo 'value="'.$_POST['matriculaUsuario'].'"';?> class="form-control" type="text" placeholder="A01231234"
						value= "<?php echo htmlspecialchars($matriculaUsuario);?>" > 
						<span class="error"><?php echo $matriculaUsuarioErr;?></span>


						<br><br>
					</div>

					<div class="container col-xs-12">
						<label>Tipo: </label>
						<br>
						<select>
								<option value="admin">Admin</option>
								<option value="mesa" selected>Mesa</option>
							</select>
						<br><br>
					</div>

					<div class="container col-xs-12">
						<label>Contraseña: </label>
						<br>

						<input id="contrasena" name="contrasena" <?php if (isset($_POST['contrasena'])) echo 'value="'.$_POST['contrasena'].'"';?> class="form-control" type="text" 

						value= "<?php echo htmlspecialchars($contrasena);?>" > 
						<span class="error"><?php echo $contrasenaErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
						<label id="matriculaVoluntario">Confirmar Contraseña: </label>
						<br>

						<input id="confcontrasena" name="confcontrasena" <?php if (isset($_POST['confcontrasena'])) echo 'value="'.$_POST['confcontrasena'].'"';?> class="form-control" type="text" 

						value= "<?php echo htmlspecialchars($confcontrasena);?>" > 
						<span class="error"><?php echo $confcontrasenaErr;?></span>
						<br><br>
					</div>
					<div id="buttonDiv"><button class="btn btn-primary" type="submit">Registrar Usuario</button></div>
				</form>
			</div>
		</div>

	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>
