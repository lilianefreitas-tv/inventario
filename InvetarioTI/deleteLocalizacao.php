<?php
	require "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_local = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM localizacao WHERE id_local = $id_local");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM localizacao WHERE id_local = $id_local");
			
		}
		
	}
	
	header('Location: Consulta.php');
	
?>