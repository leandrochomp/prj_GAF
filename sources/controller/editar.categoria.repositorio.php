<?php
require_once '../model/categoria.class.php';

$codigo = $_GET['cod'];  

        	$categoria = new categoria(array(
			'idCategoria' => $codigo,
        	));

// $sql = "select idCategoria from Categoria where idCategoria = ".$codigo.";";
// $sql2 = mysql_query($sql);
// $cmd = mysql_fetch_array($sql2);
// $codA = $cmd[0];

$testando->valorPk = $codigo;
// $testando->Atualizar($testando);

//$aluno->valorPk = $codA;
// $aluno->Atualizar($aluno);

//var_dump($categoria);

  	if ($categoria->Atualizar($codigo))
	 	echo "Alterou";
	else 
        echo "Não alterou";  
?>