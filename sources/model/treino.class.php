<?php
	require_once 'base.class.php';
	
	class treino extends base{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="treino";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idTreino"         => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idTreino";

		}// end construct
		//não deu certo colocar o mostrar aluno aqui
	}//end class Pessoa
?>
