<?php 	
	session_start();
	if(isset($_SESSION['id'])){
		unset($_SESSION['id']);
		unset($_SESSION['nome']);
	}
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="app/styles/bootstrap.css" rel="stylesheet">
    <link href="app/styles/style_login.css" rel="stylesheet">
</head>

<body>
	<div class="panel caixaLogin vcenter">
		<div class="row">
			<div class="col-md-12">
				<img class="img-responsive logo" src="app/images/logo.png" />
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 formulario">
				<form role="form" id="FormLogin" method="post" action="controller/login.repositorio.php">
				  <div class="form-group">
				    <input type="text" class="form-control icon-login" id="txtLoginTela" name="txtLoginTela" placeholder="Usuario">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control icon-password" id="txtSenhaTela" name="txtSenhaTela" placeholder="Senha">
				  </div>
                                  <span id="msg"> </span>
				  <button type="submit" class="btn btn-default">Entrar</button>
				  <a href="#">Esqueceu a senha?</a>
				</form>
			</div>
		</div>
	</div>
    
    <script type="text/javascript" src="app/scritps/LIB/jquery-1.11.0.js "></script>
    <script type="text/javascript" src="app/scritps/LIB/bootstrap.js"></script>
    <script src="app/scritps/js/login.js">
    //js foi colocado no final do HTML por design pattern javascript
	</script>
</body>
</html>