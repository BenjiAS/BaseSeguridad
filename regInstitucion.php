<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Registro Institucion</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="registrarExitoso.js"></script>
	<link rel='stylesheet' href='css/style.css'>
</head>

<?php 
	session_start();
	require_once'conexion.php';

	$nombreInstitucionErr = "";
	$direccionErr = "";
	$nombreContactoErr = "";
	$telefonoErr = "";
	
	
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombreInstitucion = trim(filter_input(INPUT_POST,"nombreInstitucion",FILTER_SANITIZE_STRING));
	// echo $nombrepatrocinador;
	$direccion = trim(filter_input(INPUT_POST,"direccion",FILTER_SANITIZE_STRING));
	$nombreContacto = trim(filter_input(INPUT_POST,"nombreContacto",FILTER_SANITIZE_STRING));
	$telefono= trim(filter_input(INPUT_POST,"telefono",FILTER_SANITIZE_NUMBER_INT));

		}
	

	$nombreInstitucion = $direccion = $nombreContacto= $telefono = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["nombreInstitucion"])) {
    $nombreInstitucionErr = "Ingresa el nombre de la Institucion";
    $valid = false;
  } else {
    $nombreInstitucion= test_input($_POST["nombreInstitucion"]);
  }

  if (empty($_POST["nombreContacto"])) {
    $nombreContactoErr = "Ingresa un nombre";
    $valid = false;
  } else {
    $nombreContacto = test_input($_POST["nombreContacto"]);
  }

    if (empty($_POST["direccion"])) {
    $direccionErr = "Ingresa una direccion";
    $valid = false;
  } else {
    $direccion = test_input($_POST["direccion"]);
  }
  if (empty($_POST["telefono"])) {
    $telefonoErr = "Ingresa un telefono";
    $valid = false;
  } else {
    $telefono= test_input($_POST["telefono"]);
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

$sql = 'INSERT INTO institucion (nombre, direccion, contacto, telefono) VALUES (?,?,?,?)';
		$prep_query= $db->prepare($sql);
		$prep_query->bind_param('ssss',$nombreInstitucion, $direccion, $nombreContacto, $telefono);
		$prep_query->execute();
		// $prep_query->bind_result($passwordInput);
		$prep_query->fetch();

		//Para checar si el log in es exitoso
		// $result = mysql_query("SELECT * FROM patrocinador WHERE matricula='$matricula' AND nombres='$nombrepatrocinador'
		// 	AND apellidoPat='$apellidoPaterno' AND apellidoMat = '$apellidoMaterno' AND fechaDeNac ='$fechaDeNac' AND email='$email'
		// 	AND celular='$celular' AND escolaridad='$carrera' AND semestre = '$semestre' AND talla='$talla' AND telefono='$telefono' ");
		// $prueba = mysql_num_rows($result); 
		// if($prueba == 1){
		// 	echo "Haz sido registrado";
		// }
		
		//printf('%s es la contraseña ingresada', $password);
		$prep_query->close();
		// $db->close();
 


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
		<div id="pageTitle">
			<h1>Registro de Institución</h1>
			<br>
			<!-- <h2 id="bienvenido">Registro de patrocinador</h2> -->
		</div>
	<div class='mainDiv'>
		
		

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
				<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " role="form" method="post">
					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $nombrepatrocinadorErr;?></h3> -->
						<label for="nombrepatrocinador">Nombre de la institución:</label>
						<br>
						<input id="nombreInstitucion" name="nombreInstitucion" <?php if (isset($_POST['nombreInstitucion'])) echo 'value="'.$_POST['nombreInstitucion'].'"';?> class="form-control" type="text" placeholder="i.e. Ver contigo"
						value= "<?php echo htmlspecialchars($nombreInstitucion);?>">
						<span class="error"><?php echo $nombreInstitucionErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $emailErr;?></h3> -->
						<label for="email">Direccion:</label>
						<br>
						<input id="direccion" name="direccion" <?php if (isset($_POST['direccion'])) echo 'value="'.$_POST['direccion'].'"';?> class="form-control" type="text" placeholder="i.e. Calle de los Olivos"
						value= "<?php echo htmlspecialchars($direccion);?>">
						<span class="error"><?php echo $direccionErr;?></span>
						<br><br>
					</div>

						<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoPaternoErr;?></h3> -->
						<label for="apellidoPaterno">Nombre del contacto:</label>
						<br>
						<input id="nombreContacto" name="nombreContacto" <?php if (isset($_POST['nombreContacto'])) echo 'value="'.$_POST['nombreContacto'].'"';?>  class="form-control" type="text" placeholder="i.e. Alejandro"
						value= "<?php echo htmlspecialchars($nombreContacto);?>">
						<span class="error"><?php echo $nombreContactoErr;?></span>
						<br><br>
					</div>
				
					<div class="container col-xs-12">
						<!-- <h3 class="error"> <?php echo $tallaErr;?></h3> -->
						<label for="semestre">Telefono: </label>
						<br>
						<input id="telefono" name="telefono" <?php if (isset($_POST['text'])) echo 'value="'.$_POST['telefono'].'"';?>  class="form-control" type="text" placeholder="example. 871 1453061"
						value= "<?php echo htmlspecialchars($telefono);?>" >
						<span class="error"><?php echo $telefonoErr;?></span>
						<!-- <span class="error"><?php echo $textErr;?></span> -->
						<br><br>
					<div id="buttonDiv"><button class="btn btn-primary text-center" type="submit" value="submit" >Registrar</button></div>
					
				</form>
			</div>
		</div>



	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>



