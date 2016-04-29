<!DOCTYPE html>

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

		<?php
			include('conexion.php');
		?>

		<div class='sesionHeader'>
			<!--a href="index.html"><i id="homeBtn" class="fa fa-home"></i></a-->
			<a href="index.html"><img class="logo" src="img/scc2.png"></a>
		</div>
		<div class="container col-xs-4"></div>
		<div class="container col-xs-4">
			<form id="sesionForm" role="form" action="sendEmail.php" method= "post">
				<h3 class="error"> <?php echo $emailErr?></h3>
				<label id="emailLabel">Email:</label>
				<br>
				<input id="usuario" name="email" class="form-control" type="text" placeholder="example@hotmail.com">
				<div id="buttonDiv">
					<button id="enviar" class="btn btn-primary" type="submit" >Enviar mensaje</button>
				</div>
			</form>
		</div>
	</body>
</html>



