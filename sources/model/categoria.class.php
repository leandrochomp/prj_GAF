<?php
	require_once 'base.class.php';
	
	class categoria extends base {
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="categoria";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idCategoria"  => NULL,
				"nome"         => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idCategoria";

		}// end construct

		public static function MostraGrupoMuscular(){
			 $sql = 'select * from categoria';
			 $cmd = mysql_query($sql);
			 if (mysql_num_rows($cmd) > 0){
			    while ($row = mysql_fetch_array($cmd)){
			        	echo '<option value='.$row[0].'>'.$row[1].'</option>';
			    }
			}
		}
	}//end class Pessoa
?>
