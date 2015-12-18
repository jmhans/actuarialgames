'use strict';

angular.module('myApp.birthday', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/birthday', {
    templateUrl: 'components/big_birthday_date/2015/birthday_2015.htm',
    controller: 'birthdayCtrl'
  });

  
  
}])

.controller('birthdayCtrl', function($scope) {


})

