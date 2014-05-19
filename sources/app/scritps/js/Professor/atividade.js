// JavaScript Document
$(document).ready( function () {
	$('#FormCadAtividade').submit( function() {
		var that = this,
			dados = $(this).serialize();
		
		$.ajax({
			url : $(that).attr('action'),
			type : 'POST',
			data : dados,
			success : function (responseText) {
				document.getElementById('msg').style.color="red";
				document.getElementById('msg').innerHTML = responseText;
				$('#FormCadAtividade').trigger("reset"); 
			}
		});
		
		return false;
	});

	$( "#btnCancelar" ).click(function() {
		//resetForm($('#FormCadRecp'))
		$('#FormCadAtividade').trigger("reset");
	});
});