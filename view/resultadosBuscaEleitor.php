<!DOCTYPE html>
<html lang="pt-br">
<head>
	<!-- CSS -->
	<script src="js/jquery-3.4.1.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="view/css/estilos.css" rel="stylesheet" media="screen">

	<meta charset="utf-8">
	<title>Inicio</title>
	<!-- JS -->
	<script src="js/bootstrap.js"></script>
	<?php include('../classes/EleitorDAO.php');
				$elei = new EleitorDAO(); 
		  $elei->setNome($_POST['busca']);
				$eleiArr = $elei->buscar();	?>
</head>

<body >
	<img src="img/logo.png" class="img-fluid center" width="100%">
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark" role="navigation">
		<div class="container-fluid">
			<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#itens">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="itens">
				<ul class="navbar-nav">
					<li class="nav-item">	<a href="../index.html" class="nav-link">Inicio</a> </li>
					<li class="nav-item">	<a href="../resultado.php" class="nav-link">Resultados</a> </li>
					<li class="nav-item">	<a href="../candidato.php " class="nav-link">Candidatos</a> </li>
					<li class="nav-item">	<a href="../eleitor.php" class="nav-link">Eleitor</a> </li>
				</ul>
			</div>

			<form class="form-inline my-2 my-lg-0" action="../database/buscar.php" method="POST" name="buscar">
      			<input class="form-control" type="busca" placeholder="Insira um nome...">
      			<button class="btn btn-outline-success" type="submit">Buscar</button>
    		</form>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="jumbotron">
					<h2>Resultados da Busca</h2>
					<p>Sua busca retornou:<p>
				<hr class="my-4">
	
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>CPF</th>
							<th>Nome</th>
							<th>Idade</th>
							<th>Titulo</th>
						</tr>
					</thead>

					<tbody>
						<?php
							if($eleiArr==0){
								?><p>0 resultados</p><?php 
							} else {
								foreach($eleiArr as $i):?>
									<tr><td><?php print $i['cpf']; ?></td>
										<td><?php print $i['nome']; ?></td>
										<td><?php print $i['idade']; ?></td>
										<td><?php print $i['titulo']; ?></td>
									</tr>
							<?php endforeach;
							} ?>
					</tbody>
						</table>
						 
					
				</div>
			</div>
		</div>
	</div> 

	<!-- Rodapé -->
		 <footer class="rodape">
			<center>
			<p>
				ARAÚJO,Lara 2019 - Todos os direitos reservados.
			</p>
			</center>
		</footer> 

</body>
</html>