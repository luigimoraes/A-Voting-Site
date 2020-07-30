<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatos</title>
    
    <link rel="stylesheet" type="text/css" href="view/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
	  <?php
	    try {
				$con = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
	  ?>
  </head>

  <body>
	  <img id="logo" src="view/img/logo.png" class="img-fluid center" width="100%" alt="logotipo">
	  <nav class="navbar navbar-expand-sm navbar-dark bg-dark" role="navigation">
	  	<div class="container-fluid">
		  	<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#itens">
		  		<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="itens">
		  		<ul class="navbar-nav">
				  	<li class="nav-item">	<a href="index.html" class="nav-link">Inicio</a> </li>
				  	<li class="nav-item">	<a href="resultado.php" class="nav-link">Resultados</a> </li>
				  	<li class="nav-item">	<a href="candidato.php " class="nav-link">Candidatos</a> </li>
			  		<li class="nav-item">	<a href="eleitor.php" class="nav-link">Eleitor</a> </li>
			  	</ul>
		  	</div>
		  </div>
	  </nav>

	  <div class="container">
	  	<div class="row">
		  	<div class="col-12 col-md-12">
			  	<div class="jumbotron">
				  	<div class="row">
				  		<h2>Lista de Candidatos</h2>
						
				  		<form>
					  		<div class="form-group row">
					  			<div class="col">
				  					<input type="search" class="form-control" name="busca" placeholder="Insira um nome...">
							  	</div>
								
						  		<button type="submit" class="btn btn-success" name="btnBusca">Buscar</button>
						  	</div>
					  	</form>
				  	</div>
				  	<hr class="my-4">

				  	<table class="table table-hover text-center">
				  		<thead>
					  		<tr>
					  			<th>Digito</th>
				  				<th>Nome</th>
				  				<th>Partido</th>
						  		<th colspan="2">Operacoes</th>
					  		</tr>
				  		</thead>
					  	<tbody>
					  		<?php $selectCand = $con->prepare("SELECT * FROM candidato");
											$selectCand->execute();
											$candRecords = $selectCand->fetchAll();	
								      foreach($candRecords as $i): ?>
						  	<tr>
							  	<td name="cpfDel"><?php printf("%d", $i['digito']); ?></td>

							  	<td><?php printf("%s", $i['nome']); ?></td>
					  			<td><?php printf("%s", $i['partido']); ?></td>
						  		<td><a class="btn btn-warning" href="view/editar-candidato.html">Alterar</a></td>
								</tr>

						    <?php endforeach; ?>
					  	</tbody>
		        </table>

		      	<hr class="my-4">
			  		<form action="database/remover-candidato.php" method="POST">
			  			<label>Deletar</label>
			  			<input type="number" class="form-control" name="deletar" placeholder="cpf">
				  		<button type="submit" class="btn btn-danger" name="delCand">Remover</button>
				  	</form>
			  	</div>
		  	</div>
		  </div>
	  </div>

    <script type="text/javascript" src="view/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="view/js/bootstrap.js"></script>
    <script type="text/javascript" src="view/js/script.js"></script>
  </body>
</html>