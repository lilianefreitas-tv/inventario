<?php
	require 'src/config.php';
	
	if(isset($_POST['update']))
	{
		$id_local = $_POST['id_local'];
		$descricao = $_POST['descricao'];
		
				
		$sqlUpdate = "UPDATE localizacao SET  descricao='$descricao' where id_local = '$id_local'";
		
		$consulta = $conexao->query($sqlUpdate);
		
	}
	header('Location: Consulta.php');
?>
