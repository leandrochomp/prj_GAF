<?php 
	//carregando o combo
	require_once '../../model/atividade.class.php'; 
    $atividade = new atividade();
    $atividade->conecta();
 ?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../app/styles/bootstrap.css" rel="stylesheet">
    <link href="../../app/styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../app/styles/font-awesome.min.css">
    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
</head>

<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12"></div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-pills nav-stacked menu font-24-bold">
					<li><a href="cadastrarTreino.php">Cadastrar Treino</a></li>
					<li><a href="#">Alterar Treino</a></li>
					<li><a href="cadastrarCategoria.html">Cadastrar Categoria</a></li>
					<li><a href="cadastrarAtividade.php">Cadastrar Atividade</a></li>
					<li><a href="#">Alterar Biblioteca</a></li>
					<li><a href="alterarSenha.html">Alterar Senha</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> CADASTRAR TREINO </STRONG>
				<hr/>
					<form id="FormCadTreino" name="FormCadTreino" method="post">
					  <p>
					    <label for="nome">Escolha a Atividade:</label>
						<select class="form-control atividade2" name="sltAtividade" id="sltAtividade">
                      	<?php
                        	atividade::MostraAtividades();
                        ?>
                      </select>

					  </p>
					  <p>
					    <label for="serie">Série:</label>
					    <input class="form-control serie" type="text" />

					    <label for="carga">Carga:</label>
					    <input class="form-control carga" type="text" />					
					  </p>
					  <p>
					    <label for="repeticao">Repetição:</label>
					    <input class="form-control repeticao" type="text" />
					    
					    <label for="tempo">Tempo:</label>
					    <input class="form-control tempo" type="text" />
					  </p>
					  <br>
					  	<button type="submit" class="btn btn-success"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp
					  	<button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> </button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>