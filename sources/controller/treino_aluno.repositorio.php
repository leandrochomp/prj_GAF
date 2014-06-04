<?php
require_once'../model/treino_aluno.class.php';
$hoje = date("Y/m/d");  

$cod = $_GET['cod'];
      if(!isset($_POST['treino'])){
        echo 'Não foram definidas atividades para o treino';
      } else {
        $tipo = $_POST['treino'];

}
      $treino_aluno = new treino_aluno(array(
        "TREINO_idTreino" =>  1,
        "dtTreino" => $hoje
        ));

$treino_aluno->conecta();
    foreach ($tipo as $key => $value) {
    // echo 'insert into treino_atividade '
    //var_dump($sql);
      $sql = "INSERT INTO treino_aluno (`TREINO_idTREINO`, `ALUNO_idALUNO`, `dtTreino`) VALUES ('".$value."', '".$cod."', '".$hoje."');";
      if ($cmd = mysql_query($sql) or die('Treino já atribuido para este aluno')){
        echo '<p>cadastro</p> ';
      }
    }  
?>