// JavaScript Document
function verificarCPF(){
    var i;
    var s = document.getElementById('txtCPF').value;
    var s = s.replace('.', '');
    var s = s.replace('.', '');
    var s = s.replace('-', '');
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
    if (d1 == 0){
        document.getElementById('msg').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
        document.getElementById('msg').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
        document.getElementById('msg').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
    if (!v) {    	
        document.getElementById('msg').innerHTML = "CPF VALIDO";
        return true;
    }
}

$(document).ready( function () {
	    $("#txtCPF").mask("999.999.999-99"); //mascarando cpf
		$('#FormCadProf').submit( function() {
		var that = this,
		dados = $(this).serialize();
		if (!verificarCPF()){
			return false;
		}

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