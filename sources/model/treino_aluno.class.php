<?php
	require_once 'base.class.php';
	
	class treino_aluno extends base{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="treino_aluno";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"TREINO_idTreino" => NULL,
				"ALUNO_idAluno"   => NULL,
				"dtTreino"        => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "TREINO_idTreino";

		}// end construct
		//não deu certo colocar o mostrar aluno aqui
	}//end class Pessoa
?>
