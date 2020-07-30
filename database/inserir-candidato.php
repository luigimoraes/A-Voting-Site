<?php
	include('../classes/CandidatoDAO.php');
	require_once 'verifica-cpf.php';

  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $digito = $_POST['digito'];
  $partido = $_POST['partido'];
	$opcoesDeCargo = addslashes($_POST['cargo']);
 
	switch($opcoesDeCargo){
		case '1':
			$cargo = 1;
			break;
		case '2':
			$cargo = 2;
			break;
	}

	$candidato = new CandidatoDAO();
	$candidato->setNome($nome);
	$candidato->setCpf($cpf);
	$candidato->setDigito($digito);
	$candidato->setPartido($partido);
	$candidato->setCargo($cargo);

  $candidato->adicionar();
	header("Location:../candidato.php");
?>