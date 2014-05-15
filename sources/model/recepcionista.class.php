<?php
	require_once 'pessoa.class.php';
	
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

		}// end construct
		//não deu certo colocar o mostrar aluno aqui
	}//end class Pessoa
?>
