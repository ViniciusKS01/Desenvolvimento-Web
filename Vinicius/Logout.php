<?php 
	require_once('Cabecalho.php');
	unset($_SESSION["email"]);
	header("location: FormLogin.php");
?>