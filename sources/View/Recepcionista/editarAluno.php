<?php 
	require_once ('../../model/aluno.class.php');
	require_once ('../../model/professor.class.php');
	$codigo = $_GET['cod'];
	$pessoa = new pessoa();
	$pessoa->conecta();
	pessoa::PreencheTextAluno($codigo);
?>
<body>

	<meta charset="UTF-8">

<h1> CADASTRO DE ALUNO </h1>
      <div class="modal-body">
	  		<h2> PESSOA</h2>
	  		<form id="frmAluno" name="frmAluno" method="post" action="editar.aluno.php?cod=<?php echo $_GET['cod']?>">
				<label> Nome
	    			<input type="text" class="form-control" name="Nome" value="<?php echo $nome;?>">
	    		</label>
	    		<label> CPF
	    			<input type="text" class="form-control" name="CPF" value="<?php echo $CPF;?>">
	    		</label>
	    		<label> Email
	    			<input type="text" class="form-control" name="Email" value="<?php echo $email;?>">
	    		</label>
	    		<label>Telefone
	    			<input type="text" class="form-control" name="Telefone" value="<?php echo $telefone;?>">
	    		</label>
	    		<label> Celular
	    			<input type="text" class="form-control" name="Celular" value="<?php echo $cel;?>">
	    		</label>
	    		<label> Data Nascimento
	    			<input type="date" class="form-control" name="dtNasc" value="<?php echo $dtNasc;?>">
	    		</label>
	    		<label> Login 
	    			<input type="text" class="form-control" name="Login" value="<?php echo $login;?>">
	    		</label>
      			
      			<hr>

      			<h2> ALUNINHO  - MEDIDAS</h2> 
	    		<label> Peso 
	    			<input type="text" class="form-control" name="Peso" value="<?php echo $peso;?>">
	    			
	    		</label>
	    		<label> Altura 
	    			<input type="text" class="form-control" name="Altura" value="<?php echo $alt;?>">
	    			
	    		</label>
	    		<label> Peito 
	    			<input type="text" class="form-control" name="Peito" value="<?php echo $peito;?>">
	    			
	    		</label>
	    		<label> Cintura
	    			<input type="text" class="form-control" name="Cintura" value="<?php echo $cintura;?>">
	    			
	    		</label>
	    		<label> Quadril
	    			<input type="text" class="form-control" name="Quadril" value="<?php echo $quadril;?>">
	    			
	    		</label>
	    		<label> Braço
	    			<input type="text" class="form-control" name="Braco" value="<?php echo $braco;?>">
	    			
	    		</label>
	    		<label> Coxa
	    			<input type="text" class="form-control" name="Coxa" value="<?php echo $coxa;?>">
	    			
	    		</label>
  		</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
        	Close
        </button>
        <button type="submit" class="btn btn-primary">
        	Save changes
        </button>
      </div>
     
    </div>
  </div>
</div>
 </form>