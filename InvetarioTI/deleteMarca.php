<?php
	require "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_marca = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM marca WHERE id_marca = $id_marca");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM marca WHERE id_marca = $id_marca");
			
		}
		
	}
	
	header('Location: Consulta.php');
	
?>