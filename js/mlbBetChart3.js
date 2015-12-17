
// load the visualization library from Google and set a listener
google.load("visualization", "1", {packages:["corechart", "charteditor"]});
google.setOnLoadCallback(drawAllCharts);

function drawAllCharts() {
drawChart("Wins Minus Losses", [0,1,6,11,14], "Win Differential", 0, "chart_div_Diff");
drawChart("Rally", [0,12,15,2,7], "Rally count", 0, "chart_div_Rally");
drawChart("Strikeouts", [0,3,8], "Strikeouts", 500, "chart_div_k");
drawChart("Hit Batters", [0,4,9], "HBP + HB", 0, "chart_div_hbp");
drawChart("Innings Played", [0,5,10,13,16], "Innings", 0, "chart_div_IP");

//drawTable("data/highinning.csv");
drawTable("data/bet.csv");
}

 function drawTable(location) {
	    
		$.get(location, function(csvString) {
      // transform the CSV string into a 2-dimensional array
      var arrayData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});
     // this new DataTable object holds all the data
      var data = new google.visualization.arrayToDataTable(arrayData);
	  /* data.addColumn('string', 'Details');
	  for (i = 0; i < data.getNumberOfRows(); i++) {
		data.setValue(i, data.getNumberOfColumns()-1,  "Click for Details");
	  } */
	  
      // this view can select a subset of the data at a time
      var view = new google.visualization.DataView(data);
      view.setColumns([0,1,2,3,4,5,6,7]);

	  var table = new google.visualization.Table(document.getElementById('blank_spot'));
	  table.draw(view);
  
  });
		      
} 

// this has to be a global function
function drawChart(chartTitle, dataCols, yLabel, altMinY, displayDiv) {
   // grab the CSV
   
    $.get("data/baseballdata.csv", function(csvString) {
      // transform the CSV string into a 2-dimensional array
      var arrayData = $.csv.toArrays(csvString, {onParseValue: $.csv.hooks.castToScalar});

      // this new DataTable object holds all the data
      var data = new google.visualization.arrayToDataTable(arrayData);

      // this view can select a subset of the data at a time
      var view = new google.visualization.DataView(data);
      view.setColumns(dataCols);
	  var minY = view.getColumnRange(1).min;
	  var maxY = view.getColumnRange(1).max;
		 for (i = 1; i < view.getNumberOfColumns(); i++) { 
			minY = Math.min(minY, view.getColumnRange(i).min);
			maxY = Math.max(maxY, view.getColumnRange(i).max);
			} 
	  var vAxisOptions = '';
	  var hAxisOptions = '';
     // set chart options
		if (altMinY != 0) {
			minY = altMinY;
			hAxisOptions = {title: view.getColumnLabel(0), viewWindow:{max: view.getColumnRange(0).max, min:view.getColumnRange(0).max-30}};
	        vAxisOptions = {title: yLabel, viewWindow:{max:1300, min:900}};
		} else {
			hAxisOptions = {title: view.getColumnLabel(0), minValue: view.getColumnRange(0).min, maxValue: view.getColumnRange(0).max};
			vAxisOptions = {title: yLabel, viewWindowMode: 'maximized'};
		}
		
		var options = {
        title: chartTitle,
        hAxis: hAxisOptions,
		vAxis: vAxisOptions, 		
		series: { 
			0:{ color: '#3366FF'}, // Blue - MIL_DIFF
			1:{ color: '#FF0000'}, // Red - MIN_Diff
			2:{ color: '#C2D1FF'}, // Light Blue - Mil Target
			3:{ color: '#FF9999'} // Light Red - Minn Target
		},
		'height':400,
		'width':600
     };
	 
     // create the chart object and draw it
     var chart = new google.visualization.LineChart(document.getElementById(displayDiv));
     chart.draw(view, options);
  });
}
