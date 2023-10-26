<?php
	require 'src/config.php';
	
	if(isset($_POST['update']))
	{
		$id_tipo = $_POST['id_tipo'];
		$descricao = $_POST['descricao'];
		
				
		$sqlUpdate = "UPDATE tipo SET  descricao='$descricao' where id_tipo = '$id_tipo'";
		
		$consulta = $conexao->query($sqlUpdate);
		
	}
	header('Location: Consulta.php');
?>
