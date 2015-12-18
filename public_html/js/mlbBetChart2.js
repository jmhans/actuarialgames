google.load('visualization', '1', {
    packages: ['corechart', 'line', 'table']
});
google.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {

	create_std_mlb_team_compare_chart('Wins minus losses', 'Game Number', 'Win Differential', "/includes/googleChart.php?data_type=diff", 'chart_div_Diff');
	create_std_mlb_team_compare_chart('Rally', 'Game Number', 'Rally', "/includes/googleChart.php?data_type=rally", 'chart_div_Rally');	
	create_std_mlb_team_compare_chart('Strikeouts', 'Game Number', 'Strikeouts', "/includes/googleChart.php?data_type=k", 'chart_div_k');
	create_std_mlb_team_compare_chart('Hit By Pitch', 'Game Number', 'HBP', "/includes/googleChart.php?data_type=hbp", 'chart_div_hbp');
}

function create_std_mlb_team_compare_chart(chartLabel, xAxisLabel, yAxisLabel, chartDataSrc, chartDisplayDivName) {
	var jsonData = $.ajax({
		url: chartDataSrc,
		dataType:"json",
		async: false
	}).responseText;
	
	// Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
	  var options = {
        title: chartLabel,
		hAxis: {
            title: xAxisLabel
        },
        vAxis: {
            title: yAxisLabel
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

	  // Instantiate and draw our chart, passing in some options.

	var chart = new google.visualization.LineChart(document.getElementById(chartDisplayDivName));
      chart.draw(data, options);
	
}
