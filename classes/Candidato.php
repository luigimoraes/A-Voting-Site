<?php

require_once 'Pessoa.php';

class Candidato extends Pessoa{
		private $digito;
		private $partido;
		private $cargo;

		public function getDigito(){
			return $this->digito;
		}

		public function setDigito($digito){
			$this->digito = $digito;
		}

		public function getPartido(){
			return $this->partido;
		}

		public function setPartido($partido){
			$this->partido = $partido;
		}

		public function getCargo(){
			return $this->cargo;
		}

		public function setCargo($cargo){
			$this->cargo = $cargo;
		}
	}

?>