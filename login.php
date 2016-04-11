<?php

	if($_POST['usuario'] !='' && $_POST['contrasena'] !=''){
		//session_start();
		require_once 'conexion.php';
		$usuario = $_POST['usuario'];
		//$_SESSION["intentos"] = array('usuario' => $usuario, 'intentos' => );
		//echo "usuario: ".$usuario."<br>";
		//$password = $_POST['contrasena'];
		$passwordInput = crypt($_POST['contrasena'], 'benji');
		//echo "password encryptada: ".$password."<br>";

		$query = 'SELECT password FROM usuario WHERE matricula = ? ;';
		$prep_query= $db->prepare($query);
		$prep_query->bind_param('s', $usuario);
		$prep_query->execute();
		$prep_query->bind_result($passwordBD);
		$prep_query->fetch();

		//printf('%s es la contraseña ingresada', $password);
		$prep_query->close();
		

		echo "<br>";		

		//SI EL USUARIO INGRESADO NO EXISTE (consulta regresa vacío), SE SUMA UNO A LA VARIABLE DE SESIÓN "intentos"
		if($passwordBD == ""){
			echo "<br>";
			echo "No existe usuario";
			echo "<br>";
			$_SESSION['intentos'] = $_SESSION['intentos'] + 1;
			echo 'Intentos con usuario inexistente: '.$_SESSION['intentos'];
			echo "<br>";
				echo 'Intentos con usuario existente: '.$_SESSION['intentosExiste'];
		}
		//SI EL USUARIO SÍ EXISTE
		else {
			//echo "<br>";
			printf('%s es la contraseña en la bd.', $passwordBD);
			//echo "<br>";
			//printf('%s es la contraseña ingresada.', $passwordInput);

			//PERO LA CONTRASEÑA ES INCORRECTA
			if($passwordInput != $passwordBD){
				//UPDATE INTENTOS EN LA BD
				$queryUpdateIntentos = "UPDATE Usuario SET intentos = (intentos + 1) WHERE matricula = ? ;";
				$prep_queryUpdateIntentos= $db->prepare($queryUpdateIntentos);
				$prep_queryUpdateIntentos->bind_param('s', $usuario);
				$prep_queryUpdateIntentos->execute();

				$querySacarIntentos = "SELECT intentos FROM Usuario WHERE matricula = ? ;";
				$prep_querySacarIntentos= $db->prepare($querySacarIntentos);
				$prep_querySacarIntentos->bind_param('s', $usuario);
				$prep_querySacarIntentos->execute();
				$prep_querySacarIntentos->bind_result($intentosBD);
				$prep_querySacarIntentos->fetch();

				$_SESSION['intentosExiste'] = $intentosBD;
				$_SESSION['intentos'] = $_SESSION['intentos'] + 1;

				echo "<br>";
				echo 'Intentos con usuario inexistente: '.$_SESSION['intentos'];
				echo "<br>";
				echo 'Intentos con usuario existente: '.$_SESSION['intentosExiste'];

				// $_SESSION["loginErr"] = "Usuario o Contraseña incorrectos";
				//header("location: sesion.php?msg=failed");
			}
			//Y LA CONTRASEÑA ES CORRECTA
			else {
				//RESTABLECER INTENTOS EN BD
				$queryRestablecerIntentos = "UPDATE Usuario SET intentos = 0 WHERE matricula = ? ;";
				$prep_queryRestablecerIntentos= $db->prepare($queryRestablecerIntentos);
				$prep_queryRestablecerIntentos->bind_param('s', $usuario);
				$prep_queryRestablecerIntentos->execute();
				//RESTABLECER INTENTOS VAR DE SESION 'intentos'
				$_SESSION['intentos'] = 0;
				//RESTABLECER INTENTOS VAR DE SESION 'intentosExiste'
				$_SESSION['intentosExiste'] = 0;
				//header("location: donaciones.html");
				echo "<br>";
				echo 'Intentos con usuario inexistente: '.$_SESSION['intentos'];
				echo "<br>";
				echo 'Intentos con usuario existente: '.$_SESSION['intentosExiste'];
			}
		}

		$db->close();
		
	}


?>