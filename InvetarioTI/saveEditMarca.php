<?php
	require 'src/config.php';
	
	if(isset($_POST['update']))
	{
		$id_marca = $_POST['id_marca'];
		$descricao = $_POST['descricao'];
		
				
		$sqlUpdate = "UPDATE marca SET  descricao='$descricao' where id_marca = '$id_marca'";
		
		$consulta = $conexao->query($sqlUpdate);
		
	}
	header('Location: Consulta.php');
?>
