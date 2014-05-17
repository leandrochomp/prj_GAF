<?php
require_once '../model/categoria.class.php';
        	
      $treino = new treino(array(
           
	   'idProfessor' => $_POST['sltProfessor'],
       'idCategoria' => $_POST['sltCategoria'], 
       'idAtividade' => $_POST['sltAtividade'],
	   'nome'     	 => $_POST['txtNmTreino']
      ));
		
  $treino->Inserir($treino);
  ?>