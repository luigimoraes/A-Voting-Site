<?php
	include_once 'Pessoa.php';

	class Eleitor extends Pessoa {
		private $titulo;

		public function getTitulo(){
			return $this->titulo;
		}

		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
	}

?>