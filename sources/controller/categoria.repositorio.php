<?php
require_once '../model/categoria.class.php';
        	
      $categoria = new categoria(array(
       'nome'       => $_POST['txtGrupo']
      ));
		
  $categoria->Inserir($categoria);
  ?>