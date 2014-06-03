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

		public static function MostraCategoria(){
			$todos = '
						select * from Categoria;
					 ';
	        $query       = mysql_query($todos);        	
	        	if($query > 0){
	        		 echo '<meta charset="utf8">';
	        		 echo '<table class="table">
							<thead>
								<tr>
									<th>Nome</th>
								</tr>
							</thead>
							<tbody>';
							while($info_categoria = mysql_fetch_array($query)){

								echo '<tr>
									<td>'.$info_categoria[1].'</td>
									<td class="buttons">
										<div class="button">
											<a href="editarCategoria.php?cod='.$info_categoria[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
										</div>
									</td>				
								</tr>
							</tbody>';

					echo '<ul class="list">
					<li class="list-item">
						<span class="list-description">Nome</span>
						<span class="list-name">'.$info_categoria[1].'</span>
					</li>
					<li>
						<div class="button">
							<a href="editarCategoria.php?cod='.$info_categoria[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
						</div>
					</li>
				</ul>';
			}
			echo '</table>';
			
			}else{
				
				echo '<p>Nenhum registro encontrado</p>';
			}
    
    	}//end function MostraCategoria

        public static function PreencheCategoria($codigo){
			$sql = 'select * from Categoria where idCategoria= '.$codigo.' ;
				';
			$cmd = mysql_query($sql)or die(mysql_error());
			if($cmd > 0 ){
				$linha = array();
				$row = mysql_fetch_array($cmd);
					global $nome;
					$nome  = $row[1];
					
					//echo $nome;
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheCategoria

		public function AtualizarCategoria($novoNome,$idCategoria){
		$sql ="update categoria set nome = '".$novoNome."' where idCategoria = ".$idCategoria.";";
		try{
			$cmd = mysql_query($sql)or die(mysql_error());
			//esta um echo por que no return não dá nada. Hue
			echo  'Categoria alterada com sucesso!!';
		}catch (Exception $e) {
			echo "Não foi possível alterar categoria : ",  $e->getMessage(), "\n";
		}	

	}//fim AtualizarCategoria



	}//end class Pessoa
?>
