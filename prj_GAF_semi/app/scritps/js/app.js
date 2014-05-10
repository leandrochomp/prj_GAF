
var app = angular.module('myApp', ['ngRoute']);
app.config(['$routeProvider','$httpProvider', 
  function($routeProvider,$httpProvider ) {
  $routeProvider
  	.when('/login', {
  		templateUrl: 'Login/login.html', 
  		controller: 'loginController'
  	})
  	/*
  	.when('/menu', {
  		templateUrl: 'Menu/menu.html', 
  		controller: 'semcontroller'
  	})*/
  	.otherwise({redirectTo: '/login'
  	});
}]);
