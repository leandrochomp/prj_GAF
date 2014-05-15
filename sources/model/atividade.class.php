<?php
	require_once 'base.class.php';
	
	class atividade extends base {
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="atividade";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idAtividade"  => NULL,
				"idCategoria"  => NULL,
				"nome"         => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idAtividade";

		}// end construct
		
		public static function MostraAtividades(){
			 $sql = 'select * from atividade';
			 $cmd = mysql_query($sql);
			 if (mysql_num_rows($cmd) > 0){
			    while ($row = mysql_fetch_array($cmd)){
			        	echo '<option value='.$row[0].'>'.$row[1].'</option>';
			    }
			}
		}

	}//end class Pessoa
?>
