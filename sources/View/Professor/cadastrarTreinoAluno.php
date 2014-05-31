<?php 
	session_start();
	//carregando o combo
    require_once '../../model/atividade.class.php'; 
	require_once '../../model/pessoa.class.php';
	
	// INICIO - VERIFICAR SE ESTÁ LOGADO
	// Para não precisar colocar o código em todas as telas, seria bom deixa-lo junto com o layout em um include.
	$logado = new pessoa();
	if(isset($_SESSION['id'])){
		$result = $logado->usuarioLogado();
		if(!$result){
			echo "<script> window.location.href = '../../index.php'; </script>";
		} 	
	} else {
		echo "<script> window.location.href = '../../index.php'; </script>";
	}
	// FIM - VERIFICAR SE ESTÁ LOGADO

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
		<div class="logado">
			Bem vindo <?php echo $_SESSION['nome']; ?>!
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-pills nav-stacked menu font-24-bold">
					<li><a href="listarCategoria.php">Categoria</a></li>
					<li><a href="listarAtividade.php">Atividade</a></li>
					<li><a href="listarTreino.php">Treino</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="alterarSenha.php">Alterar Senha</a></li>
					<li><a href="../../index.php">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> CADASTRAR TREINO ALUNO</STRONG>
				<hr/>
					<form id="FormCadTreino" name="FormCadTreino" method="post" action="../../controller/treino_aluno.repositorio.php">
					  <?php
					    		$cmd = 'select * from treino;';
								$sql = mysql_query($cmd) or die(mysql_error());
								if(mysql_num_rows($sql) > 0){
									while ($row = mysql_fetch_array($sql)){
									echo '<p class="cmbTreino"><input type="checkbox" name="treino[]" value="'.$row[0].'">'.$row[1].'</p>';
								}	
							}
					    ?>
					  	<br class="clear" />
					  	<span id="msg"> </span>
						<div>
						  	<button type="submit" class="btn btn-success"> <i class="fa fa-check-circle"></i> </button> 
						  	<button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> </button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
    <script src="../../app/scritps/js/Professor/treino.js"> </script>

</body>
</html>