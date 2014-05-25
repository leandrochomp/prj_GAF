// JavaScript Document
$(document).ready( function () {
			$('#FormLogin').submit( function() {
				var that = this,
				dados = $(this).serialize();
				
			$.ajax({
					url : $(that).attr('action'),
					type : 'POST',
					data : dados,
					//AJAX REDIRECIONANDO PARA O LOGIN CORRESPONDENTE AO USER
					success : function (responseText) {
						if (responseText == 'ADM') {
							window.location = 'View/ADM/adm_index.php';
						}
						if (responseText== 'professor') {
							window.location = 'View/Professor/professor_index.php';
						}
						if (responseText== 'recepcionista') {
							window.location = 'View/Recepcionista/recepcionista_index.php';
						}
						if (responseText== 'aluno') {
							window.location = 'View/Aluno/aluno_index.php';
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