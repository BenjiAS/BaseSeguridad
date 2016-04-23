<?php
	
	session_start();
	require_once 'navBarSinSesion.php';
	session_destroy();
	echo "blahblah";
	header('location: index.php');

?>