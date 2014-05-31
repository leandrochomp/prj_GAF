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
        	$matricula = aluno::Matricula($testando->getCod());
        	//echo $matricula;

        	$aluno = new aluno(array(
			'idPessoa'     	=> $codigo,
			'idCATEGORIA'   =>  1, //arrumar isso aqui!
			'peso'	   	    =>  $_POST['txtPeso'],
			'peito'	   	    =>  $_POST['txtPeito'],
			'altura'		=>  $_POST['txtAltura'],
			'cintura' 		=>  $_POST['txtCintura'],
			'quadril'  		=>  $_POST['txtQuadril'],
			'braco'   		=>  $_POST['txtBraco'],
			'coxa'          =>  $_POST['txtCoxa'],
			//verificar isso com o joey
			 'matricula'     =>  $matricula//aluno::Matricula($codigo) //'1111' arrumar isso aqui!
        ));
		//var_dump($matricula);

    if (($testando->Inserir($testando)) && ($aluno->Inserir($aluno)))
       echo "Cadastrou";
  	else 
      echo "Não cadastrou";


// $testando->valorPk = $codigo;
// $testando->Atualizar($testando);
// $aluno->valorPk = $codigo;
// $aluno->Atualizar($aluno);
  
 //VER ISTO
 //$aluno::MostraUsuario(); //somente mostra os alunos!

 
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);



?>