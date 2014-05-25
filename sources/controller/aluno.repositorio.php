<?php
require_once '../model/aluno.class.php';
$hoje = date("Y/m/d");  

 $testando = new pessoa(array(
			'idPerfil' 		=> '4',
			'nome'     		=> $_POST['txtNome'],
			'CPF'      		=> $_POST['txtCPF'],
			'email'	   	    => $_POST['txtEmail'],
			'telefone'		=> $_POST['txtFone'],
			'celular' 		=> $_POST['txtCel'],
			'sexo'	   	    => $_POST['sltSexo'],
			'status'   		=> '1',
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['txtLogin'],
			'senha'		    => $_POST['txtLogin'],
			//'foto'		    => 'imagens/padrao.png',
			'dtCadastro'	=> $hoje
        ));
        
        	$codigo = $testando->getCod();
        	
        	$aluno = new aluno(array(
			'idPessoa'     	=> $codigo,
			'idCategoria'   =>  1, //arrumar isso aqui!
			'peso'	   	    =>  $_POST['txtPeso'],
			'peito'	   	    =>  $_POST['txtPeito'],
			'altura'		=>  $_POST['txtAltura'],
			'cintura' 		=>  $_POST['txtCintura'],
			'quadril'  		=>  $_POST['txtQuadril'],
			'braco'   		=>  $_POST['txtBraco'],
			'coxa'          =>  $_POST['txtCoxa'],
			//verificar isso com o joey
			'matricula'     =>  aluno::Matricula($codigo)  //'1111' //arrumar isso aqui! 

        ));
		

    if(($aluno->Inserir($aluno)) && ($testando->Inserir($testando))) {
      echo "Cadastrou";
      //echo aluno::Matricula($codigo);
    }
  	else 
      echo "Não cadastrou";
  
 //VER ISTO
 //$aluno::MostraUsuario(); //somente mostra os alunos!

 
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>