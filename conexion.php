<?php
	
	$db = new mysqli('localhost:3306', 'root','','seguridad');
	if ($db-> connect_errno) {
		printf('Database connection failed miserably: %s\n', $mysqli->connect_error);
		exit();
	}
	else {
		printf('Sí se conectó');
		echo "<br>";
	}	

	// if ($resultado = $db->query('SELECT * FROM Usuario')){
	// 	printf('La seleccion devolvio %d filas. \n', $resultado->num_rows);
	// 	$resultado->close();
	// }

	
	


?>