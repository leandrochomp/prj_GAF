<?php
require_once '../model/categoria.class.php';

//gambiarra
$cat = new categoria(null);
$cat->conecta();
//fim gambiarra


$codigo = $_GET['cod'];
$nome = $_POST['txtGrupo'];

//$codA = $cmd[0];

// $codA = $exe[0];
// $nome = $exe[1];


        	$categoria = new categoria(array(
			'idCategoria' => $codigo,
			'nome' => $nome
        	));

  	$categoria->AtualizarCategoria($nome, $codigo); 
?>