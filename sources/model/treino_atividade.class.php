<?php
	require_once 'base.class.php';
	
	class treino_atividade extends base{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="treino_atividade";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idTreino_atv"         => NULL,
				"idTREINO"             => NULL,
				"idATIVIDADE"          => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idTreino_atv";

		}// end construct
		//não deu certo colocar o mostrar aluno aqui
	}//end class Pessoa
?>
