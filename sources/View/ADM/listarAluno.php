<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../app/styles/bootstrap.css" rel="stylesheet">
    <link href="../../app/styles/style.css" rel="stylesheet">
    <link href="../../app/styles/table.css" rel="stylesheet">
</head>
	<div class="container">
		<div class="row header">
			<div class="col-md-12"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-pills nav-stacked menu font-24-bold">
					<li><a href="cadastrarRecepcionista.html">Cadastrar Recepção</a></li>
					<li><a href="cadastrarProfessor.html">Cadastrar Professor</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="#">Listar funcionarios</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> LISTA DE ALUNOS </STRONG>
				<hr/>
				<?php
					require_once('../../model/aluno.class.php');
					$aluno = new aluno(null);

					aluno::MostraAluno();
				?>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
</html>
