<?php
require_once '../model/categoria.class.php';
        	
      $categoria = new categoria(array(
       'nome'       => $_POST['txtGrupo']
      ));

      if(($categoria->Inserir($categoria)))
      	echo "Cadastrou";
  	  else 
      	echo "Não cadastrou";
  ?>