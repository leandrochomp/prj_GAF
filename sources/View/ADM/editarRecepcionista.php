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

<?php 
	require_once ('../../model/aluno.class.php');
	require_once ('../../model/professor.class.php');
	$codigo = $_GET['cod'];
	$pessoa = new pessoa();
	$pessoa->conecta();
	pessoa::PreencheTextRecepcionista($codigo);
?>
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
					<li><a href="listarRecepcionista.php">Recepcionista</a></li>
					<li><a href="listarProfessor.php">Professor</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="../../index.php">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> EDITAR RECEPCIONISTA </STRONG>
				<hr/>
					<form id="FormCadRecp" name="FormCadRecp" method="post" action="../../controller/editar.recepcionista.repositorio.php?cod=<?php echo $_GET['cod']?>">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" name="txtNome" id="txtNome" title="Digite seu nome" required='required' value="<?php echo $nome;?>"/>
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" name="txtCPF" id="txtCPF" maxlength="11" onblur="return verificarCPF(this.value)" required='required' value="<?php echo $CPF;?>"/>

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sltSexo" id="sltSexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" name="dtNasc" id="dtNasc" required='required' value="<?php echo $dtNasc;?>"/>
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="email" name="txtEmail" id="txtEmail" title="digite seu email" value="<?php echo $email;?>"/>
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" name="txtFone" id="txtFone" maxlength="13" required='required' value="<?php echo $telefone;?>"/>
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" name="txtCel" id="txtCel" maxlength="13" value="<?php echo $cel;?>"/>
					  </p>
					  <!-- LOGIN/SENHA -->
					  <hr>
					  <p> 
					  	<label for="cel"> Login:</label>
					    <input class="form-control login" type="text" name="txtLogin" id="txtLogin" required='required' value="<?php echo $login;?>" />
					  </p>
					  <p>
					  <span id="msg"></span>
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
    <script src="../../app/scritps/js/Recepcionista/alteraRecp.js"></script>
    <script src="../../app/scritps/LIB/jquery.maskedinput.js"> </script>
</body>
</html>