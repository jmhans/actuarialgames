google.load('visualization', '1', {
    packages: ['corechart', 'line', 'table']
});
google.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {

    var diffoptions = {
        title: 'Wins minus losses',
		hAxis: {
            title: 'Game Number'
        },
        vAxis: {
            title: 'Win Differential'
        },
		series: { 
			0:{ color: '#3366FF'}, // Blue - MIL_DIFF
			1:{ color: '#FF0000'}, // Red - MIN_Diff
			2:{ color: '#C2D1FF'}, // Light Blue - Mil Target
			3:{ color: '#FF9999'} // Light Red - Minn Target
		},
		'height':400,
		'width':600

    };
	    var rallyoptions = {
        title: 'Rally',
		hAxis: {
            title: 'Game Number'
        },
        vAxis: {
            title: 'Rally'
        },
		series: { 
			2:{ color: '#3366FF'}, // Light Blue - MIL_RALLY
			3:{ color: '#FF0000'}, // Yellow - MIL_RALLY
			0:{ color: '#C2D1FF'}, // Light Blue - Mil High Point
			1:{ color: '#FF9999'} // Light Red - Minn High Point
		},
		'height':400,
		'width':600

    };





var jsondiffData = $.ajax({
          url: "/includes/googleChart.php?data_type=diff",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var diffdata = new google.visualization.DataTable(jsondiffData);
 	// Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div_Diff'));
      chart.draw(diffdata, diffoptions);

var jsonrallyData = $.ajax({
          url: "/includes/googleChart.php?data_type=rally",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var rallydata = new google.visualization.DataTable(jsonrallyData);
 
	// Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.LineChart(document.getElementById('chart_div_Rally'));
      chart.draw(rallydata, rallyoptions);
	
}