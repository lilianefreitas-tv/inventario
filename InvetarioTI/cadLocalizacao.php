<?php
	require "home.php";
	require "src/config.php";
	
	if (isset($_POST['submit']))
	{
        include "src/config.php";
		$id_local = $_POST['id_local'];
		$descricao = $_POST['descricao'];
		
			
		$result = mysqli_query($conexao, "INSERT INTO localizacao (id_local,descricao) VALUES (null,'{$descricao}')");
		
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
				<h2>Cadastro de Localização</h2>
			</div>
		</div>
        <div class=" container col-md-6 order-md-1" >
			<div class="py-3 text-left">
				<form class="needs-validation" novalidate action="cadLocalizacao.php" method="POST" >
					<div class="row">
						<div class="col-md-2 mb-3">
							<label for="codigo">Código</label>
							<input type="text" class="form-control" name= "codigo" id="codigo" placeholder="" value="" required readonly>
						</div>
						<div class="col-md-10 mb-3">
							<label for="Descricao">Localização</label>
							<input type="text" class="form-control" name= "descricao" id="descricao" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						
											
					</div>
					
					<hr class="mb-2">
					<div align="center" class="center">
					<input class="btn btn-primary btn-lg btn" type="submit" name="submit" value="Salvar">
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
