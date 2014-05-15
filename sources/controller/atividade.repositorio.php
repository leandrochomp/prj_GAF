<?php
require_once '../model/atividade.class.php';
        	
      $atividade = new atividade(array(
       'idCategoria' => $_POST['sltGrupo'],
       'nome'        => $_POST['txtAtividade']
      ));
		
  $atividade->Inserir($atividade);
  ?>