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

<?php 
	session_start();
	require_once'conexion.php';

	$nombresErr = "";
	$apellidoPatErr = "";
	$apellidoMatErr = "";
	$fechaDeNacErr = "";
	$discapacidadErr = "";
	$generoErr = "";
	$grupoErr = "";
	
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombres = trim(filter_input(INPUT_POST,"nombres",FILTER_SANITIZE_STRING));
	// echo $nombrepatrocinador;
	$apellidoPat = trim(filter_input(INPUT_POST,"apellidoPaterno",FILTER_SANITIZE_STRING));
	$apellidoMat = trim(filter_input(INPUT_POST,"apellidoMaterno",FILTER_SANITIZE_STRING));
	$discapacidad = trim(filter_input(INPUT_POST,"discapacidad",FILTER_SANITIZE_STRING));
	$genero= trim(filter_input(INPUT_POST,"genero",FILTER_SANITIZE_STRING));
	$grupo = trim(filter_input(INPUT_POST,"grupo",FILTER_SANITIZE_STRING));
	$fechaDeNac = 	$ano.'-'.$mes.'-'.$dia;


		}
	
	// $id = $nombres = $apellidoPat= $apellidoMat = $fechaDeNac= $discapacidad = $genero = $grupo ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$valid = true;

  if (empty($_POST["nombres"])) {
    $nombresErr = "Ingresa un nombre";
    $valid = false;
  } else {
    $nombres = test_input($_POST["nombres"]);
  }

  if (empty($_POST["apellidoPat"])) {
    $apellidoPaternoErr = "Ingresa un apellido";
    $valid = false;
  } else {
    $apellidoPat = test_input($_POST["apellidoPat"]);
  }

    if (empty($_POST["apellidoMat"])) {
    $apellidoMatErr = "Ingresa un apellido";
    $valid = false;
  } else {
    $apellidoMat = test_input($_POST["apellidoMat"]);
  }
  if (empty($_POST["fechaDeNac"])) {
    $fechaDeNacErr = "Seleccion una opcion";
    $valid = false;
  } else {
    $fechaDeNac = test_input($_POST["fechaDeNac"]);
  }

    if (empty($_POST["discapacidad"])) {
    $discapacidadErr = "Seleccion una discapacidad";
    $valid = false;
  } else {
    $discapacidad = test_input($_POST["discapacidad"]);
  }

  if (empty($_POST["genero"])) {
    $generoErr = "Selecciona un genero";
    $valid = false;
  } else {
    $genero= test_input($_POST["genero"]);
  }

    if (empty($_POST["grupo"])) {
    $grupoErr = "Selecciona un grupo";
    $valid = false;
  } else {
    $grupo= test_input($_POST["grupo"]);
  }


$discapacidades = array('--Selecciona una--','Down', 'Ceguera','Silente','Autismo');
$selected_key = $_POST['discapacidad'];
$selected_value = $discapacidades[$_POST['discapacidad']];

$generos = array('--Selecciona uno--','Femenino', 'Masculino');
$selected_key = $_POST['genero'];
$selected_value = $generos[$_POST['genero']];  

  
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

$sql = 'INSERT INTO nino (nombres,apellidoPat, apellidoMat, fechaDeNac,discapacidad, genero, grupo) VALUES (?,?,?,?,?,?,?)';
		$prep_query= $db->prepare($sql);
		$prep_query->bind_param('sssisss',$nombres, $apellidoPat, $apellidoMat, $fechaDeNac,$discapacidad, $genero, $grupo);
		$prep_query->execute();
		// $prep_query->bind_result($passwordInput);
		$prep_query->fetch();

		// Para checar si el log in es exitoso
		// $result = mysql_query("SELECT * FROM patrocinador WHERE matricula='$matricula' AND nombres='$nombrepatrocinador'
		// 	AND apellidoPat='$apellidoPaterno' AND apellidoMat = '$apellidoMaterno' AND fechaDeNac ='$fechaDeNac' AND email='$email'
		// 	AND celular='$celular' AND escolaridad='$carrera' AND semestre = '$semestre' AND talla='$talla' AND telefono='$telefono' ");
		// $prueba = mysql_num_rows($result); 
		// if($prueba == 1){
		// 	echo "Haz sido registrado";
		// }
		
		// printf('%s es la contraseña ingresada', $password);
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
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " role="form">
					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $nombreVoluntarioErr;?></h3> -->
						<label for="nombres">Nombre(s):</label>
						<br>
						<input id="nombres" name="nombres" <?php if (isset($_POST['nombres'])) echo 'value="'.$_POST['nombres'].'"';?> class="form-control" type="text" placeholder="i.e. Juan Ricardo"
						value= "<?php echo htmlspecialchars($nombres);?>">
						<span class="error"><?php echo $nombresErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoPaternoErr;?></h3> -->
						<label for="apellidoPaterno">Apellido Paterno: </label>
						<br>
						<input id="apellidoPat" name="apellidoPat" <?php if (isset($_POST['apellidoPat'])) echo 'value="'.$_POST['apellidoPat'].'"';?>  class="form-control" type="text" 
						placeholder="i.e. Hernández"
						value= "<?php echo htmlspecialchars($apellidoPat);?>">
						<span class="error"><?php echo $apellidoPatErr;?></span>
						<br><br>
					</div>

					<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoMaternoErr;?></h3> -->
						<label for="apellidoMaterno">Apellido Materno: </label>
						<br>
						<input id="apellidoMat" name="apellidoMat" <?php if (isset($_POST['apellidoMat'])) echo 'value="'.$_POST['apellidoMat'].'"';?>  class="form-control"
						 type="text" placeholder="i.e. López"
						value= "<?php echo htmlspecialchars($apellidoMat);?>">
						<span class="error"><?php echo $apellidoMatErr;?></span>
						<br><br>
					</div>

			<!------------------------------------------------------------------------------>
				
					<div class="container col-xs-12">
					<!-- 	<h3 class="error"> <?php echo $fechaDeNacErr;?></h3> -->
						<label for="fechaDeNac">Fecha de Nacimiento: </label>
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
							<select input type="text"  id="discapacidad"name="discapacidad" maxlength = "10" value="<?php echo $_SESSION['discapacidad'] ?>">
								<option value="0" >--Seleccione una--</option>
								<option value="1">Down</option>
								<option value="2">Ceguera</option>
								<option value="3">Silente</option>
								<option value="4">Autismo</option>
							</select>
						</div>
						<br>
						<span class="error"><?php echo $discapacidadErr;?></span>
					</div>	


					<div class="container col-xs-12">
					<!-- 	<h3 class="error"> <?php echo $fechaDeNacErr;?></h3> -->
						<label for="genero">Género:</label>
						<br>

						<div class="container col-xs-4">
							<select id="genero" name="genero" maxlength = "10" value="<?php echo $_SESSION['genero'] ?>">
								<option value="-" selected>--Seleccione uno--</option>
								<option value="f">Femenino</option>
								<option value="m">Masculino</option>
							</select>
						</div>
						<br>
						<span class="error"><?php echo $generoErr;?></span>
					</div>	



			

						<div class="container col-xs-12">
					<!-- <h3 class="error"> <?php echo $apellidoPaternoErr;?></h3> -->
						<label for="grupo">Grupo:</label>
						<br>
						<input id="grupo" name="grupo" <?php if (isset($_POST['grupo'])) echo 'value="'.$_POST['grupo'].'"';?>  class="form-control" type="text" 
						placeholder="i.e. Hernández"
						value= "<?php echo htmlspecialchars($grupo);?>">
						<span class="error"><?php echo $grupoErr;?></span>
						<br><br>
					</div>

					<div id="buttonDiv"><button class="btn btn-primary" type="submit">Registrar Niño</button></div>
				</form>
			</div>
		</div>

	</div>
</body>
<footer>Proyecto de Seguridad Informática</footer>
</html>