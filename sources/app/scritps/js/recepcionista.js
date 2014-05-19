// JavaScript Document
$(document).ready( function () {
//retirar pontos na hora de inserir
    //$("#txtCPF").mask("999.999.999-99"); //mascarando para cpf

	$('#FormCadRecp').submit( function() {
		var that = this,
		dados = $(this).serialize();

		$.ajax({
			url : $(that).attr('action'),
			type : 'POST',
			data : dados,
			success : function (responseText) {
				document.getElementById('msg').style.color="red";
				document.getElementById('msg').innerHTML = responseText;
				//LIMPA O FORM INTEIRO APÓS O CADASTRO
				$('#FormCadRecp').trigger("reset");
			}
		});

		return false;
	});

	//isto não esta em uso, mas é uma forma de se limpar o form e uma maneira facil
	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
	};
	
	//limpando o form professor
	$( "#btnCancel" ).click(function() {
		//resetForm($('#FormCadRecp'))
		$('#FormCadRecp').trigger("reset");
	});
});