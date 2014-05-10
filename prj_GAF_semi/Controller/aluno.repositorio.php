<?php
require_once 'Model/aluno.class.php';
$hoje = date("Y/m/d");  

 $testando = new pessoa(array(
			'idPerfil' 		=> '4',
			'nome'     		=> $_POST['Nome'],
			'CPF'      		=> $_POST['CPF'],
			'email'	   	    => $_POST['Email'],
			'telefone'		=> $_POST['Telefone'],
			'celular' 		=> $_POST['Celular'],
			'sexo'	   	    => 'M', //arrumar isso aqui!
			'status'   		=> '1', //status ativo!
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['Login'],
			'senha'		    => $_POST['Senha'],
			'foto'		    => 'imagens/padrao.png',
			'dtCadastro'	=> $hoje
        ));
        
        	$codigo = $testando->getCod();
        	echo $codigo;
        	
        	$aluno = new aluno(array(
			'idPessoa'     	=> $codigo,
			'idCategoria'   => 1, //arrumar isso aqui!
			'peso'	   	    =>  $_POST['Peso'],
			'peito'	   	    =>  $_POST['Peito'],
			'altura'		=>  $_POST['Altura'],
			'cintura' 		=>  $_POST['Cintura'],
			'quadril'  		=>  $_POST['Quadril'],
			'braco'   		=>  $_POST['Braco'],
			'coxa'          =>  $_POST['Coxa'],
			'matricula'     => '1111' //arrumar isso aqui!
        ));
		
        
  $testando->Inserir($testando);
  $aluno->Inserir($aluno);
  
 $aluno::MostraUsuario(); //somente mostra os alunos!

 
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>