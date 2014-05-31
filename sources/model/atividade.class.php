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
				"nome"         => NULL,
				"serie"        => NULL,
				"carga"        => NULL,
				"repeticao"    => NULL,
				"tempo"        => NULL,
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

	public static function MostraAtividade(){
		$todos = '
					select * from Atividade;
				 ';
        $query       = mysql_query($todos);        	
        	if($query > 0){
        		 echo '<meta charset="utf8">';
        		 echo '<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Serie</th>
								<th>Carga</th>
								<th>Repeti&ccedil;&atilde;o</th>
							</tr>
						</thead>
						<tbody>';
						while($info_atividade = mysql_fetch_array($query)){

							echo '<tr>
								<td>'.$info_atividade[2].'</td>
								<td>'.$info_atividade[3].'</td>
								<td>'.$info_atividade[4].'</td>
								<td>'.$info_atividade[5].'</td>
								<td class="buttons">
									<div class="button">
										<a href="editarAtividade.php?cod='.$info_atividade[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
										<a href="cadastrarAtividade.php"class="glyphicon glyphicon-plus-sign" title="adicionar"></a>
										<a href="excluirAtividade.php?cod='.$info_atividade[0].'" class="glyphicon glyphicon-trash" title="excluir"></a>
									</div>
								</td>				
							</tr>
						</tbody>';

				echo '<ul class="list">
				<li class="list-item">
					<span class="list-description">Nome</span>
					<span class="list-name">'.$info_atividade[2].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Serie</span>
					<span class="list-name">'.$info_atividade[3].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Carga</span>
					<span class="list-name">'.$info_atividade[4].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Repeti&ccedil;&atilde;o</span>
					<span class="list-name">'.$info_atividade[5].'</span>
					</li>
				<li>
					<div class="button">
						<a href="editarAtividade.php?cod='.$info_atividade[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
						<a href="cadastrarAtividade.php"class="glyphicon glyphicon-plus-sign" title="adicionar"></a>
						<a href="excluirAtividade.php?cod='.$info_atividade[0].'" class="glyphicon glyphicon-trash" title="excluir"></a>
					</div>
				</li>
			</ul>';
		}
		echo '</table>';
		
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraAtividade

    public static function PreencheAtividade($codigo){
			$sql = 'select * from Atividade where idAtividade= '.$codigo.' ;
				';
			$cmd = mysql_query($sql)or die(mysql_error());
			if($cmd > 0 ){
				$linha = array();
				$row = mysql_fetch_array($cmd);
					global $nome, $serie, $carga, $repeticao, $peso, $tempo;
					$nome       = $row[2];
					$serie      = $row[3];
					$carga      = $row[4];
					$repeticao  = $row[5];
					$tempo      = $row[6];
					
					//echo $nome;
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheAtividade

	}//end class Pessoa
?>
