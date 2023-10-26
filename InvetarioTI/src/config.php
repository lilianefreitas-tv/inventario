<?php
	
	$dbHost = 'Localhost';
	$dbUsername = 'root';
	$dbPassword = 'root';
	$dbName = 'inventariobd';
	
	//$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
	$conexao = mysqli_connect("$dbHost","$dbUsername","$dbPassword","$dbName");
	mysqli_set_charset($conexao, "utf8");
	
?>