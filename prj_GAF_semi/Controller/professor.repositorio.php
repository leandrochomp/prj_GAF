<?php
require_once 'Model/professor.class.php';
$hoje = date("Y/m/d");  


// arrumar sexo!!!!!
// FAZER UPLOAD DE IMAGEM!!!!!
 $testando = new pessoa(array(
			'idPerfil' 		=> '2',
			'nome'     		=> $_POST['Nome'],
			'CPF'      		=> $_POST['CPF'],
			'email'	   	    => $_POST['Email'],
			'telefone'		=> $_POST['Telefone'],
			'celular' 		=> $_POST['Celular'],
			'sexo'	   	    => 'M',
			'status'   		=> '1',
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['Login'],
			'senha'		    => $_POST['Senha'],
			'foto'		    => 'imagens/padrao.png',
			'dtCadastro'	=> $hoje
        ));
        
        	$codigo = $testando->getCod();
        	//echo $codigo;
        	
        	$professor = new professor(array(
			'idPessoa'     	=> $codigo,
			'nivel'  		=> $_POST['Nivel']
        ));
		
  var_dump($_POST['Nivel']);
  $testando->Inserir($testando);
  $professor->Inserir($professor);
  
 //$professor::MostraAluno();
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>