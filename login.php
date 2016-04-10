<?php

	if($_POST['usuario'] !='' && $_POST['contrasena'] !=''){
		//session_start();
		require_once 'conexion.php';
		$usuario = $_POST['usuario'];
		//$_SESSION["intentos"] = array('usuario' => $usuario, 'intentos' => );
		//echo "usuario: ".$usuario."<br>";
		//$password = $_POST['contrasena'];
		$password = crypt($_POST['contrasena'], 'benji');
		//echo "password encryptada: ".$password."<br>";

		$query = 'SELECT password FROM usuario WHERE matricula = ? ;';
		$prep_query= $db->prepare($query);
		$prep_query->bind_param('s', $usuario);
		$prep_query->execute();
		$prep_query->bind_result($passwordInput);
		$prep_query->fetch();

		//printf('%s es la contraseña ingresada', $password);
		$prep_query->close();
		$db->close();

		//echo "<br>";
		//printf('%s es la contraseña en la bd.', $passwordInput);
		//echo "<br>";
		//printf('%s es la contraseña ingresada.', $passwordInput);


		if($password != $passwordInput){
			// $_SESSION["loginErr"] = "Usuario o Contraseña incorrectos";
			header("location: sesion.php?msg=failed");
		}
		else {
			header("location: donaciones.html");
		}
	}


?>