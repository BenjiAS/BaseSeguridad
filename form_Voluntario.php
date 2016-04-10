<?php 
	
	include('conexion.php');
	$email = "";
	$emailErr = "";


			if(isset($_REQUEST['submit'])){
				$errors = array();

				//Checar el nombre del Usuario
				if (!empty($_REQUEST['nombreUsuario'])) {
				  $nombreUsuario = $_REQUEST['nombreUsuario'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$nombreUsuario)){ $nombreUsuario = $_REQUEST['nombreUsuario'];}
				  else{ $errors[] = 'Tu nombre solo puede contener _, 1-9, A-Z or a-z 2-20 y ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu nombre';}

				  // Checar el apellido Materno
				  if (!empty($_REQUEST['apellidoPaterno'])) {
				  $apellidoPaterno = $_REQUEST['apellidoPaterno'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$apellidoPaterno)){ $apellidoPaterno = $_REQUEST['apellidoPaterno'];}
				  else{ $errors[] = 'Tu apellido Paterno puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu apellido Paterno';}

				   // Checar el apellido Materno
				  if (!empty($_REQUEST['apellidoMaterno'])) {
				  $apellidoMaterno = $_REQUEST['apellidoMaterno'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$apellidoMaterno)){ $apellidoMaterno = $_REQUEST['apellidoMaterno'];}
				  else{ $errors[] = 'Tu apellido Materno puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu apellido Materno';}

				  //Checar matricula
				  if (!empty($_REQUEST['matricula'])) {
				  $matricula = $_REQUEST['matricula'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$matricula)){ $matricula = $_REQUEST['matricula'];}
				  else{ $errors[] = 'Tu matricula solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu matricula';}

				   //Checar el celular 
				  if (!empty($_REQUEST['celular'])) {
				  $celular = $_REQUEST['celular'];
				  $pattern = "/^[0-9\_]{7,20}/";
				  if (preg_match($pattern,$celular)){ $celular = $_REQUEST['celular'];}
				  else{ $errors[] = 'Tu celular puede estar compuesto de numeros';}
				  } else {$errors[] = 'Olvidaste ingresar un celular';}

				  //Checar carrera
				   if (!empty($_REQUEST['carrera'])) {
				  $carrera = $_REQUEST['carrera'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$carrera)){ $carrera = $_REQUEST['carrera'];}
				  else{ $errors[] = 'Tu carrera solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu carrera';}

				  //Checar semestre
				  if (!empty($_REQUEST['semestre'])) {
				  $semestre = $_REQUEST['semestre'];
				  $pattern = "/^[a-zA-Z0-9\_]{2,20}/";// This is a regular expression that checks if the name is valid characters
				  if (preg_match($pattern,$semestre)){ $semestre= $_REQUEST['semestre'];}
				  else{ $errors[] = 'Tu semestre solo puede contener _, 1-9, A-Z or a-z 2-20 y puede ser asi de largo.';}
				  } else {$errors[] = 'Olvidaste ingresar tu semestre';}
				  }

				  //Checar email
				 if (empty($_POST["email"])) {
			    $emailErr = "Se requiere ingresar un email";
			  } else {
			    $email = test_input($_POST["email"]);
			    // check if e-mail address is well-formed
			    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			      $emailErr = "El formato del email es invalido"; 
			    }
			  }	
?>

			






