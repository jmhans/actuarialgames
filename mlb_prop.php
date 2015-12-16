<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'variables/variables.php'; ?>

<title>Twins & Brewers Prop Page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--<script src="/js/login.js"></script>-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="/js/jquery.csv-0.71.js"></script>
<script type="text/javascript" src="/js/mlbBetChart3.js"></script>

</head>
<header></header>


<nav class="navbar navbar-inverse">
	<div id='php_nav_content' name='php_nav_content'><?php include 'nav.php'; ?></div>
</nav>
<body>

<div class="container-fluid">

<div id='messageBoxId' name='messageBoxId'></div>
<!--<?php include 'includes/registerform.php';?>-->

  <div id="Table_Container" style="float:left">
	<div id="Table Header" style="float:left">Current Bet Status</div>
	<br>
	<div id="blank_spot" style="float:left"></div>
  </div>
  <div id="chart_div_Diff" style="float:left"></div>
  <div id="chart_div_Rally" style="float:left"></div>
  <div id="chart_div_k" style="float:left"></div>
  <div id="chart_div_hbp" style="float:left"></div>
  <div id="chart_div_IP" style="float:left"></div>

<div id="Last Modified Info" style="float:left">  <?php
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.

$filename = './data/baseballdata.csv';
if (file_exists($filename)) {
    echo "Data was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
}
?>
</div>

<!--<div>
Team Strikeouts and HBPs
<script type="text/javascript" src="http://widgets.sports-reference.com/wg.fcgi?css=1&site=br&url=%2Fleagues%2FMLB%2F2015-standard-batting.shtml&div=div_teams_standard_batting&del_col=2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,18,19,20,21,22,23,24,26,27,28,29&del_row=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33"></script>
Hit Batters
<script type="text/javascript" src="http://widgets.sports-reference.com/wg.fcgi?css=1&site=br&url=%2Fleagues%2FMLB%2F2015-standard-pitching.shtml&div=div_teams_standard_pitching&del_col=2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,25,26,27,28,29,30,31,32,33,34,35,36&del_row=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33"></script>
</div>-->
</body>
<footer class="footer"><div class="container"> <p class="text-muted"><?php echo($footer); ?></p></div></footer>

</html>



