<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'variables/variables.php'; ?>
<title>NFL Prop Bet Page</title>

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
<script src="/js/nfl-espn-scrubber.js"></script>


</head>
<header></header>
<!--Test Comment 12.18.2015-->
<!--Test Comment #2 12.18.2015-->

<nav class="navbar navbar-inverse">
	<div id='php_nav_content' name='php_nav_content'><?php include 'nav.php'; ?></div>
</nav>
<body>


<h2>Replays</h2>
<br /><h4>Vikings:</h4><span id="vikingsSpan">Vikings:</span>
<br /><h4>Packers:</h4><span id="packersSpan">Packers:</span>

<form id="adminForm">
	Week Number: <input type="text" name="weekNumberInput">
	Test Game: <input type="text" name="gameNumberInput">
	
	<button type="button" name="gameNumberButton" onclick="getReplaysInGame(this.form.gameNumberInput.value)">Find This Game</button>
	<button type="button" name="gameFindButton" onclick="findallgames(this.form.weekNumberInput.value, this.form.gameNumberInput.value)">FindAllGames</button>
	<br />Team name: <input type="text" name="teamNameInput">
	<button type="button" name="teamFindButton" onclick="findteamReplays(this.form.teamNameInput.value)">Find Team Replays</button>
	
</form>

</body>





<footer class="footer"><div class="container"> <p class="text-muted"><?php echo($footer); ?></p></div></footer>

</html>



