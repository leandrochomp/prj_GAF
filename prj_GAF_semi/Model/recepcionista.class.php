<?php
	require_once 'Model/pessoa.class.php';
	
	class recepcionista extends pessoa{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="recepcionista";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idPessoa"         => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idRecepcionista";

		}// end construc
	}//end class Pessoa
?>
