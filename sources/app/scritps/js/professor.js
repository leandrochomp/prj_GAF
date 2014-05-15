// JavaScript Document
function validarForm() {
		//criando variaveis para validacao
		var nome = document.getElementById('txtNome').value,
		cpf = document.getElementById('txtCPF').value,
		// comboNivel ??
		//data nascimento ?
		// comboSexo
		email = document.getElementById('txtEmail').value,
		telFixo = document.getElementById('txtFone').value,
		telCel = document.getElementById('txtCel').value,
		login = document.getElementById('txtLogin').value,
		msg = document.getElementById('msg').value

		tem_erros = false;
		var msg = "";


	document.getElementById('msg').innerHTML = '';
	
	if (nome == '') {
		tem_erros = true;
		msg="Digite seu nome";
	}
	
	if (cpf == '') {
		tem_erros = true;
		
		msg=" Digite seu email";
	}
	if (email == '') {
		tem_erros = true;
	
		msg=" Digite seu telefone";
	}

	if (telFixo == '') {
		tem_erros = true;
	
		msg=" Digite seu telefone";
	}

	if (TelCel == '') {
		tem_erros = true;
	
		msg=" Digite seu telefone";
	}
	if (login == '') {
		tem_erros = true;
		
		msg=" Digite seu login";
	}

	if (login == '') {
		tem_erros = true;

	}

	if (tem_erros) {
		document.getElementById('msg').innerHTML = msg;
		return false;
	}
		
	return true;
}

$(document).ready( function () {
	$('#frmAluno').submit( function() {
		var that = this,
			dados = $(this).serialize();
			
		if (! validarForm()) {
			return false;
		}
		
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