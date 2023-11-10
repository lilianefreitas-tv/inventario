<?php
	
	include "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_material = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM material WHERE id_material = $id_material");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlBaixa = mysqli_query($conexao,"UPDATE material SET status='inativo' WHERE id_material = $id_material");
			
		}
		
	}
	header('Location: ConsultaInventario.php');
?>