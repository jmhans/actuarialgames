angular.module('myApp.nfl', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/nfl', {
    templateUrl: 'components/propbets/nfl/nfl_prop.html',
    controller: 'nflCtrl'
  });
}])

.controller('nflCtrl', function($scope) {
    $scope.$on('$viewContentLoaded', function() {
		$('#rbPtsTbl').DataTable( {
        "ajax": {
			"url": '/data/jsonRBData.json', 
			"dataSrc": function (json) {
				var newJSON = [];
				for ( var i=0, ien=json.data.length ; i<ien; i++) {
					if (getPlyrFantasyPts( json.data[i] ) > 0) {
						newItem = json.data[i];
						newItem["Fantasy Pts"] = getPlyrFantasyPts(newItem);
						newJSON.push(newItem);
					}

				}
				return newJSON;
			}
		}, 
		"iDisplayLength": -1,
		"autoWidth" : false,
		"responsive": true,
		"bLengthChange": false,
		"bPaginate": false,
		"columns": [
            { "data": "PLAYER, TEAM POS" },
            { "data": "RuYD" },
            { "data": "RuTD" },
			{ "data": "ReYD" },
            { "data": "ReTD" },
			{ "data": "FUML" },
			{ "data": "Fantasy Pts" }
			
        ],
		"columnDefs": [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 6 }
		],
		"order": [[6, "desc"]],
		"initComplete": function( settings ) {
        var api 	= this.api();
		var allData = api.data();
		var minPts 	= 0;
		var gbPts 	= 0;
		
		for (var plyr = 0; plyr < allData.length; plyr++) {
				plyrObj = allData[plyr];
				
				if (plyrObj["PLAYER, TEAM POS"].indexOf(", Min") > -1 ) {
					minPts += parseFloat(getPlyrFantasyPts(plyrObj));
				}
				else if (plyrObj["PLAYER, TEAM POS"].indexOf(", GB") > -1 ) {
					gbPts += parseFloat(getPlyrFantasyPts(plyrObj));
				}
		}	
	
		$("#rbPtsSummary").html("MIN:" + minPts.toFixed(1) +  ", GB:" + gbPts.toFixed(1)) ;
    }
    } );
	});
	
	  startup();
	
	
})



function getPlyrFantasyPts(plyrObj) {
return 			Math.round((
				( // Yard based scoring: 1 yd = 0.1 pts
					parseFloat(plyrObj["RuYD"]) + 
					parseFloat(plyrObj["ReYD"]) 
				) * 0.1 + 	
				( // TD based scoring: 1 TD = 6.0 pts
					parseFloat(plyrObj["RuTD"]) + 
					parseFloat(plyrObj["ReTD"]) + 
					parseFloat(plyrObj["MiscTD"]) 
				) * 6.0 + 
				( // Passing TD based scoring: 1 TD = 4 pts
					parseFloat(plyrObj["PaTD"])
				) * 4.0 + 
				( // 2-Pt conversions
					parseFloat(plyrObj["2PC"])
				) * 2.0 + 
				( // Passing Yds: 1 yd = 0.04 pts
					parseFloat(plyrObj["PaYD"]) 
				) * 0.04 + 
				( // Fumbles & Interceptions -1 pt each
					parseFloat(plyrObj["FUML"]) + 
					parseFloat(plyrObj["PaINT"])
				) * -1.0) * 100.0 ) / 100.0;
	
}


$(document).ready(function() {
    
} );


