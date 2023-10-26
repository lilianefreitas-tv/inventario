<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Etiqueta</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		
	<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		

	</head>
	<body>
		<br>
		<div id="impressao" class="seu-elemento">
			<div class="container col-sm-3"  data-target="#modalExemplo" name="modalExemplo" >
				<?php
					
					require_once "src/config.php";
					
					
					if (!empty($_GET['id']))
					{
						
						$id_material= $_GET['id'];
						$sqlSelect = "SELECT * FROM material where id_material = $id_material";
						$result = $conexao->query($sqlSelect);
						
						while($user_data = mysqli_fetch_assoc($result))
						{
							echo "
							<P><h6 align='center'><b> MINSTÉRIO PÚBLICO DO ESTADO DO PARÁ  <br>
							DEPARTAMENTO DE INFORMÁTICA</b></h6>
							Nº de Patrimônio: ".$user_data['patrimonio']."<br>
							Equipamento: ".$user_data['tipo']." - ".$user_data['marca']." - ".$user_data['descricao']."<BR>
							Localização: ".$user_data['local']."<BR>
							</P>
							";
						}
					}
				?>
			</div>
		</div>
		
		<div align="center">
			<!--<hr class="mb-2">-->
			<button   type="button" class="btn btn-primary" id="btnPrint" > Imprimir </button>
		</div>
		
		<!-- JavaScript (Opcional) -->
		<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
	 <script>
			const btnPrint=document.getElementById("btnPrint")
			
			btnPrint.addEventListener("click",(evt)=>{
			const conteudo = document.getElementById('impressao').innerHTML;
			
			let estilo = "<style>";
			
			estilo += "table {width: 100%; font: 15px Calibri;}";
			estilo += "table,th,td{border: solid 2px #888; border-collapse: collapse;";
			estilo += "padding: 4px 8px; text-align: center;}";
			estilo += "</style>";
			
			
			const win = window.open('','', 'height=700,width=700');
			
			
			win.document.write ('<html><head>');
			win.document.write ('<title>Impressão</title>');
			win.document.write (estilo);
			win.document.write ('</head>');
			win.document.write ('<body>');
			win.document.write (conteudo);
			win.document.write ('</body></html>');
			
			win.print();
			
			
			})
			
			
			</script>
		
		
		
		
	</body>
</html>




