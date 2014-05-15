<?php require_once("menu_adm.php"); ?>
<body>
	<div class="container">
		<div class="panel content">
				<STRONG> CADASTRAR PROFESSOR </STRONG>
				<hr/>
					<form id="FormCadProf" name="FormCadProf" method="post" action="../../controller/professor.repositorio.php">
			          <p>
					    <label for="nome">Nome Completo:</label>
					    <input class="form-control bigInblock" type="text" name="txtNome" id="txtNome" required='required'/>
					  </p>
					  <p>
					    <label for="cpf">CPF:</label>
					    <input class="form-control cpf" type="text" name="txtCPF" id="txtCPF" required='required'/>

					    <label for="sexo">Sexo:</label>
					    <select class="form-control sexoInblock" name="sltSexo" id="sltSexo">
					      <option>Femino</option>
					      <option>Masculino</option>
					    </select>
					  </p>
					  <p>
					  	<label for="data">Data Nascimento:</label>
					    <input class="form-control dtNasc" type="date" name="dtNasc" id="dtNasc" />
					  
					  	<label for="sexo">Nivel:</label>
					    <select class="form-control nivel" name="sltNivel" id="sltNivel">
					      <option>Professor</option>
					      <option>Coordenador</option>
					    </select>
					  </p>
					  <p>
					    <label for="email">Email:</label>
					    <input class="form-control email" type="text" name="txtEmail" id="txtEmail" />
					  </p>
					  <p>
					    <label for="tel">Telefone Fixo:</label>
					    <input class="form-control telFixo" type="text" name="txtFone" id="txtFone"/>
					  </p>
					  <p>
					  	<label for="cel"> Telefone Celular:</label>
					    <input class="form-control telCel" type="text" name="txtCel" id="txtCel" />
					  </p>
					  <hr>
					  <p> 
					  	<label for="cel"> Login:</label>
					    <input class="form-control login" type="text" name="txtLogin" id="txtLogin" required='required'/>
					  </p>
					  <span id="msg"></span>
					  <br>
					  <div>
					    <button type="submit" class="btn btn-success" name="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp &nbsp
					  	<button type="button" class="btn btn-danger" name="btnCancel"><i class="fa fa-trash-o"></i> </button>
					  </div>
					</form>
		</div>
	</div>
<script>
		$(document).ready( function () {
			$('#FormCadProf').submit( function() {
				var that = this,
					dados = $(this).serialize();
				$.ajax({
					url : $(that).attr('action'),
					type : 'POST',
					data : dados,
					success : function (responseText) {
						//alert(responseText);
						//document.getElementById('msg').style.color="red";
						document.getElementById('msg').innerHTML = responseText;
					}
				});
				
				return false;
			});
		});
</script>
</body>
