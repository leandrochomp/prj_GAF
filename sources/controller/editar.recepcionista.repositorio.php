<?php
require_once '../model/aluno.class.php';
$hoje = date("Y/m/d");

$codigo = $_GET['cod'];  

 $testando = new pessoa(array(
			'idPerfil' 		=> '4',
			'nome'     		=> $_POST['txtNome'],
			'CPF'      		=> $_POST['txtCPF'],
			'email'	   	    => $_POST['txtEmail'],
			'telefone'		=> $_POST['txtFone'],
			'celular' 		=> $_POST['txtCel'],
			'sexo'	   	    => $_POST['sltSexo'],
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['txtLogin'],
			'dtCadastro'	=> $hoje
        ));

        	$aluno = new aluno(array(
			'idPessoa'     	=> $codigo,
        	));

$sql = "select idRecepcionista from Recepcionista where idPessoa = ".$codigo.";";
$sql2 = mysql_query($sql);
$cmd = mysql_fetch_array($sql2);
$codA = $cmd[0];

$testando->valorPk = $codigo;

$aluno->valorPk = $codA;

  	if (($testando->Atualizar($testando)) &&  ($aluno->Atualizar($aluno)))
	 	echo "Alterou";
	else 
        echo "Não alterou";  
?>