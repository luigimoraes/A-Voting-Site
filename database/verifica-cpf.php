<?php
	try {
		$conexao = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
	}catch (PDOException $erro) {
		echo $erro->getMessage();
	}
 
	$cpf = $_POST['cpf'];
	$buscaCpf = "SELECT cpf FROM eleitor WHERE cpf=$cpf";

	$stmtBuscaCpf = $conexao->prepare($buscaCpf);
	$stmtBuscaCpf->execute();

	try{
		if($stmtBuscaCpf->rowCount()>0){
			header("Location:../view/votar.html");
		}
	} catch(PODException $erro){
			echo $erro;
	}
?>