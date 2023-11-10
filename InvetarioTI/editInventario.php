<?php
	require_once "home.php";
	require_once "src/config.php";
	
	if (!empty($_GET['id']))
	{
		
		$id_material = $_GET['id'];
		$sqlSelect = "SELECT * FROM material where id_material = $id_material";
		$result = $conexao->query($sqlSelect);
	
		if($result->num_rows > 0){
			
			while($userdata = mysqli_fetch_assoc($result))
				
			{
				
		$id_material = $userdata['id_material'];
		$data = $userdata['data'];
		$patrimonio = $userdata['patrimonio'];
		$cidade = $userdata['cidade'];
		$local = $userdata['local'];
		$tipo = $userdata['tipo'];
		$marca = $userdata['marca'];
		$descricao = $userdata['descricao'];
		$mac = $userdata['mac'];
		$ip = $userdata['ip'];
		$configuracao = $userdata['configuracao'];
		$manutencao = $userdata['manutencao'];
		$obs = $userdata['obs'];
				
			}
			
		}
		
	}	
	
?>

<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		
		
		<!-- Custom styles for this template -->
		<link href="form-validation.css" rel="stylesheet">
	</head>
	
	<body class="bg-light">
		<div class="container">
			<div class="py-4 text-center">
				<br> <br>
				<h2>Cadastro de Material</h2>
			</div>
		</div>
        <div class=" container col-md-6 order-md-1">
			<div class="py-3 text-left">
				<form class="needs-validation" novalidate action="saveEditInventario.php" method="POST" >
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="codigo">Código</label>
							<input type="text" class="form-control" name="codigo" id="codigo" placeholder="" value="<?php echo $id_material;?>" required readonly>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						
						<div class="col-md-4 mb-3">
							<label for="data">Data de entrada</label>
							<input type="text" class="form-control" name="data" id="data"  value="<?php echo $data;  ?>" readonly >
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cargo">Patrimônio</label>
							<input type="text" class="form-control" id="patrimonio" placeholder="" name="patrimonio" value="<?php echo $patrimonio;  ?>" required readonly>
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
						</div>
						
						<div class="col-md-3 mb-3" >
							<label  for="cidade" > Cidade</label>
							<select class="form-control" required name="cidade" id="cidade"  >
								<option > <?php echo $cidade ?></option>
								<?php 
									$resultcidade = mysqli_query($conexao,"select * FROM cidade");
									while ($dados = mysqli_fetch_assoc($resultcidade)){?>
									<option value= " <?php echo $dados ['descricao']; ?>">  <?php echo $dados['descricao'];?>  </option>
									<?php
									} ?>
							</select>
						</div>
						<div class="col-md-2 mb-3" >
							<label  for="local" >Local</label>
							<select class="form-control" required name="local" id="local" >
								<option ><?php echo $local;?></option>
								<option ></option>
								<?php 
									$resultlocal = mysqli_query($conexao,"select * FROM localizacao");
									while ($dados = mysqli_fetch_assoc($resultlocal)){?>
									<option value= " <?php echo $dados ['descricao']; ?>">  <?php echo $dados['descricao'];?>  </option>
									<?php
									} ?>
							</select>
						</div>
						
						
						<div class="col-md-4 mb-3" >
							<label  for="tipo" >Tipo de Material</label>
							<select class="form-control" required  readonly name="tipo" id="tipo" >
								<option ><?php echo $tipo;?></option>
								<option ></option>
								<?php 
									$resulttipo = mysqli_query($conexao,"select * FROM tipo");
									while ($dados = mysqli_fetch_assoc($resulttipo)){?>
									<option value= " <?php echo $dados ['descricao']; ?>">  <?php echo $dados['descricao'];?>  </option>
									<?php
									} ?>
							</select>
						</div>
						
						<div class="col-md-3 mb-3" >
							<label  for="tipo" >Marca</label>
							<select class="form-control" required readonly name="marca" id="marca" >
								<option ><?php echo $marca;?></option>
								<option ></option>
								<?php 
									$resultmarca = mysqli_query($conexao,"select * FROM marca");
									while ($dados = mysqli_fetch_assoc($resultmarca)){?>
									<option value= " <?php echo $dados ['descricao']; ?>">  <?php echo $dados['descricao'];?>  </option>
									<?php
									} ?>
							</select>
						</div>
						
						<div class="col-md-5 mb-3">
							<label for="descricao">Descrição</label>
							<div class="input-group">
								<input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $descricao  ?>" required>
								
							</div>
						</div>
						
						
						<div class="col-md-4 mb-3">
							<label for="mac">MAC</label>
							<input type="text" class="form-control" id="mac" placeholder=""  name="mac" value="<?php echo $mac  ?>" >
							
						</div>
						<div class="col-md-3 mb-3">
							<label for="ip">IP</label>
							<input type="text" class="form-control" id="ip" placeholder="" name="ip" value="<?php echo $ip  ?>" >
							<div class="invalid-feedback">
								
							</div>
						</div>
						
						
						<div class="form-group col-md-6 mb-3">
							<label for="configuracao">Configuração</label>
							<textarea class="form-control" id="configuracao" name="configuracao" rows="4"><?php echo $configuracao ?>  </textarea>
							
						</div>
						
						<div class="form-group col-md-6 mb-3">
							<label for="manutencao">Manutenção</label>
							<textarea class="form-control" id="manutencao" name="manutencao" rows="4" ><?php echo $manutencao ?> </textarea>
							
						</div>
						
						<div class="form-group col-md-12 mb-3">
							<label for="obs">OBS</label>
							<textarea class="form-control" id="obs" name="obs" rows="2" ><?php echo $obs ?></textarea>
							
						</div>
						
						
						</div>
						
						
						<hr class="mb-2">
						<div align="center" class="center">
					<input type="hidden" name="id_material" value="<?php echo $id_material?>">
					<input class="btn btn-primary btn-lg btn" type="submit" id="update" name="update" value="Salvar Alterações">
						
						
						
						</div>
					</form>
				
			</div>
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
				</body>
				</html>
								