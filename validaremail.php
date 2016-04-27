		<?php
			function generarLinkTemporal($matricula){
			   //echo $matricula;
			   // Se genera una cadena para validar el cambio de contraseña
			   $cadena = $matricula.rand(1,9999999).date('Y-m-d');
			   //echo "<br>";
			   //echo $cadena;
			   $token = sha1($cadena);
			 
			   $conexion = new mysqli('localhost', 'root', '', 'seguridad');

			   // Se inserta el registro en la tabla tblreseteopass
			   $sql = "INSERT INTO tblreseteopass ( matricula, token, creado) VALUES('".$matricula."','".$token."',NOW());";
			   $resultado = $conexion->query($sql);
			   //echo "<br>";
			   //echo "resultado: ".json_encode ($resultado);
			   if($resultado){
			    // echo "<br>";
			    // echo "Entra al if de resultado";
			      // Se devuelve el link que se enviara al usuario
			      $enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?matricula='.$matricula.'&token='.$token;
			      return $enlace;
			   }
			   else
			      return FALSE;
			    
			}
			 
			function enviarEmail( $email, $link ){
			  //echo "<br>";
			  //echo "entro a la funcion enviar";
			  //echo "<br>";
			   $mensaje = '<html>
			     <head>
			        <title>Restablece tu contraseña</title>
			     </head>
			     <body>
			       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
			       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
			       <p>
			         <strong>Enlace para restablecer tu contraseña</strong><br>
			         <a href="'.$link.'"> Restablecer contraseña </a>
			       </p>
			     </body>
			    </html>';
			 
			   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
			   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			   $cabeceras .= 'From: Codedrinks <mimail@codedrinks.com>' . "\r\n";
			   //Se envia el correo al usuario
			   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
			}




			$email = $_POST['email'];
			 
			$respuesta = new stdClass();
			 
			if( $email != "" ){
			  echo "entro al primer if";
			   $conexion = new mysqli('localhost', 'root', '', 'seguridad');
			   $sql = " SELECT * FROM voluntario WHERE email = '".$email."';";
			   printf( "%s", $sql);
			   $resultado = $conexion->query($sql);
			   if($resultado->num_rows > 0){
			    echo "<br>";
			    echo "entro al segundo if";
			      $usuario = $resultado->fetch_assoc();
			       printf("%s",$usuario['matricula']);
			      $linkTemporal = generarLinkTemporal($usuario['matricula'] );
			      if($linkTemporal){
			        echo "entro al tercer if";
			        enviarEmail( $email, $linkTemporal );
			        $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
			        $correo= "Un correo ha sido enviado para reestablecer la contraseña <br><br> ";
			      }
			   }
			   else{
			      $respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
				  $correo = "No existe mail asociado a una cuenta. Intente de nuevo.<br><br>";	
				}
			}
			else{
			   $respuesta->mensaje= "Debes introducir el email de la cuenta";
			}
			 
		?>
