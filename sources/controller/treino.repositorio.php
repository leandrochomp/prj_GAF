<?php
require_once '../model/treino.class.php';
require_once '../model/treino_atividade.class.php';
require_once '../model/atividade.class.php';
      
      $treino = new treino(array(
       'nome'       => $_POST['txtTreino']
      ));

      $treino_atv = new treino_atividade(array(
        "idTreino" =>  1,
        "idAtividade" => array()
      ));

      $codigo = $treino->getCodTreino();

      if(!isset($_POST['treino'])){
        echo 'Não foram definidas atividades para o treino';
      } else {
        $tipo = $_POST['treino'];
        
        foreach ($tipo as $key => $value) {
          // echo 'insert into treino_atividade ';
          mysql_query("INSERT INTO treino_atividade (`idtreino_atv`, `idTREINO`, `idATIVIDADE`) VALUES (null, '".$codigo."', '".$value."')") ;

        } 
      }
    $treino->Inserir($treino);
    //$treino_atv->Inserir($treino_atv);
  ?>