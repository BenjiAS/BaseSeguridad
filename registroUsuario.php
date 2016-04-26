<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SCC - Registro Voluntario</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="registrarExitoso.js"></script>
	<link rel='stylesheet' href='css/style.css'>
</head>

<?php 
	session_start();
	require_once'conexion.php';

	$nombreUsuarioErr = "";
	$apellidoPaternoUErr = "";
	$apellidoMaternoUErr = "";
	$matriculaUErr = "";
	$emailUErr = "";
	$fechaDeNacUErr = "";
	$celularUErr = "";
	$telefonoUErr = "";
	$carreraUErr = "";
	$semestreUErr = "";
	$tallaUErr = "";
	
	

	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombreUsuario = trim(filter_input(INPUT_POST,"nombreUsuario",FILTER_SANITIZE_STRING));
	// echo $nombreVoluntario;
	$apellidoPaternoU = trim(filter_input(INPUT_POST,"apellidoPaternoU",FILTER_SANITIZE_STRING));
	$apellidoMaternoU = trim(filter_input(INPUT_POST,"apellidoMaternoU",FILTER_SANITIZE_STRING));
	$matriculaU = trim(filter_input(INPUT_POST,"matriculaU",FILTER_SANITIZE_STRING));
	$celularU = trim(filter_input(INPUT_POST,"celularU",FILTER_SANITIZE_NUMBER_INT));
	$telefonoU = trim(filter_input(INPUT_POST,"telefonoU",FILTER_SANITIZE_NUMBER_INT));
	$carreraU = trim(filter_input(INPUT_POST,"carreraU",FILTER_SANITIZE_STRING));
	$semestreU = trim(filter_input(INPUT_POST,"semestreU",FILTER_SANITIZE_NUMBER_INT));
	$emailU = trim(filter_input(INPUT_POST,"emailU",FILTER_SANITIZE_EMAIL));
	$tallaU = trim(filter_input(INPUT_POST,"tallaU",FILTER_SANITIZE_STRING));	
	$ano = trim(filter_input(INPUT_POST,"ano",FILTER_SANITIZE_NUMBER_INT));
	$mes = trim(filter_input(INPUT_POST,"mes",FILTER_SANITIZE_NUMBER_INT));
	$dia = trim(filter_input(INPUT_POST,"dia",FILTER_SANITIZE_NUMBER_INT));

	$fechaDeNacU = 	$ano.'-'.$mes.'-'.$dia;

		}
	
	$nombreUsuario = $apellidoPaternoU = $apellidoMaternoU = $matriculaU = $celularU = 
	$telefonoU = $carreraU = $semestreU = $emailU = $tallaU = $ano = $mes = $dia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["nombreUsuario"])) {
    $nombreUsuarioErr = "Ingresa nombre";
    $valid = false;
  } else {
    $nombreUsuario = test_input($_POST["nombreUsuario"]);
  }

  if (empty($_POST["apellidoPaternoU"])) {
    $apellidoPaternoUErr = "Ingresa apellido";
    $valid = false;
  } else {
    $apellidoPaternoU = test_input($_POST["apellidoPaternoU"]);
  }

    if (empty($_POST["apellidoMaternoU"])) {
    $apellidoMaternoUErr = "Ingresa apellido";
    $valid = false;
  } else {
    $apellidoMaternoU = test_input($_POST["apellidoMaternoU"]);
  }
  if (empty($_POST["matriculaU"])) {
    $matriculaUErr = "Ingresa matricula";
    $valid = false;
  } else {
    $matriculaU = test_input($_POST["matriculaU"]);
  }
  if (empty($_POST["emailU"])) {
    $emailUErr = "Ingresa email";
    $valid = false;
  } else {
    $emailU = test_input($_POST["emailU"]);
  }
  // if (empty($_POST["fechaDeNac"])) {
  //   $fechaDeNacErr = "Se requiere ingresar una fecha";
  //   $valid = false;
  // } else {
  //   $fechaDeNac= test_input($_POST["fechaDeNac"]);
  // }
    if (empty($_POST["celularU"])) {
    $celularUErr = "Ingresa celular";
    $valid = false;
  } else {
    $celularU = test_input($_POST["celularU"]);
  }  
  if (empty($_POST["telefonoU"])) {
    $telefonoUErr = "Ingresa telefono";
    $valid = false;
  } else {
    $telefonoU = test_input($_POST["telefonoU"]);
  }  

  if (empty($_POST["carreraU"])) {
    $carreraUErr = "Ingresa carrera";
    $valid = false;
  } else {
    $carreraU = test_input($_POST["carreraU"]);
  } 
    if (empty($_POST["semestreU"])) {
    $semestreUErr = "Ingresa semestre";
    $valid = false;
  } else {
    $semestreU = test_input($_POST["semestreU"]);
  } 
    if (empty($_POST["tallaU"])) {
    $tallaUErr = "Ingresa talla";
    $valid = false;
  } else {
    $tallaU = test_input($_POST["tallaU"]);
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

$sql = 'INSERT INTO usuarioRegistrar VALUES (?,?,?,?,?,?,?,?,?,?,?)';
		$prep_query= $db->prepare($sql);
		$prep_query->bind_param('ssssisisiii', $matriculaU,$nombreUsuario,$apellidoPaternoU,$apellidoMaternoU,$fechaDeNacU,$emailU,$celularU,
			$carreraU,$semestreU,$tallaU,$telefonoU);
		$prep_query->execute();
		// $prep_query->bind_result($passwordInput);i

		//Para checar si el log in es exitoso
		// $result = mysql_query("SELECT * FROM voluntario WHERE matricula='$matricula' AND nombres='$nombreVoluntario'
		// 	AND apellidoPat='$apellidoPaterno' AND apellidoMat = '$apellidoMaterno' AND fechaDeNac ='$fechaDeNac' AND email='$email'
		// 	AND celular='$celular' AND escolaridad='$carrera' AND semestre = '$semestre' AND talla='$talla' AND telefono='$telefono' ");
		// $prueba = mysql_num_rows($result); 
		// if($prueba == 1){
		// 	echo "Haz sido registrado";
		// }
		
		//printf('%s es la contraseña ingresada', $password);
		$prep_query->close();
		$db->close();
 


?>

<body>
	<header>
		<nav>
			<a href="index.html"><img class="logo" src="img/scc2.png"></a>
			<ul class='mainMenu'>
	            <li><a href="eventos.html">Eventos</a></li>
	            <li><a href="acerca.html">¿Quiénes somos?</a></li>
	            <li><a href="patrocinadores.html">Patrocinadores</a></li>
	            <li><a href="donaciones.html">Donaciones</a></li>
	            <li><a href="contacto.html">Contacto</a></li>
	            <li><a href="sesion.html">Iniciar Sesión</a></li>
	        </ul>
		</nav>
	</header>
		<div id="pageTitle">
			<label id="registroDeVoluntario">Registro de voluntario </label>
			<br>
			<!-- <h2 id="bienvenido">Registro de Voluntario</h2> -->
		</div>
	<div class='mainDiv'>
		
		

		<div class='sideMenu container col-xs-3'>
			<h3>Menú Administrativo</h3>
			<a href=""><p>Administración de Voluntarios</p></a>
			<a href=""><p>Administración de Instituciones</p></a>
			<a href=""><p>Administración de Patrocinadores</p></a>
			<a href=""><p>Administración de Usuarios</p></a>
		</div>


		<div class='mainContent'>
			<div class='registroForm container col-xs-6'>
				<form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " role="form" method="post">
					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $nombreVoluntarioErr;?></h3> -->
						<label for="nombreVoluntario">Nombre(s): </label>
						<br>
						<input id="nombreUsuario" name="nombreUsuario" <?php if (isset($_POST['nombreUsuario'])) echo 'value="'.$_POST['nombreUsuario'].'"';?> class="form-control" type="text" placeholder="i.e. Juan Ricardo"
						value= "<?php echo htmlspecialchars($nombreUsuario);?>">
						<span class="error"><?php echo $nombreUsuarioErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoPaternoErr;?></h3> -->
						<label for="apellidoPaterno">Apellido Paterno: </label>
						<br>
						<input id="apellidoPatVoluntario" name="apellidoPaternoU" <?php if (isset($_POST['apellidoPaternoU'])) echo 'value="'.$_POST['apellidoPaternoU'].'"';?>  class="form-control" type="text" placeholder="i.e. Hernández"
						value= "<?php echo htmlspecialchars($apellidoPaternoU);?>">
						<span class="error"><?php echo $apellidoPaternoUErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoMaternoErr;?></h3> -->
						<label for="apellidoMaterno">Apellido Materno: </label>
						<br>
						<input id="apellidoMatUsuario" name="apellidoMaternoU" <?php if (isset($_POST['apellidoMaternoU'])) echo 'value="'.$_POST['apellidoMaternoU'].'"';?>  class="form-control" type="text" placeholder="i.e. López"
						value= "<?php echo htmlspecialchars($apellidoMaternoU);?>">
						<span class="error"><?php echo $apellidoMaternoUErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $matriculaErr;?></h3> -->
						<label for="matricula">Matrícula: </label>
						<br>
						<input id="matriculaVoluntario" name="matriculaU" <?php if (isset($_POST['matriculaU'])) echo 'value="'.$_POST['matriculaU'].'"';?> class="form-control" type="text" placeholder="i.e. A01233188"
						value= "<?php echo htmlspecialchars($matriculaU);?>">
						<span class="error"><?php echo $matriculaUErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $emailErr;?></h3> -->
						<label for="email">E-mail: </label>
						<br>
						<input id="emailVoluntario" name="email" <?php if (isset($_POST['emailU'])) echo 'value="'.$_POST['emailU'].'"';?> class="form-control" type="email" placeholder="i.e. juanhernandez@hotmail.com"
						value= "<?php echo htmlspecialchars($emailU);?>">
						<span class="error"><?php echo $emailUErr;?></span>
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


					<div class="container col-xs-6">
						<!-- <h3 class="error"> <?php echo $celularErr;?></h3> -->
						<label for="celular">Celular: </label>
						<br>
						<input id="celularVoluntario" name="celularU" <?php if (isset($_POST['celularU'])) echo 'value="'.$_POST['celularU'].'"';?> class="form-control" type="text" placeholder="i.e. 8713567890"
						value= "<?php echo htmlspecialchars($celularU);?>">
						<span class="error"><?php echo $celularUErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $telefonoErr;?></h3> -->
						<label for="telefono">Teléfono: </label>
						<br>
						<input id="telefonoVoluntario" name="telefonoU" <?php if (isset($_POST['telefonoU'])) echo 'value="'.$_POST['telefonoU'].'"';?> class="form-control" type="text" placeholder="i.e. 7567890"
						value= "<?php echo htmlspecialchars($telefonoU);?>">
						<span class="error"><?php echo $telefonoUErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $carreraErr;?></h3> -->
						<label for="carrera">Carrera/Prepa: </label>
						<br>
						<input id="carreraVoluntario" name="carreraU" <?php if (isset($_POST['carrera'])) echo 'value="'.$_POST['carrera'].'"';?> class="form-control" type="text" placeholder="i.e. ITIC"
						value= "<?php echo htmlspecialchars($carrera);?>">
						<span class="error"><?php echo $carreraErr;?></span>
						<br><br>
					</div>
					<div class="container col-xs-6">
					<!-- <h3 class="error"> <?php echo $semestreErr;?></h3> -->
						<label for="semestre">Semestre: </label>
						<br>
						<input id="semestreVoluntario" name="semestreU" <?php if (isset($_POST['semestreU'])) echo 'value="'.$_POST['semestreU'].'"';?> class="form-control" type="text" placeholder="i.e. 6"
						value= "<?php echo htmlspecialchars($semestreU);?>">
						<span class="error"><?php echo $semestreUErr;?></span>
						<br><br>
					</div>
					<div class="container col-xs-6">
						<!-- <h3 class="error"> <?php echo $tallaErr;?></h3> -->
						<label for="semestre">Talla:</label>
						<br>
						<input id="semestreVoluntario" name="tallaU" <?php if (isset($_POST['tallaU'])) echo 'value="'.$_POST['tallaU'].'"';?>  class="form-control" type="text" placeholder="i.e. XS"
						value= "<?php echo htmlspecialchars($tallaU);?>">
						<span class="error"><?php echo $tallaUErr;?></span>
						<br><br>
					</div>
					<div id="buttonDiv"><button class="btn btn-primary" type="submit" value="submit" >Registrar</button></div>
					<?php 
						include "registrarExitoso.php";
					?>
				</form>
			</div>
		</div>



	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>



