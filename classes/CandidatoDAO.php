<?php

require_once 'Candidato.php';
require_once 'IPessoa.php';
    
class CandidatoDAO extends Candidato implements IPessoa{
	function connectToDB(){
		try {
			$db = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
		} catch (PDOException $error) {
			echo $error->getMessage();
		}
		return $db;
	}

	function adicionar(){
		$cpfSearchQuery = "SELECT cpf FROM candidato WHERE cpf= :cpf";
			
		$cpfSearchStmt = self::connectToDB()->prepare($cpfSearchQuery);
		$execQuery = $searchCpfStmt->execute(array(':cpf' => $this->cpf));
		if($execQuery){
			$candInsertQuery = "INSERT INTO candidato VALUES(:cargo, :nome, :partido, :digito, :votos, :cpf)";

			$candInsertStmt = self::connectToDB()->prepare($candInsertQuery);

			$candInsertStmt->execute(array(
				':cargo' => $this->cargo,
				':nome' => $this->nome,
				':partido' => $this->partido,
				':digito' => $this->digito,
				':votos' => 00,
				':cpf' => $this->cpf
			));
		} else {
			echo "Error";
		}
	}

	function remover(){
		$candDeleteQuery = "DELETE FROM candidato WHERE cpf= :cpf";

		$candDeleteStmt = self::connectToDB()->prepare($candDeleteQuery);
		$candDeleteStmt->execute(array(':cpf' => $this->cpf));
	}

	function alterar(){
		if($this->nome != NULL){
			$candNameChangeQuery = "UPDATE candidato SET nome= :nome WHERE cpf= :cpf";
			$candNameChangeStmt = self::connectToDB()->prepare($candNameChangeQuery);
			$candNameChangeStmt->execute(array(':cpf' => $this->cpf, ':nome' => $this->nome));

		} if($this->digito != NULL){
			$candDigitChangeQuery = "UPDATE candidato SET digito= :digito WHERE cpf= :cpf";
			$candDigitChangeStmt = self::connectToDB()->prepare($candDigitChangeQuery);
			$candDigitChangeStmt->execute(array(':cpf' => $this->cpf, ':digito' => $this->digito));

		} if($this->partido != NULL){
		  $candPartChangeQuery = "UPDATE candidato SET partido= :partido WHERE cpf= :cpf";
				$candPartChangeStmt = self::connectToDB()->prepare($candPartChangeQuery);
				$candPartChangeStmt->execute(array(':cpf' => $this->cpf, ':partido' => $this->partido));

			}
	}

	function buscar(){
		$selectByNameQuery = "SELECT * FROM candidato WHERE nome= :nome";
		$selectByNameStmt = self::connectToDB()->prepare($selectByNameQuery);
		$selectByNameStmt->execute(array(':nome' => $this->nome));

		if($stmtSelect->rowCount()>0){
			return $selectByNameStmt->fetchAll();
		} else {
			return 0;
		}
	}
}
?>