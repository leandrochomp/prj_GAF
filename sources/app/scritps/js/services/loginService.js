'use strict';
app.factory('loginService',function($http){
	return{
		login:function(data,scope){
			var $promise=$http.post('data/user.php',data); //send data to user.php
			$promise.then(function(msg){
				if(msg.data=='succes') scope.msgtxt='Correct information';
				else  				   scope.msgtxt='incorrect information';
			});
		}
	}

});