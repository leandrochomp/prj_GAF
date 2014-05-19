// JavaScript Document
$(document).ready( function () {
	$('#FormCadProf').submit( function() {
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
				$('#FormCadProf').trigger("reset");
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
		$('#FormCadProf').trigger("reset");
	});
});