<?php
require_once '../model/professor.class.php';
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
			'status'   		=> '1',
			'dtNascimento'  => $_POST['dtNasc'],
			'login'         => $_POST['txtLogin'],
			'senha'		    => $_POST['txtLogin'],
			//'foto'		    => 'imagens/padrao.png',
			'dtCadastro'	=> $hoje
        ));
        
        	$codigo = $testando->getCod();
        	//echo $codigo;
        	
        	$professor = new professor(array(
			'idPessoa'     	=> $codigo,
			'nivel'  		=> $_POST['sltNivel']
        ));
		
  //var_dump($_POST['cbkNivel']);
  $testando->Inserir($testando);
  $professor->Inserir($professor);
  
 //$professor::MostraAluno();
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>