<?php
	require_once 'Model/pessoa.class.php';
	
	class aluno extends pessoa{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="aluno";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idPessoa"     => NULL,
				"idCategoria"  => NULL,
				"peso"         => NULL,
				"altura"       => NULL,
				"peito"        => NULL,
				"cintura"      => NULL,
				"quadril"      => NULL,
				"braco"        => NULL,
				"coxa"         => NULL,
				"matricula"    => NULL,
				"senha"        => NULL,
				"dtCadastro"   => NULL	
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idAluno";

		}// end construc
                
              public static function MostraCategoria(){
                                    $sql   = 'select * from categoria_aluno';
                                    $cmd = mysql_query($sql)  ;
                                    if (mysql_num_rows($cmd) > 0){
                                        while ($row = mysql_fetch_array($cmd)){
                                            echo '<option value='.$row[0].'>'.$row[1].'</option>'      ;
                                        }
                                    }
              }
                
	}//end class Pessoa
?>
