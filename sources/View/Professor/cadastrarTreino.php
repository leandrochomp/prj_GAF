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
				<STRONG> CADASTRAR TREINO </STRONG>
				<hr/>
					<form id="FormCadTreino" name="FormCadTreino" method="post" action="../../controller/treino.repositorio.php">
					  <p>
					    <label for="serie">Nome Treino:</label>
					    <input class="form-control bigInblock" type="text" name="txtTreino" id="txtTreino" />
					  </p>
					  <?php
					    		$cmd = 'select * from atividade order by idCategoria asc;';
								$sql = mysql_query($cmd) or die(mysql_error());
								if(mysql_num_rows($sql) > 0){
									while ($row = mysql_fetch_array($sql)){
									echo '<p class="cmbTreino"><input type="checkbox" name="treino[]" value="'.$row[0].'">'.$row[2].'</p>';
								}	
							}
					    ?>
					  	<br class="clear" />
					  	<button type="submit" class="btn btn-success"> <i class="fa fa-check-circle"></i> </button> 

					  	<button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> </button>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
</body>
</html>