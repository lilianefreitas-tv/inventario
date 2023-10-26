<?php
	require 'src/config.php';
	
	
	if(isset($_POST['update']))
	{
		
		$id_material = $_POST['id_material'];
		$data = $_POST['data'];
		$patrimonio = $_POST['patrimonio'];
		$local = $_POST['local'];
		$tipo = $_POST['tipo'];
		$marca = $_POST['marca'];
		$descricao = $_POST['descricao'];
		$mac = $_POST['mac'];
		$configuracao = $_POST['configuracao'];
		$manutencao = $_POST['manutencao'];
		$obs = $_POST['obs'];
		
			
		
		$sqlUpdate = mysqli_query($conexao,"UPDATE material SET  data='$data',patrimonio='$patrimonio',local='$local',tipo='$tipo',marca='$marca',descricao='$descricao',mac='$mac',configuracao='$configuracao',manutencao='$manutencao',obs='$obs'
		where id_material = '$id_material'");
		
			
		header('Location: ConsultaInventario.php');
		
	}
	
?>
