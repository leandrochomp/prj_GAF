$(document).ready( function () {
	$('#FormCadProf').submit( function() {
		var that = this,
			dados = $(this).serialize();
			
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