<?php
	require 'src/config.php';
	
	if(isset($_POST['update']))
	{
		$id_cidade = $_POST['id_cidade'];
		$descricao = $_POST['descricao'];
		
				
		$sqlUpdate = "UPDATE cidade SET  descricao='$descricao' where id_cidade = '$id_cidade'";
		
		$consulta = $conexao->query($sqlUpdate);
		
	}
	header('Location: Consulta.php');
?>
