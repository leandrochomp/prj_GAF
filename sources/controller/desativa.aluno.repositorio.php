<?php
require_once '../model/aluno.class.php';
$hoje = date("Y/m/d");

$codigo = $_GET['cod'];  

 $testando = new pessoa(array(
			'idPerfil' 		=> '4',
			'idPessoa'		=> $codigo,
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

$testando->Desativar = $codigo;
var_dump($codigo);
// var_dump($testando);

  	if ($testando->Desativar($testando))
	 	echo "Desativou";
	else 
		var_dump($testando);
		echo"<pre>";
        echo "Não desativou";  
?>