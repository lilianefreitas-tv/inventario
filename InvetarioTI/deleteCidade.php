<?php
	require "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_cidade = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM cidade WHERE id_cidade = $id_cidade");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM cidade WHERE id_cidade = $id_cidade");
			
		}
		
	}
	
	header('Location: Consulta.php');
	
?>