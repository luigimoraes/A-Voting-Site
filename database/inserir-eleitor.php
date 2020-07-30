<?php
	include('../classes/EleitorDAO.php');
	require_once 'verifica-cpf.php';

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$cpf = $_POST['cpf'];
	$titulo = $_POST['titulo'];

	$eleitor = new EleitorDAO();
	$eleitor->setNome($nome);
	$eleitor->setCpf($cpf);
	$eleitor->setIdade($idade);
	$eleitor->setTitulo($titulo);

	$eleitor->adicionar();
	header("Location:../eleitor.php");
?>