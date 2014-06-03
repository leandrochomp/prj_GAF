<?php
require_once '../model/atividade.class.php';

//gambiarra
$atividade = new atividade(null);
$atividade->conecta();
//fim gambiarra


$idAtividade  = $_GET['cod'];
$nome    =  $_POST['sltGrupo'];
$atv     = $_POST['txtAtividade'];
$serie   = $_POST['txtSerie'];
$carga   = $_POST['txtCarga'];
$repeticao   = $_POST['txtRep'];
$tempo   = $_POST['txtTempo'];
//$codA = $cmd[0];

// $codA = $exe[0];
// $nome = $exe[1];


        	$atividade = new atividade(array(
				"idAtividade"  => $idAtividade,
				"idCategoria"  => $nome,
				"nome"         => $atv,
				"serie"        => $serie,
				"carga"        => $carga,
				"repeticao"    => $repeticao,
				"tempo"        => $tempo,
        	));

  	$atividade->AtualizarAtividade($idAtividade,$atv,$nome,$serie,$carga,$repeticao,$tempo);
?>