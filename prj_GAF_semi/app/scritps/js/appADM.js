var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider) {
  $routeProvider
  	.when('/', {
  		templateUrl: 'View/ADM/adm_index.html', 
  		// controller: 'admController'
  	})

    .when('/cu', {
      templateUrl: '/ADM/alterarProfessor.html', 
      // controller: 'admController'
    })

    .when('/puta', {
      templateUrl: 'View/ADM/cadastrarRecepcionista.html', 
      // controller: 'admController'
    })

    .when('/alterar', {
      templateUrl: 'View/ADM/teste.html', 
      // controller: 'admController'
    })
  	/*
  	.when('/menu', {
  		templateUrl: 'Menu/menu.html', 
  		controller: 'semcontroller'
  	})*/
  	.otherwise({redirectTo: '/'
  	});
});
