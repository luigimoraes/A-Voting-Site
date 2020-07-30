<?php
	try {
		$conexao = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
	}catch(PDOException $erro) {
		echo $erro->getMessage();
	}
 
 	$digito = $_POST['digito'];

 	$buscaDigito = "SELECT digito FROM candidato WHERE digito=$digito";
 	
	$stmtBuscaDigito = $conexao->prepare($buscaDigito);
	$stmtBuscaDigito->execute();

 	if ($stmtBuscaDigito->rowCount()>0){
 		$buscaVotos = "SELECT votos FROM candidato WHERE digito=$digito";
 		$stmtBuscaVotos = $conexao->prepare($buscaVotos);
		$stmtBuscaVotos->execute();

		$resultados = $stmtBuscaVotos->fetchAll();
 		foreach($resultados as $r){
 			$r = $r['votos'] + 1;

 			$atualizacaoVoto = $conexao->prepare("UPDATE candidato SET votos=$i WHERE digito =$digito");
			$stmtAtualizacaoVoto->execute();

 			header("Location:../resultado.php");
 		}

 	} else {
 		echo "Error: candidato not registered";
 	}
?>