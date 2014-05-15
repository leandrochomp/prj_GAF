<?php 
require_once("menu_adm.php");
 ?>
<body>
	<div class="container">
		<div class="row header">
			<div class="col-md-12"></div>
		</div>
		<div class="row">

			<div class="col-md-8">
				<div class="panel content">
				<STRONG> ALTERAR PROFESSOR </STRONG>
				<hr/>
					<form id="FormAltProf" name="FormAltProf" method="post">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" />
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" />

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sexo" id="sexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" />
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="text" />
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" />
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" />
					  </p>
					  <br>
					  <div>
					  	<button type="button" class="btn btn-success"> Salvar </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-warning"> Limpar </button>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>