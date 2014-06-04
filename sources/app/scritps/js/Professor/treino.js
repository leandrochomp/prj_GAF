// JavaScript Document
$(document).ready( function () {
	$('#FormCadTreino').submit( function() {
		var that = this,
			dados = $(this).serialize();
		
		$.ajax({
			url : $(that).attr('action'),
			type : 'POST',
			data : dados,
			success : function (responseText) {
				document.getElementById('msg').style.color="red";
				document.getElementById('msg').innerHTML = responseText;
				//window.location.href = '../../../GAF/View/Professor/listarTreino.php'
				$('#FormCadTreino').trigger("reset"); 
			}
		});
		
		return false;
	});

	$( "#btnCancelar" ).click(function() {
		$('#FormCadTreino').trigger("reset");
	});
});