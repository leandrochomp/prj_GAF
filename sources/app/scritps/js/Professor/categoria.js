// JavaScript Document
$(document).ready( function () {
	$('#FormCadCategoria').submit( function() {
		var that = this,
			dados = $(this).serialize();
		
		$.ajax({
			url : $(that).attr('action'),
			type : 'POST',
			data : dados,
			success : function (responseText) {
				document.getElementById('msg').style.color="red";
				document.getElementById('msg').innerHTML = responseText;
				window.location.href = '../../../GAF/View/Professor/listarCategoria.php'
				document.getElementById('txtGrupo').value = ''; 
			}
		});
		
		return false;
	});

	$( "#btnCancelar" ).click(function() {
		$('#FormCadCategoria').trigger("reset");
	});
});