<?php
	require_once 'pessoa.class.php';
	
	class professor extends pessoa{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="professor";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idPessoa"         => NULL,
				"nivel"      	   => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idProfessor";

		}// end construc
	}//end class Pessoa
?>
