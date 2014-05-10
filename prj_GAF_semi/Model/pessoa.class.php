<?php
	require_once 'Model/base.class.php';
	
	 class pessoa extends base{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="pessoa";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idPerfil"     => NULL,
				"nome"         => NULL,
				"CPF"          => NULL,
				"email"        => NULL,
				"telefone"     => NULL,
				"celular"      => NULL,
				"sexo"         => NULL,
				"status"       => NULL,
				"dtNascimento" => NULL,
				"login"        => NULL,
				"senha"        => NULL,
				"dtCadastro"   => NULL	
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idPessoa";
		}// end construc
		
		
		
		
	}//end class Pessoa
?>