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
	//carregando o combo
	require_once '../../model/categoria.class.php';
	require_once '../../model/atividade.class.php'; 
    $categoria = new categoria();
    $categoria->conecta();

    $codigo = $_GET['cod'];
	$atividade = new atividade();
	$atividade->conecta();
	atividade::PreencheAtividade($codigo);
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
				<STRONG> CADASTRAR ATIVIDADE </STRONG>
				<hr/>
					<form id="FormCadAtividade" name="FormCadAtividade" method="post" action="../../controller/editar.atividade.repositorio.php?cod=<?php echo $_GET['cod']?>">
					  <p>
					  <label for="grupo">Grupo Muscular:</label>
                      <select class="form-control grupoMusc" name="sltGrupo" id="sltGrupo">
                      	<?php
                        	categoria::MostraGrupoMuscular();
                        ?>
                      </select>
					  </p>
					  <p>
					  	<label for="serie">Atividade/Aparelho:</label>
					    <input class="form-control atividade" type="text" name="txtAtividade" id="txtAtividade" value="<?php echo $nome;?>"/>
					  </p>

					  <p>
					    <label for="serie">Série:</label>
					    <input class="form-control serie" type="text" name="txtSerie" id="txtSerie" value="<?php echo $serie;?>"/>

					    <label for="carga">Carga:</label>
					    <input class="form-control carga" type="text" name="txtCarga" id="txtCarga" value="<?php echo $carga;?>"/>					
					  </p>
					  <p>
					    <label for="repeticao">Repetição:</label>
					    <input class="form-control repeticao" type="text" name="txtRep" id="txtRep" value="<?php echo $repeticao;?>"/>
					    
					    <label for="tempo">Tempo:</label>
					    <input class="form-control tempo" type="text" name="txtTempo" id="txtTempo" value="<?php echo $tempo;?>"/>
					  </p>
					  <br>
					  	<button type="submit" class="btn btn-success" id="btnSalvar"> <i class="fa fa-check-circle"></i> </button> 
					  	&nbsp
					  	<button type="button" class="btn btn-warning" id="btnCancelar"><i class="fa fa-eraser"></i> </button>
					  	</p>
					  	<span id="msg"> </span>
					</form>
				</div>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="../../app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="../../app/scritps/LIB/bootstrap.js"></script>
    <script src="../../app/scritps/js/Professor/atividade.js"> </script>
</body>
</html>