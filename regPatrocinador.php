<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Registro Patrocinador</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="registrarExitoso.js"></script>
	<link rel='stylesheet' href='css/style.css'>
</head>

<?php 
	session_start();
	require_once'conexion.php';

	$nombrepatrocinadorErr = "";
	$nombreContactoErr = "";
	$direccionErr = "";
	$telefonoErr = "";
	$emailpatrocinadorErr = "";
	$textErr = "";
	
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombrepatrocinador = trim(filter_input(INPUT_POST,"nombrepatrocinador",FILTER_SANITIZE_STRING));
	// echo $nombrepatrocinador;
	$nombreContacto = trim(filter_input(INPUT_POST,"nombreContacto",FILTER_SANITIZE_STRING));
	$direccion = trim(filter_input(INPUT_POST,"direccion",FILTER_SANITIZE_STRING));
	$emailpatrocinador = trim(filter_input(INPUT_POST,"emailpatrocinador",FILTER_SANITIZE_EMAIL));
	$text= trim(filter_input(INPUT_POST,"text",FILTER_SANITIZE_NUMBER_INT));


		}
	
	$nombrepatrocinador = $nombreContacto = $direccion = $emailpatrocinador = $text = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["nombrepatrocinador"])) {
    $nombrepatrocinadorErr = "Ingresa un nombre";
    $valid = false;
  } else {
    $nombrepatrocinador = test_input($_POST["nombrepatrocinador"]);
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
  if (empty($_POST["emailpatrocinador"])) {
    $emailpatrocinadorErr = "Ingresa email";
    $valid = false;
  } else {
    $emailpatrocinador= test_input($_POST["emailpatrocinador"]);
  }
  if (empty($_POST["text"])) {
    $textErr = "Ingresa información";
    $valid = false;
  } else {
    $text = test_input($_POST["text"]);
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

$sql = 'INSERT INTO patrocinador VALUES (?,?,?,?,?)';
		$prep_query= $db->prepare($sql);
		$prep_query->bind_param('sssss', $nombrepatrocinador, $nombreContacto, $direccion, $emailpatrocinador,$text);
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
		//$db->close();
 


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
			<h1>Registro de Patrocinador </h1>
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
						<label for="nombrepatrocinador">Nombre del patrocinador:</label>
						<br>
						<input id="nombrepatrocinador" name="nombrepatrocinador" <?php if (isset($_POST['nombrepatrocinador'])) echo 'value="'.$_POST['nombrepatrocinador'].'"';?> class="form-control" type="text" placeholder="i.e. Coca Cola"
						value= "<?php echo htmlspecialchars($nombrepatrocinador);?>">
						<span class="error"><?php echo $nombrepatrocinadorErr;?></span>
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

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $emailErr;?></h3> -->
						<label for="email">Direccion:</label>
						<br>
						<input id="direccion" name="direccion" <?php if (isset($_POST['direccion'])) echo 'value="'.$_POST['direccion'].'"';?> class="form-control" type="email" placeholder="i.e. Calle de los Olivos"
						value= "<?php echo htmlspecialchars($direccion);?>">
						<span class="error"><?php echo $direccionErr;?></span>
						<br><br>
					</div>

				
					<div class="container col-xs-6">
						<!-- <h3 class="error"> <?php echo $tallaErr;?></h3> -->
						<label for="semestre">Información adicional:</label>
						<br>
						<textarea id="text" name="text" <?php if (isset($_POST['text'])) echo 'value="'.$_POST['text'].'"';?>  class="form-control" type="text" placeholder="..."
						value= "<?php echo htmlspecialchars($text);?>" >
						</textarea>
						<!-- <span class="error"><?php echo $textErr;?></span> -->
						<br><br>
					</div>
					<div id="buttonDiv"><button class="btn btn-primary" type="submit" value="submit" >Registrar</button></div>
					<?php 
						require_once "registrarExitoso.js";
					?>
				</form>
			</div>
		</div>



	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>



