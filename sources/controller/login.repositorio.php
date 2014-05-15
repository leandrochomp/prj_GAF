<?php
require_once '../model/pessoa.class.php';
$hoje = date("Y/m/d");  


// arrumar sexo!!!!!
// FAZER UPLOAD DE IMAGEM!!!!!
 $testando = new pessoa(array(
                        "idPerfil"     => NULL,
                        "nome"         => NULL,
                        "CPF"          => NULL,
                        "email"        => NULL,
                        "telefone"     => NULL,
                        "celular"      => NULL,
                        "sexo"         => NULL,
                        "status"       => NULL,
                        "dtNascimento" => NULL,
                        'login' => $_POST['txtLoginTela'],
			'senha' => $_POST['txtSenhaTela'],
                        "dtCadastro"   => NULL			
        ));
        
		
  
  //$recepcionista->Inserir($recepcionista);  
 $result = $testando->validaLogin($_POST['txtLoginTela'], $_POST['txtSenhaTela']);
  if($result != NULL){
      switch ($result){
          case 1:
              echo "perfil 1";
              break;
          case 2:
              echo "perfil 2";
              break;
          case 3:
              echo "perfil 3";
              break;          
          case 4:
              echo "perfil 4";
              break;          
      }
  } else {
      echo "Login ou senha incorreta, tente novamente.";
  }
  
 //$professor::MostraAluno();
//$aluno = new Aluno();
//$testando->valorPk = $testando->getCod();
//$testando->Desativar($testando);
//$testando->AtivarUsuario($testando);
//$testando->MostraUsuario($testando);

?>