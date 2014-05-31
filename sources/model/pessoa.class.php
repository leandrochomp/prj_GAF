<?php
	require_once 'base.class.php';
	
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
                
        public static function validaLogin($login, $senha){                   
            $consulta = mysql_query("SELECT * FROM pessoa order by idPESSOA");
                                                    
            while ($pessoa = mysql_fetch_array($consulta)){                        
                if (($pessoa['login'] == $login) && ($pessoa['senha'] == $senha)){
                	$retorno = array($pessoa['idPERFIL'], $pessoa['idPESSOA'], $pessoa['nome']);
                    return $retorno;
                }
            }                    
            return NULL;
        }
       
       	public static function usuarioLogado(){
            if($_SESSION['id'] == NULL){
            	return false;	
            } else {
            	return true;
            }                                                                    
            
        }
     }//end class Pessoa
?>