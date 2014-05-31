<?php 
	session_start();
	
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
 ?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8"/>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../app/styles/bootstrap.css" rel="stylesheet">
    <link href="../../app/styles/style.css" rel="stylesheet">
    <link href="../../app/styles/font-awesome.min.css" rel="stylesheet">
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
					<li><a href="listarAluno.php">Listar Alunos</a></li>					
					<li><a href="alterarSenha.php">Alterar senha</a></li>
					<li><a href="../../index.php">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> ALTERAR SENHA </STRONG>
				<hr/>
					<form id="FormUser" name="FormUser" method="post">
					  <p>
					    <label for="senhaatual">Senha Atual:</label>
					    <input class="form-control pass" type="password" />
					  </p>
					  <p>
					    <label for="novasenha">Nova Senha:</label>
					    <input class="form-control pass" type="password"/>
					  </p>
					  <p>
					    <label for="confirmarsenha">Confirmar Senha:</label>
					    <input class="form-control newpass" type="password"/>
					  </p>
					  <br>
					    <button type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-warning" id="btnCancelar" name="btnCancelar"><i class="fa fa-eraser"></i> </button>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
</body>
</html>