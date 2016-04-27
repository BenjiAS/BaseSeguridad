<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Email</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Montserrat|Pacifico|Viga|Damion' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<!-- 
	<h1>Has registrado un nuevo voluntario!</h1> -->

	</body>
	</html>
	<?php	
	
	require_once'conexion.php';
	require_once'regVoluntario.php';

	// include('regVoluntario.php');


	// Processing form data
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$nombreVoluntario = trim(filter_input(INPUT_POST,"nombreVoluntario",FILTER_SANITIZE_STRING));
	//echo $nombreVoluntario;
	$apellidoPaterno = trim(filter_input(INPUT_POST,"apellidoPaterno",FILTER_SANITIZE_STRING));
	$apellidoMaterno = trim(filter_input(INPUT_POST,"apellidoMaterno",FILTER_SANITIZE_STRING));
	$matricula = trim(filter_input(INPUT_POST,"matricula",FILTER_SANITIZE_STRING));
	$celular = trim(filter_input(INPUT_POST,"celular",FILTER_SANITIZE_NUMBER_INT));
	$telefono = trim(filter_input(INPUT_POST,"telefono",FILTER_SANITIZE_NUMBER_INT));
	$carrera = trim(filter_input(INPUT_POST,"carrera",FILTER_SANITIZE_STRING));
	$semestre = trim(filter_input(INPUT_POST,"semestre",FILTER_SANITIZE_NUMBER_INT));
	$email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
	$talla = trim(filter_input(INPUT_POST,"talla",FILTER_SANITIZE_STRING));	
	$ano = trim(filter_input(INPUT_POST,"ano",FILTER_SANITIZE_NUMBER_INT));
	$mes = trim(filter_input(INPUT_POST,"mes",FILTER_SANITIZE_NUMBER_INT));
	$dia = trim(filter_input(INPUT_POST,"dia",FILTER_SANITIZE_NUMBER_INT));

	$fechaDeNac = 	$ano.'-'.$mes.'-'.$dia;
		}
// 	//Se tiene que agregar aun lo de la fecha 

// 	if ($nombreVoluntario == "" || $apellidoPaterno == "" || $apellidoMaterno == "" || $matricula == "" || $celular == "" ||
// 		$telefono == "" || $carrera == "" || $semestre == "" || $email == "" || $talla == ""){
// 		echo "Olvidaste ingresar el dato";
// 		exit;
// 	}
// }


			// if(isset($_REQUEST['submit'])){
			// 	$errors = array();

			// 	//Checar el nombre del Usuario
			// 	if (!empty($_REQUEST['nombreVoluntario'])) {
			// 	  $nombreUsuario = $_REQUEST['nombreVoluntario'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$nombreVoluntario)){ $nombreVoluntario = $_REQUEST['nombreVoluntario'];}
			// 	  else{ $errors[] = 'Tu nombre solo puede contener _, 1-9, A-Z or a-z 2-20 y ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu nombre';}

			// 	  // Checar el apellido Materno
			// 	  if (!empty($_REQUEST['apellidoPaterno'])) {
			// 	  $apellidoPaterno = $_REQUEST['apellidoPaterno'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$apellidoPaterno)){ $apellidoPaterno = $_REQUEST['apellidoPaterno'];}
			// 	  else{ $errors[] = 'Tu apellido Paterno puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu apellido Paterno';}

			// 	   // Checar el apellido Materno
			// 	  if (!empty($_REQUEST['apellidoMaterno'])) {
			// 	  $apellidoMaterno = $_REQUEST['apellidoMaterno'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$apellidoMaterno)){ $apellidoMaterno = $_REQUEST['apellidoMaterno'];}
			// 	  else{ $errors[] = 'Tu apellido Materno puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu apellido Materno';}

			// 	  //Checar matricula
			// 	  if (!empty($_REQUEST['matricula'])) {
			// 	  $matricula = $_REQUEST['matricula'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$matricula)){ $matricula = $_REQUEST['matricula'];}
			// 	  else{ $errors[] = 'Tu matricula solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu matricula';}

			// 	   //Checar el celular 
			// 	  if (!empty($_REQUEST['celular'])) {
			// 	  $celular = $_REQUEST['celular'];
			// 	  $pattern = "/^[0-9\_]{7,20}/";
			// 	  if (preg_match($pattern,$celular)){ $celular = $_REQUEST['celular'];}
			// 	  else{ $errors[] = 'Tu celular puede estar compuesto de numeros';}
			// 	  } else {$errors[] = 'Olvidaste ingresar un celular';}

			// 	   if (!empty($_REQUEST['telefono'])) {
			// 	  $celular = $_REQUEST['telefono'];
			// 	  $pattern = "/^[0-9\_]{7,20}/";
			// 	  if (preg_match($pattern,$telefono)){ $telefono = $_REQUEST['telefono'];}
			// 	  else{ $errors[] = 'Tu telefono puede estar compuesto de numeros';}
			// 	  } else {$errors[] = 'Olvidaste ingresar un telefono';}

			// 	  //Checar carrera
			// 	   if (!empty($_REQUEST['carrera'])) {
			// 	  $carrera = $_REQUEST['carrera'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$carrera)){ $carrera = $_REQUEST['carrera'];}
			// 	  else{ $errors[] = 'Tu carrera solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu carrera';}

			// 	  //Checar semestre
			// 	  if (!empty($_REQUEST['semestre'])) {
			// 	  $semestre = $_REQUEST['semestre'];
			// 	  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
			// 	  if (preg_match($pattern,$semestre)){ $semestre= $_REQUEST['semestre'];}
			// 	  else{ $errors[] = 'Tu semestre solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
			// 	  } else {$errors[] = 'Olvidaste ingresar tu semestre';}
			// 	  }

				  //Checar email
				 // if (empty($_POST["email"])) {
			  //   $emailErr = "Se requiere ingresar un email";
			  // } else {
			  //   $email = test_input($_POST["email"]);
			  //   // check if e-mail address is well-formed
			  //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  //     $emailErr = "El formato del email es invalido"; 
			  //   }
			  // }	

			  // $pageTitle="Thank you";
			  // $section = null;
?>
<!-- 

<?php

	
		//session_start();
		require_once'conexion.php';
		
		
		$query = 'INSERT INTO Voluntario VALUES (?,?,?,?,?,?,?,?,?,?,?)';
		$prep_query= $db->prepare($query);
		$prep_query->bind_param('ssssisisiii', $matricula,$nombreVoluntario,$apellidoPaterno,$apellidoMaterno,$fechaDeNac,$email,$celular,$carrera,$semestre,$talla,$telefono);
		$prep_query->execute();
		// $prep_query->bind_result($passwordInput);
		$prep_query->fetch();

		//printf('%s es la contraseña ingresada', $password);
		$prep_query->close();
		$db->close();

		//echo "<br>";
		//printf('%s es la contraseña en la bd.', $passwordInput);
		//echo "<br>";
		//printf('%s es la contraseña ingresada.', $passwordInput);


		// if($password != $passwordInput){
		// 	// $_SESSION["loginErr"] = "Usuario o Contraseña incorrectos";
		// 	header("location: sesion.php?msg=failed");
		// }
		// else {
		// 	header("location: donaciones.html");
		// }
	


?>
		 -->	







