<?php
//o verificaLogin esta em pessoa.class, por isso a necessidade de incluir ele 
require_once '../model/pessoa.class.php';
//pegando o login e senha da classe pessoa para identificar quem é o usuario que quer logar
 $testando = new pessoa(array(
                        'login' => $_POST['txtLoginTela'],
			                  'senha' => $_POST['txtSenhaTela'],	
        ));
        
 //pega os dados da view e confere se existe no banco, e qual o seu perfil
 $result = $testando->validaLogin($_POST['txtLoginTela'], $_POST['txtSenhaTela']);
  if($result != NULL){
      session_start();
      $_SESSION['id'] = $result[1];
      $_SESSION['nome'] = $result[2];
      switch ($result[0]){
          case 1:
              echo  'ADM';
              break;
          case 2:
          echo  'professor';
          exit;
              break;
          case 3:
          echo  'recepcionista';
          exit;
              break;          
          case 4:
              echo  'aluno';
              break;          
      }
  } else {
      echo "Login ou senha incorreta, tente novamente.";
  }

?>