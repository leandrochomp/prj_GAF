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
					<li><a href="cadastrarAluno.php">Cadastrar Aluno</a></li>
					<li><a href="listarAluno.php">Listar Alunos</a></li>
					<li><a href="alterarSenha.php">Alterar senha</a></li>
					<li><a href="#">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="panel content">
				<STRONG> CADASTRAR ALUNO </STRONG>
				<hr/>
					<form id="FormCadAluno" name="FormCadAluno" method="post" action="../../controller/aluno.repositorio.php">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" name="txtNome" id="txtNome" required='required' title="Digite seu nome" />
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" name="txtCPF" id="txtCPF" title="Digite seu CPF" />

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sltSexo" id="sltSexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" name="dtNasc" id="dtNasc" title="insira sua data de nascimento" />
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="text" name="txtEmail" id="txtEmail" title="digite seu email" />
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" name="txtFone" id="txtFone" title="digite seu telefone" />
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" name="txtCel" id="txtCel" title="digite seu celular"/>
					  </p>
					  <!-- LOGIN/SENHA -->
					  <hr>
					  <p> 
					  	<label for="cel"> Login:</label>
					    <input class="form-control login" type="text" name="txtLogin" id="txtLogin" required='required' title="digite o login do cliente" />
					  </p>
					  <p>

					  </p>
					  <hr>
					  <!-- MEDIDAS -->
					  <p> 
					  	<label for="cel"> Peso:</label>
					    <input class="form-control peso" type="text" name="txtPeso" id="txtPeso" />

					    <label for="cel"> Altura:</label>
					    <input class="form-control altura" type="text" name="txtAltura" id="txtAltura" />

					    <label for="cel"> Peito:</label>
					    <input class="form-control peito" type="text" name="txtPeito" id="txtPeito" />
				     </p>
				     <p> 
					    <label for="cel"> Cintura:</label>
					    <input class="form-control cintura" type="text" name="txtCintura" id="txtCintura" />

					    <label for="cel"> Quadril:</label>
					    <input class="form-control quadril" type="text" name="txtQuadril" id="txtQuadril" />

					    <label for="cel"> Braço:</label>
					    <input class="form-control braco" type="text" name="txtBraco" id="txtBraco" />
				     </p>

				     <p> 
					  	<label for="cel"> Coxa:</label>
					    <input class="form-control coxa" type="text" name="txtCoxa" id="txtCoxa" />
				     </p>
					 <span id="msg"></span>
					  <br>
					    <button type="submit" class="btn btn-success" name="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-danger" name="btnCancel"><i class="fa fa-trash-o"></i> </button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
    <script src="../../app/scritps/js/Recepcionista/cadAluno.js"></script>
</body>
</html>