<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sesion</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Montserrat|Pacifico|Viga|Damion' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

		<?php
			session_start();
			//$_SESSION["intentos"] = array('usuario' =>, 'intentos' => );
			// define variables and set to empty values
			$usrErr = "";
			$pswdErr = "";
			$loginErr = "";
			if(isset($_GET['msg']) && $_GET['msg']=='failed'){
				$loginErr = "Usuario o Contraseña incorrecta";
			}	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   if (empty($_POST["usuario"]) && empty($_POST["contrasena"])) {
			   	// $_SESSION["loginErr"] = "";
			     $usrErr = "Usuario requerido.";
			     $pswdErr = "Contraseña requerida.";
			   } 
			   else if (!empty($_POST["usuario"]) && empty($_POST["contrasena"])) {
			   	// $_SESSION["loginErr"] = "";
			     $usrErr = "";
			     $pswdErr = "Contraseña requerida.";
			   } 
			   else if (empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {
			   	// $_SESSION["loginErr"] = "";
			     $usrErr = "Usuario requerido.";
			     $pswdErr = "";
			   }
			   else {
			   	// $_SESSION["loginErr"] = "";
			   	require_once 'login.php';
			   }
			   
			   if (empty($_POST["contrasena"])) {
			     $pswdErr = "Contraseña requerida.";
			   } 
			}
		?>

		<div>
			<a href="index.html"><i id="homeBtn" class="fa fa-home"></i></a>
			<h2 id="bienvenido" class="text-center">Bienvenido!</h2>
		</div>
		<div class="container col-xs-4"></div>
		<div class="container col-xs-4">
			<form id="sesionForm" role="form" action= <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method= "post">
				<h3 class="error"> <?php echo $loginErr;?></h3>
				<label id="sesionLabel">Nombre de usuario: </label>
				<br>
				<input id="usuario" name="usuario" class="form-control" type="text" placeholder="Nombre de Usuario">
				<span class="error"> <?php echo $usrErr;?></span>
				<br><br>
				<label id="sesionLabel">Contraseña: </label>
				<br>
				<input id="contrasena" name="contrasena" class="form-control" type="password" placeholder="Contraseña">
				<span class="error"> <?php echo $pswdErr;?></span>
				<br><br>
				<div id="buttonDiv">
					<button class="btn btn-primary" type="submit">Iniciar Sesión</button>
				</div>
			</form>
		</div>
	</body>
</html>

