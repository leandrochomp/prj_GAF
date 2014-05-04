'use strict';

app.controller('loginController', ['$scope','loginService', function ($scope,loginService) {
	$scope.realizarLogin=function(data){
		loginService.login(data,$scope); //call login service
	};
}]);