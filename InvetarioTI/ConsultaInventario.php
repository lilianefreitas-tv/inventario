<?php
    require_once "home.php";
	
    if (!empty($_GET['search'])) {
        $data = $_GET['search'];
        $sql = "SELECT * FROM material WHERE id_material LIKE '%$data%' or patrimonio LIKE '%$data%' or local LIKE '%$data%' or tipo LIKE '%$data%' or cidade LIKE '%$data%' or ip LIKE '%$data%' or marca LIKE '%$data%'";
		} else {
		
		$sql = "SELECT * FROM material  WHERE status NOT IN ('inativo') ORDER BY data DESC";
	}
	
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		
		
		<!--Estilo da caixa de pesquisa-->
		<style>
			.box-search {
            display: flex;
            justify-content: center;
            gap: .1%;
			}
		</style>
		<!--Fim Estilo da caixa de pesquisa-->
	</head>
	
	<body>
		<br><br><br><br>
		
		<h3 align="center">Consulta de Inventário</h3>
		
		<div class="container col-md-12 order-md-1">
			
			<div class="box-search">
				<input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
				<button onclick="searchData()" class="btn btn-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				</button>
			</div>
			<br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col" class="col-1">Patrimônio</th>
						<th scope="col" class="col-1">Tipo</th>
						<th scope="col" class="col-1">Marca</th>
						<th scope="col" class="col-2">Descrição/Modelo</th>
						<th scope="col" class="col-2">Cidade</th>
						<th scope="col" class="col-2">Localização</th>
						<th scope="col" class="col-1">IP</th>
						<th scope="col" class="col-2">Ações</th>
					</tr>
				</thead>
				<tbody>
					<div class="printable">
						<?php
							
							while ($user_data = mysqli_fetch_assoc($result)) { 
								echo "<tr>";
								echo "<td>".$user_data['patrimonio']."</td>";
								echo "<td>".$user_data['tipo']."</td>";
								echo "<td>".$user_data['marca']."</td>";
								echo "<td>".$user_data['descricao']."</td>";
								echo "<td>".$user_data['cidade']."</td>";
								echo "<td>".$user_data['local']."</td>";
								echo "<td>".$user_data['ip']."</td>";
								echo "<td>
								
								<button type='button' title='Detalhes' class='btn btn-sm btn-info' data-toggle='modal' data-target='#modalExemplo".$user_data['id_material']."' >
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'>
								<path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/>
								</svg>
								</button>
								<a class='btn btn-sm btn-primary' href='editInventario.php?id=$user_data[id_material]' title='Editar'>
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
								<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
								</svg>
								</a> 
								<a class='btn btn-sm btn-warning' href='baixaInventario.php?id=$user_data[id_material]' title='Inativar Patrimônio'>
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag-x' viewBox='0 0 16 16'>
								<path fill-rule='evenodd' d='M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z'/>
								<path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
								</svg>
								</a>
								
								
								<a class='btn btn-sm btn-danger' href='deleteInventario.php?id=$user_data[id_material]' title='Deletar'>
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
								<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
								<path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
								</svg>
								</a>
								
								</td>";
								echo "</tr>";
								
								// Modal correspondente para este item
								echo "
								<div id='impressao'>
								<div class='modal fade' id='modalExemplo".$user_data['id_material']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
								<div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
								<div class='modal-content'>
								<div class='modal-header'>
								<h4 class='modal-title text-center' id='exampleModalLabel'>Detalhes do Patrimônio: <b> ".$user_data['patrimonio']." </b> </h4>
								<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
								<span aria-hidden='true'>&times;</span>
								</button>
								</div>
								<div class='modal-body'>
								
								
								<p>Data de Cadastro: ".date('d/m/Y',strtotime ($user_data['data']))."<br>
								Nº de Patrimonio: ".$user_data['patrimonio']."<br>
								Tipo: ".$user_data['tipo']."<br>
								Marca: ".$user_data['marca']."<br>
								Descrição: ".$user_data['descricao']." <br>
								MAC: ".$user_data['mac']." <br>
								IP: ".$user_data['ip']." <br>
								Cidade: ".$user_data['cidade']."<br>
								Localização: ".$user_data['local']."<br>
								Configuração: ".$user_data['configuracao']."<br>
								Manutenção: ".$user_data['manutencao']."<br>
								Obs.: ".$user_data['obs']."<br></p>
								
								</div>
								
								<div class='modal-footer'>
								<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
								<a class='btn btn btn-primary' target='_blank' href='imprimir.php?id=$user_data[id_material]'' title='Imprimir'> Etiqueta
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-printer' viewBox='0 0 16 16'>
								<path d='M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z'/>
								<path d='M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z'/>
								</svg>
								</a>
								</div>
								</div>
								</div>
								</div>
								</div>
								
								";
							}
						?>
					</div>
				</tbody>
			</table>
			
		</div>
		
		<footer class="my-1 pt-3 text-muted text-center text-small">
			<p class="mb-1">Ministério Público do Estado do Pará &copy; 2023</p>
			<p align="center">Usuário Logado: <?php echo  $logado ?> </p>
		</footer>
		
		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
		
		<script>
			var search = document.getElementById('pesquisar');
			
			search.addEventListener("keydown", function(event) {
				if (event.key === "Enter") 
				{
					searchData();
				}
			});
			
			function searchData()
			{
				window.location = 'ConsultaInventario.php?search='+search.value;
			}
		</script>
		
		
		
		
		<script>
			function imprimir(){
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
					win.document.write ('<title>Impressão</title>');
					win.document.write (estilo);
					win.document.write ('</head>');
					win.document.write ('<body>');
					win.document.write (conteudo);
					win.document.write ('</body></html>');
					
					win.print();
					
					
				})}
				
				
		</script>
		
		
	</body>
</html>																											