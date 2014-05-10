'use strict';
// Declare app level module which depends on filters, and services
var app= angular.module('myApp', ['ngRoute']);
app.config(['$routeProvider', function($routeProvider) {
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
