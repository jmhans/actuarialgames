'use strict';

angular.module('myApp.ffb', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/ffb/mmq', {
    templateUrl: 'components/fantasy/mmq/MMQ_2015.htm',
    controller: 'ffbCtrl'
  });
  
  $routeProvider.when('/ffb/mmq/keepers', {
    templateUrl: 'components/fantasy/mmq/MMQKeepers.htm',
    controller: 'mmqCtrl'
  });
  
  $routeProvider.when('/ffb/footballdex', {
    templateUrl: 'components/fantasy/footballdex/FootballDex_2015.htm',
    controller: 'ffbCtrl'
  });
  
  
}])

.controller('ffbCtrl', function($scope) {


})

.controller('mmqCtrl', function($scope) {
  $scope.$on('$viewContentLoaded', function() {
	  
	  var table =  $('#example').DataTable( {
        "ajax": '/data/2015Keepers.JSON', 
		"pagingType": "simple_numbers",
		"lengthMenu": [ [16,-1], [16, "All"] ], 
		"columns": [
	{ "data": "Translated Team" },
	{ "data": "PLAYER, TEAM POS" },
    { "data": "Last Year Cost" },
	{ "data": "ADV" },
	{ "data": "2015 Keeper Cost" }
    ] 
} );
  });
});
