<?php

abstract class banco{
    //propriedades
    public $servidor       = "localhost";
    public $usuario        = "root";
    public $senha          = "";
    public $db             = "academia";
    public $conexao        = NULL;
    public $dataset        = NULL;
    public $linhasafetadas = -1;
    
    //metodos de banco
    public function __construct() {
        //toda vez que eu chamo um objeto eu crio a conexao!
        $this->conecta();
    }//end construct
    
    public function __destruct(){
        if($this->conexao != NULL ): mysql_close($this->conexao);
        endif;

    }// end destruct
    public function conecta(){
        $this->conexao = mysql_connect($this->servidor,$this->usuario,$this->senha,TRUE)
        or die($this->TrataErro(__FILE__, __FUNCTION__, mysql_errno(), mysql_error, true));
        mysql_select_db($this->db)or die($this->TrataErro(__FILE__, __FUNCTION__, mysql_errno(), mysql_error, true));
        //seleciona o tipo de codificação
        mysql_query("SET NAMES 'utf8'");
        mysql_query("SET character_set_connection=utf8");
        mysql_query("SET character_set_client=utf8");
        mysql_query("SET character_set_results=utf8");
        //echo 'Chamou o metodo';
    }//end conecta
    
    	//monta a Query
    public function Inserir($objeto){
		//insert into nome_tabela (campo,campo) values (1,2))
		$sql = "INSERT INTO ".$objeto->tabela." ("  ;
		for($i = 0; $i <count($objeto->campos_valores); $i++){
			$sql .= key($objeto->campos_valores);
			//pergunta se não é o ultimo registro
			if($i < (count($objeto->campos_valores) - 1)){
				$sql .= ", ";
			}else{
				$sql .= ")";
			}//end else
			
			//passa pro porximo registgro apos o laço
			next($objeto->campos_valores);
		}//end for
		reset($objeto->campos_valores);
		$sql .= "VALUES (";
		for($i = 0; $i <count($objeto->campos_valores); $i++){
			$sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ? $objeto->campos_valores[key($objeto->campos_valores)]
			: "'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
			//pergunta se não é o ultimo registro
			if($i < (count($objeto->campos_valores) - 1)){
				$sql .= ", ";
			}else{
				$sql .= ")";
			}//end else
			
			//passa pro porximo registgro apos o laço
			next($objeto->campos_valores);
		}//end for
		//echo $sql;
			try {
				$this->executaSQL($sql);
				//verificar isso, indo duas vezes
				return true;
			} catch (Exception $e) {
				return false;
			}	
	}//end class Inserir

	
	//Atualiza	
	public function Atualizar($objeto){
		//UPDATE NOME_TABELA set campo1, campo2  where campochave = valorchave;
		$sql = "UPDATE ".$objeto->tabela." SET "  ;
		for($i = 0; $i < count($objeto->campos_valores); $i++){
			$sql .= key($objeto->campos_valores)." = ";
			$sql .= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ? $objeto->campos_valores[key($objeto->campos_valores)]
			: "'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
			//pergunta se não é o ultimo registro
			if($i < (count($objeto->campos_valores) - 1)){
				$sql .= ", ";
			}else{
				$sql .= " ";
			}//end else
			
			//passa pro porximo registgro apos o laço
			next($objeto->campos_valores);
		}//end for
		$sql .= "where " . $objeto->campoPk . "= ";
		$sql .= is_numeric($objeto->valorPk) ? $objeto->valorPk : "'".$objeto->valorPk."';";
		//apagar depois esse echo
		echo $sql;
		return $this->executaSQL($sql);
	}// end class Atualizar
	
	
	public function executaSQL($sql = NULL){
		if($sql != NULL){
			$query = mysql_query($sql) or die(mysql_error());
			$this->linhasafetadas = mysql_affected_rows($this->conexao);
		}else{
			$this->TrataErro(__FILE__,__FUNCTION__,null,'Operação inválida',false);
		}
	}//end executa SQL
	
	//Essa função fará a mudança de estado da pessoa de ativo para inativo
	public function Desativar($objeto){
		//UPDATE NOME_TABELA set campo1, campo2  where campochave = valorchave;
		$sql = "UPDATE ".$objeto->tabela." SET status = 0 "  ;
		
		$sql .= "where " . $objeto->campoPk . "= ";
		$sql .= is_numeric($objeto->valorPk) ? $objeto->valorPk : "'".$objeto->valorPk."'";
		//apagar depois esse echo
		echo $sql;
		return $this->executaSQL($sql);
	}//end function Desativar
	
	//essa função muda o estado para inativo para ativo
	public function AtivarUsuario($objeto){
		//UPDATE NOME_TABELA set campo1, campo2  where campochave = valorchave;
		$sql = "UPDATE ".$objeto->tabela." SET status = 1 "  ;
		
		$sql .= "where " . $objeto->campoPk . "= ";
		$sql .= is_numeric($objeto->valorPk) ? $objeto->valorPk : "'".$objeto->valorPk."'";
		//apagar depois esse echo
		echo $sql;
		return $this->executaSQL($sql);
	}	

	//FUNCIONA IRADO ISSO!
    public function TrataErro($arq=null, $rotina=null, $num_erro=null, $msg=null, $geraExcept=false){
    	//Mysql_errno : Retorna o número do erro da ultima função MySQL. 
        if($arq == null) $aqr="não informado";
        if($rotina == null ) $rotina = "não informada";
        if($num_erro == null) $num_erro=  mysql_errno ($this->conexao);
        if($msg == null) $msg=  mysql_error ($this->conexao);
        $resultado = ' Ocorreu um erro : </br>
                        <strong>Arquivo : </strong>'.$arq.'</br>
                        <strong>Rotina : </strong>'.$rotina.'</br>
                        <strong>Codigo : </strong>'.$num_erro.'</br>
                        <strong>Mensagem : </strong>'.$msg;
        if($geraExcept==false){
            echo $resultado;
        }
        else {
            die($resultado);
        }
        
    }// end trata erro
    
    
    //essa função é para a Recepcionista!!!!
    //Depois essa parte do código será transferida para a classe recepcionista!

    //Não deu certo ... Fatal error: Class 'aluno' not found in C:\xampp\htdocs\GAF\View\Recepcionista\teste.php on line 5
        	
    	public static function PreencheTextAluno($codigo){
			$sql = 'select * 
					from Pessoa 
					inner join aluno
					on Pessoa.idPessoa = aluno.idPessoa 
					where Pessoa.idPessoa = '.$codigo.' ;
				';
			$cmd = mysql_query($sql)or die(mysql_error());
			if($cmd > 0 ){
				$linha = array();
				$row = mysql_fetch_array($cmd);
					global $nome, $CPF, $email, $telefone, $cel, $sexo, $dtNasc, $login, $categoria, $peso, $alt, $peito, $cintura, $quadril, $braco, $coxa, $matricula;
					$nome      = $row[2];
					$CPF       = $row[3];
					$email     = $row[4];
					$telefone  = $row[5];
					$cel       = $row[6];
					$dtNasc    = $row[9];
					$login     = $row[10];
					$categoria = $row[15];
					$peso      = $row[16];
					$alt       = $row[17];
					$peito     = $row[18];
					$cintura   = $row[19];
					$quadril   = $row[20];
					$braco     = $row[21];
					$coxa      = $row[22];
					$matricula = $row[23];
					
					//echo $nome;
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheText

		public static function PreencheTextProfessor($codigo){
			$sql = 'select * 
					from Pessoa 
					inner join professor
					on Pessoa.idPessoa = professor.idPessoa 
					where Pessoa.idPessoa = '.$codigo.' ;
				';
			$cmd = mysql_query($sql)or die(mysql_error());
			if($cmd > 0 ){
				$linha = array();
				$row = mysql_fetch_array($cmd);
					global $nome, $CPF, $email, $telefone, $cel, $sexo, $dtNasc, $login, $nivel;
					$nome      = $row[2];
					$CPF       = $row[3];
					$email     = $row[4];
					$telefone  = $row[5];
					$cel       = $row[6];
					$dtNasc    = $row[9];
					$login     = $row[10];
					$nivel     = $row[15];
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheText


		public static function PreencheTextRecepcionista($codigo){
			$sql = 'select * 
					from Pessoa 
					inner join recepcionista
					on Pessoa.idPessoa = recepcionista.idPessoa 
					where Pessoa.idPessoa = '.$codigo.' ;
				';
			$cmd = mysql_query($sql)or die(mysql_error());
			if($cmd > 0 ){
				$linha = array();
				$row = mysql_fetch_array($cmd);
					global $nome, $CPF, $email, $telefone, $cel, $sexo, $dtNasc, $login;
					$nome      = $row[2];
					$CPF       = $row[3];
					$email     = $row[4];
					$telefone  = $row[5];
					$cel       = $row[6];
					$dtNasc    = $row[9];
					$login     = $row[10];
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheText
    

		public static function MostraAluno(){
		//echo 'chamou metodos para ' . $objeto->tabela;
		//$todos       = "select * from Pessoa inner join aluno on Pessoa.idPessoa = aluno.idPessoa where pessoa.status = 1 order by pessoa.nome;";
		$todos = '
					select * 
					from Pessoa 
					inner join aluno 
					inner join categoria_aluno 
					on Pessoa.idPessoa = aluno.idPessoa 
					where pessoa.status = 1 and aluno.idCategoria = categoria_aluno.idCategoria
					order by pessoa.nome;
				';
        $query       = mysql_query($todos);        	
        	if($query > 0){
        		 echo '<meta charset="utf8">';
        		 echo '<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Matricula</th>
								<th>Telefone</th>
								<th></th>
							</tr>
						</thead>
						<tbody>';
						while($info_pessoa = mysql_fetch_array($query)){

							echo '<tr>
								<td>'.$info_pessoa[2].'</td>
								<td>'.$info_pessoa[23].'</td>
								<td>'.$info_pessoa[5].'</td>
								<td class="buttons">
									<div class="button">
										<a href="EditarAluno.php?cod='.$info_pessoa[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
										<a href="relatorio.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-stats" title="relatorio"></a>	
										<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>
									</div>
								</td>				
							</tr>
						</tbody>';

				echo '<ul class="list">
				<li class="list-item">
					<span class="list-description">Nome</span>
					<span class="list-name">'.$info_pessoa[2].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Matricula</span>	
					<span class="list-name">'.$info_pessoa[23].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Telefone</span>	
					<span class="list-name">'.$info_pessoa[5].'</span>
				</li>
				<li>
					<div class="button">
						<a href="EditarAluno.php?cod='.$info_pessoa[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
						<a href="relatorio.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-stats" title="relatorio"></a>	
						<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>						
					</div>
				</li>
			</ul>';
			
			
		}
		echo '</table>';
		
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraAluno

    public static function MostraProfessor(){
		$todos = '
					select * 
					from Pessoa 
					inner join professor 
					on Pessoa.idPessoa = professor.idPessoa 
					order by pessoa.nome;
				 ';
        $query       = mysql_query($todos);        	
        	if($query > 0){
        		 echo '<meta charset="utf8">';
        		 echo '<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>CPF</th>
								<th>Nivel</th>
								<th></th>
							</tr>
						</thead>
						<tbody>';
						while($info_pessoa = mysql_fetch_array($query)){

							echo '<tr>
								<td>'.$info_pessoa[2].'</td>
								<td>'.$info_pessoa[3].'</td>
								<td>'.$info_pessoa[15].'</td>
								<td class="buttons">
									<div class="button">
										<a href="editarProfessor.php?cod='.$info_pessoa[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
										<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>	
									</div>
								</td>				
							</tr>
						</tbody>';

				echo '<ul class="list">
				<li class="list-item">
					<span class="list-description">Nome</span>
					<span class="list-name">'.$info_pessoa[2].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">CPF</span>	
					<span class="list-name">'.$info_pessoa[3].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Nivel</span>	
					<span class="list-name">'.$info_pessoa[15].'</span>
				</li>
				<li>
					<div class="button">
						<a href="editarProfessor.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-pencil" title="editar"></a>
						<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>					
					</div>
				</li>
			</ul>';
		}
		echo '</table>';
		
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraProfessor

        		public static function MostraRecepcionista(){
		$todos = '
					select * 
					from Pessoa 
					inner join recepcionista 
					on Pessoa.idPessoa = recepcionista.idPessoa 
					order by pessoa.nome;
				 ';
        $query       = mysql_query($todos);        	
        	if($query > 0){
        		 echo '<meta charset="utf8">';
        		 echo '<table class="table">
						<thead>
							<tr>
								<th>Nome</th>
								<th>CPF</th>
								<th>Telefone</th>
								<th></th>
							</tr>
						</thead>
						<tbody>';
						while($info_pessoa = mysql_fetch_array($query)){

							echo '<tr>
								<td>'.$info_pessoa[2].'</td>
								<td>'.$info_pessoa[3].'</td>
								<td>'.$info_pessoa[5].'</td>
								<td class="buttons">
									<div class="button">
										<a href="editarRecepcionista.php?cod='.$info_pessoa[0].'"class="glyphicon glyphicon-pencil" title="editar"></a>
										<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>
									</div>
								</td>				
							</tr>
						</tbody>';

				echo '<ul class="list">
				<li class="list-item">
					<span class="list-description">Nome</span>
					<span class="list-name">'.$info_pessoa[2].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">CPF</span>	
					<span class="list-name">'.$info_pessoa[3].'</span>
				</li>
				<li class="list-item">
					<span class="list-description">Telefone</span>	
					<span class="list-name">'.$info_pessoa[5].'</span>
				</li>
				<li>
					<div class="button">
						<a href="editarRecepcionista.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-pencil" title="editar"></a>
						<a href="desativar.php?cod='.$info_pessoa[0].'" class="glyphicon glyphicon-trash" title="desativar"></a>
					</div>
				</li>
			</ul>';
		}
		echo '</table>';
		
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraRecepcionista

    

}//end class
?>