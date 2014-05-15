<?php
require_once '../model/categoria.class.php';
        	
      $treino = new treino(array(
       'idAtividade' => $_POST['sltAtividade'],
	   'idCategoriaAluno' => $_POST['sltCatAluno'],
	   //session
	   'idProfessor' => $_POST[''],
	   'nome'     	 => $_POST['txtNmTreino'],
	   'serie'       => $_POST['txtSerie'],
	   'carga'       => $_POST['txtCarga'],
	   'repeticao'   => $_POST['txtRepeticao'],
	   'tempo'       => $_POST['txtTempo'],
      ));
		
  $treino->Inserir($treino);
  ?>