<?php
    require_once "home.php";
	include_once 'src/conexao.php';
?>	
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Meta tags Obrigatórias -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
	</head>
	<body>
		
		
		<br><br><br><br>
		<div align="center" class=" container col-md-5">
			<h2 align="center"> Relatório de Material do Inventário</h2>
			<br>
			
			
			<!-- Início do formulário pesquisar entre datas -->
			<form method="POST" action="" >
				
				<div class="row justify-content-md-center">
					<?php
						// Manter os dados no formulário
						$cidade = "";
						if (isset($dados['cidade'])) {
							$cidade = $dados['cidade'];
						}
					?>
					<div class="col-md-3 mb-3">
						<label  for="cidade" >Cidade:</label>
						<select class="form-control" required name="cidade" id="cidade" >
							<option></option>
							<?php 
								$resultcidade = mysqli_query($conexao,"select * FROM cidade");
								while ($dados = mysqli_fetch_assoc($resultcidade)){?>
								<option value= " <?php echo $dados ['descricao']; ?>">  <?php echo $dados['descricao'];?>  </option>
								<?php
								} ?>
						</select>
						
					</div>
					
				</div>
				
				<div align="center" class="container col-md-5">
					<input class="btn btn btn-primary" type="submit" value="Pesquisar" name="PesqEntreData">
				</div>
				
			</form>
			<!-- Fim do formulário pesquisar entre datas -->
		</div>
		
		<br>
		
		<div class=" container col-md-5">
			<?php
				// Receber os dados do formulário
				$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				
				// Apresentar o botão gerar excel somente quando o usuário pesquisar entre datas
				if ((isset($dados['cidade'])) ) {
					
					echo"<div class='modal-footer'>
					
					
					<button   type='button' class='btn btn-primary' id='btnPrint' > Imprimir
					<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-printer' viewBox='0 0 16 16'>
					<path d='M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z'/>
					<path d='M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z'/>
					</svg>  </button>
					
					";
					
					echo "<a class='btn btn btn-primary' href='gerar_excel.php?cidade=" . $dados['cidade'] ."'>Exportar busca para Excel</a><br><br>
					
					</div>";
				}
				
			?>
			
			<?php
				
				echo "<div id='impressao'>";
				// Verifica se o usuário clicou no botão
				if (!empty($dados['PesqEntreData'])) {
					
					// QUERY sql para pesquisar entre datas
					$query_datas = "SELECT *
					FROM material
					
					WHERE :cidade IS NULL or cidade = :cidade  ";
					// Preparar a QUERY com PDO
					$result_datas = $conn->prepare($query_datas);
					
					// Substituir o link da QUERY usando bindParam
					$result_datas->bindParam(':cidade', $dados['cidade']);
					
					
					// Executar a QUERY com PDO
					$result_datas->execute();
					
					
					
					// Verificar se encontrou algum registro no banco de dados com PHP e acessar o IF
					if (($result_datas) and ($result_datas->rowCount() != 0)) {
						
						// Ler os registros que vem do banco de dados
						while ($row_datas = $result_datas->fetch(PDO::FETCH_ASSOC)) {
							
							extract($row_datas);
							// Converter a data para o formato brasileiro
							
							echo "Data de Cadastro: " . date('d/m/Y', strtotime($data)) . "<br>";
							echo "Nº de Patrimônio: $patrimonio<br>";
							echo "Tipo: $tipo<br>";
							echo "Marca: $marca<br>";
							echo "Descrição: $descricao<br>";
							echo "Cidade: $cidade<br>";
							echo "Mac: $mac<br>";
							echo "IP: $ip<br>";
							echo "<hr class='mb-2'>";
						}
						} else { // Acessa o ELSE quando não encontrar nenhum registro
						echo "<p style='color: #f00;'>Erro: Nenhum registro encontrado!</p>";
					}
				}
				
			?>
			
		</div>
		
		
	</body>
	
	
	
	<script>
		const btnPrint=document.getElementById("btnPrint")
		
		btnPrint.addEventListener("click",(evt)=>{
			const conteudo = document.getElementById('impressao').innerHTML;
			
			let estilo = "<style>";
			
			estilo += "table {width: 100%; font: 15px Arial;}";
			estilo += "table,th,td{border: solid 2px #888; border-collapse: collapse;";
			estilo += "padding: 4px 8px; text-align: center;}";
			estilo += "</style>";
			
			
			const win = window.open('','', 'height=700,width=700');
			
			
			win.document.write ('<html><head>');
			win.document.write ('<img src="img/novaLogomarca.png" width="100" height="50">');	
			win.document.write('<h4 align="center">Relatório por Promotoria</h4>');
			win.document.write('<p align="center">Cidade:<?php echo $dados['cidade'] ?> </p>');
			win.document.write ('<title>Impressão</title>');
			win.document.write (estilo);
			win.document.write ('</head>');
			win.document.write ('<body>');
			win.document.write (conteudo);
			win.document.write ('</body></html>');
			
			win.print();
			
			
		})
		
		
	</script>
	
	
</html>					