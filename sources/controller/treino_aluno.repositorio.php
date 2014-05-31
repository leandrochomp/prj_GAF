<?php
require_once'../model/treino_aluno.class.php'
$hoje = date("Y/m/d");  
      
      $idAluno = $_GET['cod'];
      $idTreino = $aluno->getCodTreino();
      
      $treino_aluno = new treino_aluno(array(
        'TREINO_idTreino' => array(),
        'ALUNO_idAluno'   => $idAluno,
        'dtTreino'        => $hoje
      ));

      $idTreino = $aluno->getCodTreino();
        
        foreach ($tipo as $key => $value) {
          // echo 'insert into treino_atividade ';
          // mysql_query("INSERT INTO treino_atividade (`idTREINO`, `nome`) VALUES ('".$codigo."', '".$value."')") ;
          mysql_query("INSERT INTO treino_aluno (`TREINO_idTREINO`, `ALUNO_idALUNO`, `dtTreino`) VALUES ('".$idTreino."', '".$idAluno."', '".$hoje."')");
        } 
      }
    $treino_aluno->Inserir($treino_aluno);
    //$treino_atv->Inserir($treino_atv);
  ?>