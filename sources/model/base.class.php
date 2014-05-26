<?php
require_once 'teste.class.php';

abstract class base extends banco {
	//propriedades
	public $tabela         = "";
	public $campos_valores = array();
	public $campoPk        = NULL;
	public $valorPk        = NULL;
	public $extras_select  = "";
	
	//metodos
	//verifica o array e adiciona no array
	public function addCampo($campo = null, $valor = null){
		if($campo!=null){
			 $this->campos_valores[$campo] = $valor;
		}
	}//end addCampo
	
	public function dellCampo($campo){
		if(array_key_exists($campo,$this->campos_valores)){
			unset($this->campos_valores[$campo]);
		}
	}//end dellCampo
	
	public function setValue($campo = null, $valor = null){
		if($campo != null && $valor != null){
			 $this->campos_valores[$campo] = $valor;
		}
	}//end setValue
	
	public function getValue($campo){
		if($campo!= null && array_key_exists($campo,$this->campos_valores)){
			return $this->campos_valores;
		}else{
			return false;
		}
		
	}//end getValue
	
	public function getCod(){
		$sql = 'select max(idPESSOA)+1 from pessoa;';
		$cmd = mysql_query($sql);
		$exe = mysql_fetch_array($cmd);
		//var_dump($exe[0]);
		return $exe[0];
	}//end getCod


      public function getCodTreino(){
        $sql = 'select max(idTreino) from treino;';
        $cmd = mysql_query($sql);
        $exe = mysql_fetch_array($cmd);
        return $exe[0];
      }    //end getCodTreino


	function VerificaCPF($CPF){
    	$sltCPF = mysql_query("select CPF from pessoa where cpf = '$CPF'; ");
    		if (mysql_num_rows($sltCPF)>0) {
    			//echo 'CPF j� cadastrado';
                //echo '<p>CPF j� cadastrado</p>';
                echo "<p><font color='red' style='font-size:15px;'>CPF j&aacute; cadastrado</font></p>";
    			return true;
    		}
    		return false;
    	}//end function CPF

    	function VerificaEmail($email){
     		$sltEmail = mysql_query("select email from pessoa where email = '$email'; ");
    		if (mysql_num_rows($sltEmail)>0) {
    			//echo '<p>Email j� cadastrado</p>';
                echo "<p><font color='red' style='font-size:15px;'>Email j� cadastrado</font></p>";
    			//$msg = '<p>Email j� cadastrado</p>';
    			return true;
    		}else{
    			$msg = '';
    		}
    		return false;
    	}//end function email
    	
    	//sei la que eu to fazendo
    	public static function MostraCategoria(){
			$sql = "select * from categoria_aluno";
		}//end function MostraCategoria

}//end class
?>