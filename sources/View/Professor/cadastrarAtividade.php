<?php 
	//carregando o combo
	require_once '../../model/categoria.class.php'; 
    $categoria = new categoria();
    $categoria->conecta();
 ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../app/styles/bootstrap.css" rel="stylesheet">
    <link href="../../app/styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../app/styles/font-awesome.min.css">
</head>

<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-pills nav-stacked menu font-24-bold">
					<li><a href="cadastrarCategoria.php">Cadastrar Categoria</a></li>
					<li><a href="cadastrarAtividade.php">Cadastrar Atividade</a></li>
					<li><a href="cadastrarTreino.php">Cadastrar Treino</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="alterarSenha.php">Alterar Senha</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> CADASTRAR ATIVIDADE </STRONG>
				<hr/>
					<form id="FormCadAtividade" name="FormCadAtividade" method="post" action="../../controller/atividade.repositorio.php">
					  <p>
					  <label for="grupo">Grupo Muscular:</label>
                      <select class="form-control grupoMusc" name="sltGrupo" id="sltGrupo">
                      	<?php
                        	categoria::MostraGrupoMuscular();
                        ?>
                      </select>
					  </p>
					  <p>
					  	<label for="serie">Atividade/Aparelho:</label>
					    <input class="form-control atividade" type="text" name="txtAtividade" id="txtAtividade" required="required"/>
					  </p>

					  <p>
					    <label for="serie">Série:</label>
					    <input class="form-control serie" type="text" name="txtSerie" id="txtSerie" required="required"/>

					    <label for="carga">Carga:</label>
					    <input class="form-control carga" type="text" name="txtCarga" id="txtCarga" required="required"/>					
					  </p>
					  <p>
					    <label for="repeticao">Repetição:</label>
					    <input class="form-control repeticao" type="text" name="txtRep" id="txtRep" required="required"/>
					    
					    <label for="tempo">Tempo:</label>
					    <input class="form-control tempo" type="text" name="txtTempo" id="txtTempo" required="required"/>
					  </p>
					  <br>
					  	<button type="submit" class="btn btn-success" id="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp
					  	<button type="button" class="btn btn-danger" id="btnCancelar"><i class="fa fa-trash-o"></i> </button>
					  	</p>
					  	<span id="msg"> </span>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
    <script src="../../app/scritps/js/Professor/atividade.js"> </script>
</body>
</html>