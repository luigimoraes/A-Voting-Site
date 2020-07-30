<?php
   include("../classes/CandidatoDAO.php");
    
   try{
					$db = new PDO('mysql:host=localhost; dbname=sisteleitoral', 'u0_a715', '');
   }catch(PDOException $erro){
     echo $erro->getMessage();
   }

			$candidato = new CandidatoDAO();
    
			$candCpf = $_POST['cpfAlter'];
  	$cpfSearchQuery = "SELECT cpf FROM candidato WHERE cpf=$cpf";
  	$cpfSearchStmt = $db->prepare($cpfSearchQuery);
			$cpfSearchStmt->execute();

			if($cpfSearchStmt->rowCount()>0){
				$oldNome = $_POST['nomeAlter'];
				$oldDigito = $_POST['digitoAlter'];
				$oldPartido = $_POST['partidoAlter'];

			 $candidato->setNome($oldNome);
				$candidato->setCpf($candCpf);
				$candidato->setDigito($oldDigito);
				$candidato->setPartido($oldPartido);

				$candidato->alterar();
				header("Location:../candidato.php");
			}
?>