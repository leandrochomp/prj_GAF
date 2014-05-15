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
			$query = mysql_query($sql) or $this->TrataErro(__FILE__,__FUNCTION__);
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
        		 echo '<table class="GAF-tabelas" border="1">';
        		 echo '<thead>
			             <tr>
				                <th>Nome do Aluno</th>
				                <th>Matricula</th>
				                <th>Telefone</th>
				                <th>Sexo</th>
				                <th>Peso</th>
				                <th>Altura</th>
				                <th>Peito</th>
				                <th>Cintura</th>
				                <th>Quadril</th>
				                <th>Braço</th>
				                <th>Coxa</th>
								<th>Categoria</th>
				                <th>Data Cadastro</th>
								<th colspan ="2">Ações</th>
				                <th></th>
			                </tr>
						</thead>							
						<tbody>
		                 <tr>';
           		while($info_pessoa = mysql_fetch_array($query)){
                	echo"<td>$info_pessoa[2]</td>";    
                    echo "<td>$info_pessoa[24]</td>";
                    // echo "<td>$info_pessoa[5]</td>";
                    
                    $info_pessoa[7] == 'M' ? $sexo  =  "Masculino" : $sexo = "Feminino";
					
                    echo "<td>$sexo</td>";
                    
                    // echo "<td>$info_pessoa[17]</td>";
                    // echo "<td>$info_pessoa[18]</td>";
                    // echo "<td>$info_pessoa[19]</td>";
                    // echo "<td>$info_pessoa[20]</td>";
                    // echo "<td>$info_pessoa[21]</td>";
                    // echo "<td>$info_pessoa[22]</td>";
                    // echo "<td>$info_pessoa[23]</td>";
                    // echo "<td>$info_pessoa[26]</td>";
                    
                    // echo "<td>$info_pessoa[9]</td>";
                    //echo "<td>";
                    //echo "<td>";
                    //echo "<a href='cadastrarTreino.php?idAluno='".$info_aluno[4]."class='btn btn-small' title='Cadastrar Treinos'><i class='icon-pencil'></i></a>";
                    echo '<td><a href="desativar.aluno.php?cod='.$info_pessoa[0].'">Desativar</a></td>';
                    echo '<td><a href="editar.php?cod='.$info_pessoa[0].'">Editar</a></td>';
                    // echo '<td><a href="relatorio.php?cod='.$info_pessoa[0].'">Relatorios </a></p></td></tr>';
                    echo '<td><a href="linux.php?cod='.$info_pessoa[0].'">lnix </a></p></td></tr>';
				}
			echo '</table>';
		}else{
			
			echo '<p>Nenhum registro encontrado</p>';
		}
    
    }//end function MostraAluno
        	
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
					global $nome, $CPF, $email, $telefone, $cel, $sexo, $dtNasc, $login, $categoria, $peso, $alt, $peito, $cintura, $quadril, $braco, $coxa;
					$nome      = $row[2];
					$CPF       = $row[3];
					$email     = $row[4];
					$telefone  = $row[5];
					$cel       = $row[6];
					$dtNasc    = $row[9];
					$login     = $row[10];
					$categoria = $row[16];
					$peso      = $row[17];
					$alt       = $row[18];
					$peito     = $row[19];
					$cintura   = $row[20];
					$quadril   = $row[21];
					$braco     = $row[22];
					$coxa      = $row[23];
					
					echo $nome;
			}else{
				echo 'Não foi possivel realizar esta Operação!!!';
			}
				
		}// end function PreencheText
    

}//end class