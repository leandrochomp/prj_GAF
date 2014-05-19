// JavaScript Document
$(document).ready( function () {
			$('#FormLogin').submit( function() {
				var that = this,
				dados = $(this).serialize();
/** forma antiga
				// $.ajax({
				// 	url : $(that).attr('action'),
				// 	type : 'POST',
				// 	data : dados,
				// 	success : function (responseText) {
				// 		//alert(responseText);
				// 		document.getElementById('msg').style.color="red";
				// 		document.getElementById('msg').innerHTML = responseText;
				// 	}
				// });
*/
			$.ajax({
					url : $(that).attr('action'),
					type : 'POST',
					data : dados,
					//AJAX REDIRECIONANDO PARA O LOGIN CORRESPONDENTE AO USER
					success : function (responseText) {
						if (responseText == 'ADM') {
							window.location = 'View/ADM/adm_index.html';
						}
						if (responseText== 'professor') {
							window.location = 'View/Professor/professor_index.html';
						}
						if (responseText== 'recepcionista') {
							window.location = 'View/Recepcionista/recepcionista_index.html';
						}
						if (responseText== 'aluno') {
							window.location = 'View/Aluno/aluno_index.html';
						}
						 else {
						 	document.getElementById('msg').style.color="red";
							document.getElementById('msg').innerHTML = responseText;
						}
					}
				});

				return false;
			});
		});