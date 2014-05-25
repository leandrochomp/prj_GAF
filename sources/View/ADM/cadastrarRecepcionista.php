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
					<li><a href="cadastrarRecepcionista.php">Cadastrar Recepção</a></li>
					<li><a href="cadastrarProfessor.php">Cadastrar Professor</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="#">Listar funcionarios</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> CADASTRAR RECEPCIONISTA </STRONG>
				<hr/>
					<form id="FormCadRecp" name="FormCadRecp" method="post" action="../../controller/recepcionista.repositorio.php">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" name="txtNome" id="txtNome" title="Digite o nome" required='required'/>
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" name="txtCPF" id="txtCPF" title="Digite o CPF" required='required'/>

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sltSexo" id="sltSexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" name="dtNasc" id="dtNasc" />
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="text" name="txtEmail" id="txtEmail" />
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" name="txtFone" id="txtFone" />
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" name="txtCel" id="txtCel" />
					  </p>
					  <hr>
					  <p> 
					  	<label for="cel"> Login:</label>
					    <input class="form-control login" type="text" name="txtLogin" id="txtLogin" title="Digite o login" required='required'/>
					  </p>
					  <span id="msg"> </span>
					  <br>
					  <div>
					    <button type="submit" class="btn btn-success" name="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-danger" name="btnCancel" id="btnCancel"><i class="fa fa-trash-o"></i> </button>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
    <script type="text/javascript" src="../../app/scritps/LIB/jquery.maskedinput.js"></script>
    <script src="../../app/scritps/js/Recepcionista/recepcionista.js"> </script>
</body>
</html>