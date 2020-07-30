<?php
    include("../classes/EleitorDAO.php");
    
    try{
      $db = new PDO('mysql:host=localhost; dbname=sisteleitoral', 'u0_a715', '');
    }catch(PDOException $erro){
      echo $erro->getMessage();
    }

				$eleitor = new EleitorDAO();
    
				$cpf = $_POST['cpfAlter'];
   	$cpfSearchQuery = "SELECT cpf FROM eleitor WHERE cpf=$cpf";
				$cpfSearchStmt = $db->prepare($cpfSearchQuery);
   	$cpfSearchStmt->execute();

				try{
					if($stmtBuscaCpf->rowCount()>0){
						$nome = $_POST['nomeAlter'];
						$idade = $_POST['idadeAlter'];
						$titulo = $_POST['tituloAlter'];

						$eleitor->setNome($nome);
						$eleitor->setCpf($cpf);
						$eleitor->setIdade($idade);
						$eleitor->setTitulo($titulo);

						$eleitor->alterar();
						header("Location:../eleitor.php");
					}
				}catch(PDOException $erro){
					echo $erro;
				}
?>