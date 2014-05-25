<?php
require_once ('../model/aluno.class.php');

$codigo = $_GET['cod'];
$testando = new pessoa(array(
			
			'nome'     		=> $_POST['txtNome'],
			'CPF'      		=> $_POST['txtCPF'],
			'email'	   		=> $_POST['txtEmail'],
			'telefone'		=> $_POST['txtFone'],
			'celular' 		=> $_POST['txtCel'],
			//'sexo'	   		=> 'M',
			'dtNascimento'  => $_POST['dtNasc'],
			//'login'         => $_POST['Login'],			
        ));
        
        	
        	echo $codigo;
        	
        	$aluno = new aluno(array(
			'idPessoa'     	=> $codigo,
			'idCategoria'   => 1,
			'peso'	   		=>  $_POST['txtPeso'],
			'peito'	   		=>  $_POST['txtPeito'],
			'altura'		=>  $_POST['txtAltura'],
			'cintura' 		=>  $_POST['txtCintura'],
			'quadril'  		=>  $_POST['txtQuadril'],
			'braco'   		=>  $_POST['txtBraco'],
			'coxa'          =>  $_POST['txtCoxa'],
			//'matricula'     => '1111'			
        ));

$testando->valorPk = $codigo;
$testando->Atualizar($testando);
$aluno->valorPk = $codigo;
$aluno->Atualizar($aluno);
?>