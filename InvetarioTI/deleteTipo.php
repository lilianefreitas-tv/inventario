<?php
	require "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_tipo = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM tipo WHERE id_tipo = $id_tipo");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM tipo WHERE id_tipo = $id_tipo");
			
		}
		
	}
	
	header('Location: Consulta.php');
	
?>