<?php
	require_once 'base.class.php';
	
	class treino extends base{
		public function __construct($campos = array()){
			parent::__construct();
			$this->tabela="treino";
			if(sizeof($campos) <= 0){
				$this->campos_valores = array(
				"idTreino"         => NULL
				);
			}else{
				$this->campos_valores = $campos;
			}
			$this->campoPk = "idTreino";

		}// end construct

		public static function MostraTreinoAluno($prCodigo){
			$sql = 'select t.idTREINO, p.nome, t.nome from treino t
						INNER JOIN treino_aluno ta
						on t.idTREINO = ta.TREINO_idTREINO						
						inner join aluno al
						on ta.ALUNO_idALUNO = al.idALUNO
						inner join pessoa p
						on al.idPESSOA= p.idPESSOA										
						where al.idPESSOA ='. $prCodigo;

			$cmd = mysql_query($sql);
	        if (mysql_num_rows($cmd) > 0){
	        	while ($row = mysql_fetch_array($cmd)){	            	        		
	        		echo "<div class='divTreinoAluno'><strong>" . $row[2] . "</strong>";
        			$sql2 = 'select * from atividade
						inner join treino_atividade
						on atividade.idATIVIDADE = treino_atividade.idATIVIDADE
						where treino_atividade.idTREINO ='. $row[0];

					$cmd2 = mysql_query($sql2);
        			if (mysql_num_rows($cmd2) > 0){
        				echo "<ul class='ulTreinoAluno'>";
        				while ($row2 = mysql_fetch_array($cmd2)){
					          echo "<li>".$row2[2]."</li>";
						}
						echo "</ul>";

					}	     
					echo "</div>";
	            }
	        }

		}//endMostrTreinoAluno

	public static function MostraTreino(){
		$todos = '
					select * from Treino;
				 ';
        $query       = mysql_query($todos);        	
        	if($query > 0){
        		 echo '<meta charset="utf8">';
        		 echo '<table class="table">
						<thead>
							<tr>
								<th>Nome do Treino</th>
							</tr>
						</thead>
						<tbody>';
						while($info_treino = mysql_fetch_array($query)){

							echo '<tr>
								<td>'.$info_treino[1].'</td>
								<td class="buttons">
									<div class="button">
										<a href="editarTreino.php?cod='.$info_treino[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
									</div>
								</td>				
							</tr>
						</tbody>';

				echo '<ul class="list">
				<li class="list-item">
					<span class="list-description">Nome</span>
					<span class="list-name">'.$info_treino[1].'</span>
				</li>
					<div class="button">
						<a href="editarTreino.php?cod='.$info_treino[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
					</div>
				</li>
			</ul>';
		}
		echo '</table>';
		
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraAtividade
	}//end class Pessoa
?>
