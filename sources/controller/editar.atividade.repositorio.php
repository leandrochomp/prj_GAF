<?php
require_once '../model/atividade.class.php';

//gambiarra
$atividade = new atividade(null);
$atividade->conecta();
//fim gambiarra


$idAtividade = $_GET['cod'];
$idCategoria = $_POST['sltGrupo'];
$atv     	 = $_POST['txtAtividade'];
$serie       = $_POST['txtSerie'];
$carga       = $_POST['txtCarga'];
$repeticao   = $_POST['txtRep'];
$tempo       = $_POST['txtTempo'];


    	$atividade = new atividade(array(
			"idAtividade"  => $idAtividade,
			"idCategoria"  => $idCategoria,
			"atv"          => $atv,
			"serie"        => $serie,
			"carga"        => $carga,
			"repeticao"    => $repeticao,
			"tempo"        => $tempo,
    	));

  	$atividade->AtualizarAtividade($idAtividade,$idCategoria,$atv,$serie,$carga,$repeticao,$tempo);
?>