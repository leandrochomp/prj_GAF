<?php 
	require_once ('../../model/aluno.class.php');
	require_once ('../../model/professor.class.php');
	$codigo = $_GET['cod'];
	$pessoa = new pessoa();
	$pessoa->conecta();
	pessoa::PreencheTextProfessor($codigo);
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
		<div class="row">
			<div class="col-md-4">
				<ul class="nav nav-pills nav-stacked menu font-24-bold">
					<li><a href="cadastrarRecepcionista.php">Cadastrar Recepção</a></li>
					<li><a href="cadastrarProfessor.php">Cadastrar Professor</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="listarProfessor.php">Listar Professor</a></li>
					<li><a href="listarRecepcionista.php">Listar Recepcionista</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> EDITAR PROFESSOR </STRONG>
				<hr/>
					<form id="FormAlteraProf" name="FormAlteraProf" method="post" action="../../model/banco.class.php?cod=<?php echo $_GET['cod']?>">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" name="txtNome" id="txtNome" title="Digite seu nome" value="<?php echo $nome;?>"/>
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" name="txtCPF" id="txtCPF" title="Digite seu CPF" value="<?php echo $CPF;?>"/>

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sltSexo" id="sltSexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" name="dtNasc" id="dtNasc" value="<?php echo $dtNasc;?>"/>

					    <label for="sexo">Nivel:</label>
					    <select class="form-control nivel" name="sltNivel" id="sltNivel" value="<?php echo $nivel;?>">
					      <option>Professor</option>
					      <option>Coordenador</option>
					    </select>
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="text" name="txtEmail" id="txtEmail" title="digite seu email" value="<?php echo $email;?>"/>
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" name="txtFone" id="txtFone" value="<?php echo $telefone;?>"/>
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" name="txtCel" id="txtCel" value="<?php echo $cel;?>"/>
					  </p>
					  <!-- LOGIN/SENHA -->
					  <hr>
					  <p> 
					  	<label for="cel"> Login:</label>
					    <input class="form-control login" type="text" name="txtLogin" id="txtLogin" value="<?php echo $login;?>" />
					  </p>
					  <p>

					  <br>
					    <button type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-danger" name="btnCancel" id="btnCancel"><i class="fa fa-trash-o"></i> </button>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
</body>
</html>