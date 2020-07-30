<?php
	include_once 'Eleitor.php';
  require_once 'IPessoa.php';
    
	class EleitorDAO extends Eleitor implements IPessoa{
		function connectToDB(){
			try {
				$db = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		  return $db;
		}

		function adicionar(){
			$cpfSearchQuery = "SELECT cpf FROM eleitor WHERE cpf= :cpf";
			
			$cpfSearchStmt = self::connect()->prepare($cpfSearchQuery);
			$execQuery = $stmt->execute(array(':cpf' => $this->cpf));
			if($exec){
			 $voterInsertQuery = "INSERT INTO eleitor(cpf, nome, idade, titulo) VALUES(:cpf, :nome, :idade, :titulo)";

				$voterInsertStmt = self::connect()->prepare($voterInsertQuery);

				$voterInsertStmt->execute(array(
					':cpf' => $this->cpf,
					':nome' => $this->nome,
					':idade' => $this->idade,
					':titulo' => $this->titulo
				));
			} else {
				echo "Error";
			}
		}

		function remover(){
			$voterDeleteQuery = "DELETE FROM eleitor WHERE cpf= :cpf";
				
			$voterDeleteStmt = self::connect()->prepare($voterDeleteQuery);
			$voterDeleteStmt->execute(array(':cpf' => $this->cpf));
		}

		function alterar(){
			if($this->nome != NULL){
				$nameChangeQuery = "UPDATE eleitor SET nome= :nome WHERE cpf= :cpf";
				$nameChangeStmt = self::connect()->prepare($nameChangeQuery);
				$nameChangeStmt->execute(array(':cpf' => $this->cpf, ':nome' => $this->nome));

			} if($this->idade != NULL){
				$ageChangeQuery = "UPDATE eleitor SET idade= :idade WHERE cpf= :cpf";
				$ageChangeStmt = self::connect()->prepare($ageChangeQuery);
				$ageChangeStmt->execute(array(':cpf' => $this->cpf, ':idade' => $this->idade));

			} if($this->titulo != NULL){
				$registerChangeQuery = "UPDATE eleitor SET titulo= :titulo WHERE cpf= :cpf";
				$registerChangeStmt = self::connect()->prepare($registerChangeQuery);
				$registerChangeStmt->execute(array(':cpf' => $this->cpf, ':titulo' => $this->titulo));
			}
		}

		function buscar(){
			$selectByNameQuery = "SELECT * FROM eleitor WHERE nome= :nome";
			$selectByNameStmt = self::connect()->prepare($selectByNameQuery);
			$selectByNameStmt->execute(array(':nome' => $this->nome));

			if($selectByNameStmt->rowCount()>0){
				return $selectByNameStmt->fetchAll();
			} else {
				return 0;
			}
		}
	}
?>