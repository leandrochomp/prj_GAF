// JavaScript Document
$(document).ready( function () {

	function verificaNumero(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                	alert('digite apenas números');
                    return false;
                }
        }

    $("#txtTempo").keypress(verificaNumero);
    $("#txtRep").keypress(verificaNumero);
    $("#txtCarga").keypress(verificaNumero);
    $("#txtSerie").keypress(verificaNumero);
    
    
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
				window.location.href = '../../../GAF/View/Professor/listarAtividade.php'
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