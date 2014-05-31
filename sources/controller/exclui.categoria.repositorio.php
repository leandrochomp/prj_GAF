<?php
require_once '../model/categoria.class.php';
        	
      $codigo = $_GET['cod'];
      
      $categoria = new categoria(array(
       'nome'       => $_POST['txtGrupo']
      ));

$sql = "delete idAluno from Categoria where idCategoria = ".$codigo.";";


if($sql)
	echo"Excluiu";
var_dump($sql);
else
	echo"Não"


     //  if(($categoria->Inserir($categoria)))
     //  	echo "Cadastrou";
  	  // else 
     //  	echo "Não cadastrou";
  ?>