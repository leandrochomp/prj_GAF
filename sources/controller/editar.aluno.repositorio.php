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
        
        	// $codigo = $testando->getCod();
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
			'matricula'     =>  $matricula
        	));
		//var_dump($matricula);
$sql = "select idAluno from aluno where idPessoa = ".$codigo.";";
// echo $sql;
$sql2 = mysql_query($sql);
$cmd = mysql_fetch_array($sql2);
$codA = $cmd[0];

$testando->valorPk = $codigo;
// $testando->Atualizar($testando);

$aluno->valorPk = $codA;
// $aluno->Atualizar($aluno);



  	if (($testando->Atualizar($testando)) &&  ($aluno->Atualizar($aluno)))
	 	echo "Alterou";
	else 
        echo "Não alterou";  
?>