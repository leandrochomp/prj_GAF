<?php
require_once '../model/atividade.class.php';
        	
      $atividade = new atividade(array(
       'idCategoria' => $_POST['sltGrupo'],
       'nome'        => $_POST['txtAtividade'],
       'serie'       => $_POST['txtSerie'],
       'carga'       => $_POST['txtCarga'],
       'repeticao'   => $_POST['txtRep'],
       'tempo'       => $_POST['txtTempo'],
      ));
		
    if(($atividade->Inserir($atividade)))
  	echo "Cadastrou";
	  else 
  	echo "Não cadastrou";
  ?>