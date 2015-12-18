'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
  'ngRoute',
  'myApp.nfl', 
  'myApp.mlb', 
  'myApp.ffb', 
  'myApp.birthday'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.otherwise({redirectTo: '/nfl'});
}]);
