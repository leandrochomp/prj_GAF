<!--
<script type="text/javascript">

function volta(){
	setTimeout("window.location='../verAlunos.php'", 4000);
}
</script>
-->
<?php
require_once 'base.class.php';
class treino extends base {
	public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="treino";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idTreino"          => NULL,
				"idAtividade"       => NULL,
				"idCategoriaAluno" => NULL,
				"idProfessor"       => NULL,
				"nome"     	        => NULL,
				"serie"             => NULL,
				"carga"             => NULL,
				"repeticao"         => NULL,
				"tempo"             => NULL,			
				);
			} else {
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idTreino";
		}// end construct	

	 public static function MostraTreino(){
		echo "<p>$this->_nome</p>";
		echo "<p>$this->_dtTreino</p>";
		echo "<p>$this->_carga</p>";
		echo "<p>$this->_serie</p>";
		echo "<p>$this->_repeticao</p>";
		echo "<p>$this->_idProfessor</p>";
	}
	
}	
	function inverteData($data){
      $ano = substr($data,6,4);
      $mes = substr($data,3,2);
      $dia = substr($data,0,2);
      $novaData =  $ano."/".$mes."/".$dia;
      return $novaData;
    }

	// Quando escrevi esse código só eu e Deus sabia o que fazia
	// ... agora só ele sabe
	
	// Não tente entender, é magia negra...

	//Pega valores selecionados do check box
	if(!empty($_POST['check_list'])){
		
		foreach ($_POST['check_list'] as $id) {

			$carga = $_POST["atividade_{$id}_carga"];
			$serie = $_POST["atividade_{$id}_serie"];
			$repeticao = $_POST["atividade_{$id}_repeticao"];


			$sql = sprintf(
				"INSERT INTO
					ATIVIDADE_TREINO
					(`nmTreino`, `idATIVIDADE`, `idALUNO`, `idPROFESSOR`, `dtTreino`, `carga`, `serie`, `repeticao`)
					VALUES ('%s', %s, %s, %s, '%s', %s, %s, %s);",
				 $_POST['txtTreino'], $id, $_POST['idAluno'], 1, "$dtTreino", $carga, $serie, $repeticao);

			
			$cmd = mysql_query($sql) or die (mysql_error());
		}

		
		exit('Ok!'); // Remover

		echo "<script>volta();</script>";
	}


	//$treino->MostraTreino();
	// TEMOS O NOSSO LADO NEGRO.
	
	/*

		// foreach ($_POST['check_list'] as $check) {
		// 	//echo $check."<br />";
		// 	//pega os valores de carga do checkbox selecionado
		// 		if(!empty($_POST['carga_list'])){
		// 			foreach ($_POST['carga_list'] as $carga) {
		// 				$cargaArray = array('carga' => $_POST['carga_list']);
		// 				//echo "Carga ".$carga."<br />";
		// 			}
		// 		//pega os valores de serie do checkbox selecionado
		// 		if(!empty($_POST['serie_list'])){
		// 			foreach ($_POST['serie_list'] as $serie) {
		// 				$serieArray = array('serie' => $_POST['serie_list']);
		// 				//echo "Serie ".$serie."<br />";;
		// 			}
		// 		}
		// 		//pega os valores de repeticao do checkbox selecionado
		// 		if(!empty($_POST['repeticao_list'])){
		// 			foreach ($_POST['repeticao_list'] as $repeticao) {
		// 				$repeticaoArray = array('repeticao' => $_POST['repeticao_list']);
		// 				//echo "repeticao ".$repeticao."<br />";;
		// 			}
		// 		}
		// 	}
		// }
		//$str = implode("", $_POST['check_list']);
		
			// while(!empty($_POST['check_list'])){
			// 	$sql ="insert into atividade_treino values (null, 'A',1,1,1,'2013-11-14','10','10','10')";
			// 	$cmd = mysql_query($sql);
			// }
	*/
?>

