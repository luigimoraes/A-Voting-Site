<?php
	include_once 'Eleitor.php';
 require_once 'IPessoa.php';
    
	class EleitorDAO extends Eleitor implements IPessoa{
		function connect(){
			try {
				$con = new PDO('mysql:host=localhost; dbname=sisteleitoral', "root", "");
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

				return $con;
		}

//funções C R U D
		function adicionar(){
			$verify = "SELECT cpf FROM eleitor WHERE cpf= :cpf";
			
			$stmt = self::connect()->prepare($verify);
			$exec = $stmt->execute(array(':cpf' => $this->cpf));
			if($exec){
					$query = "INSERT INTO eleitor(cpf, nome, idade, titulo) VALUES(:cpf, :nome, :idade, :titulo)";

					$stmt = self::connect()->prepare($query);

					$stmt->execute(array(
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
				$query = "DELETE FROM eleitor WHERE cpf= :cpf";
				
				$stmt = self::connect()->prepare($query);
				$stmt->execute(array(':cpf' => $this->cpf));
		}

		function alterar(){
			if($this->nome != NULL){
					echo "nome done";
					$query = "UPDATE eleitor SET nome= :nome WHERE cpf= :cpf";
					$stmt = self::connect()->prepare($query);
					$stmt->execute(array(':cpf' => $this->cpf, ':nome' => $this->nome));

			} if($this->idade != NULL){
				echo "idade done";
					$query = "UPDATE eleitor SET idade= :idade WHERE cpf= :cpf";
					$stmt = self::connect()->prepare($query);
					$stmt->execute(array(':cpf' => $this->cpf, ':idade' => $this->idade));

			} if($this->titulo != NULL){
				echo "titulo done";
					$query = "UPDATE eleitor SET titulo= :titulo WHERE cpf= :cpf";
					$stmt = self::connect()->prepare($query);
					$stmt->execute(array(':cpf' => $this->cpf, ':titulo' => $this->titulo));

			}
		}

		function buscar(){
			$stmt = self::connect()->prepare("SELECT * FROM eleitor WHERE nome = :nome");
			$stmt->execute(array(':nome' => $this->nome));

			if($stmt->rowCount()>0){
				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			} else {
				return 0;
			}
		}
	}

?>