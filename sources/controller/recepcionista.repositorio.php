<?php
require_once '../model/recepcionista.class.php';
$hoje = date("Y/m/d");  


// arrumar sexo!!!!!
// FAZER UPLOAD DE IMAGEM!!!!!
 $testando = new pessoa(array(
			'idPerfil' 		=> '3',
			'nome'     		=> $_POST['txtNome'],
			'CPF'      		=> $_POST['txtCPF'],
			'email'	   	    => $_POST['txtEmail'],
			'telefone'		=> $_POST['txtFone'],
			'celular' 		=> $_POST['txtCel'],
			'sexo'	   	    => $_POST['sltSexo'],
			'status'   		=> '1', //status ativo!
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['txtLogin'],
			'senha'		    => $_POST['txtLogin'],
			'dtCadastro'	=> $hoje
        ));
        
        	$codigo = $testando->getCod();
        	//echo $codigo;
        	
        	$recepcionista = new recepcionista(array(
			'idPessoa'     	=> $codigo,
        ));
		
  $testando->Inserir($testando);
  $recepcionista->Inserir($recepcionista);
  
 //$professor::MostraAluno();
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>