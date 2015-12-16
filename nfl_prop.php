<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'variables/variables.php'; ?>
<title>NFL Prop Bet Page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css">

<!-- jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<!--<script src="/js/login.js"></script>-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="/js/jquery.csv-0.71.js"></script>
<script src="/js/nfl-espn-scrubber.js"></script>
<script src="/js/nfl.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>

</head>
<header></header>


<nav class="navbar navbar-inverse">
	<div id='php_nav_content' name='php_nav_content'><?php include 'nav.php'; ?></div>
</nav>
<body>

<div class="row">
	<div id="WinsSpan" class="col-md-3">
		<h3>Replays</h3>
		<br /><h4>Vikings:</h4><span id="vikingsSpan">Vikings:</span>
		<br /><h4>Packers:</h4><span id="packersSpan">Packers:</span>
	</div>


	<div id="WinsSpan" class="col-md-4 dt-responsive">
		<h3>Packers vs. Vikings + 2.5</h3>
		<img src="data/VikesPackersWins.png" width="100%">
	</div>
	<div id="rbPtsSpan" class="col-md-5">
		<h3>RB Fantasy Points</h3>
		<div id="rbPtsSummary"></div>
		<table id="rbPtsTbl" class="display nowrap">
		 <thead>
            <tr>
                <th data-priority="1">PLAYER, TEAM POS</th>
				<th>RuYD</th>
				<th>RuTD</th>
				<th>ReYD</th>
				<th>ReTD</th>
				<th>Fum</th>
				<th data-priority="2">Fantasy Pts</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>PLAYER, TEAM POS</th>
				<th>RuYD</th>
				<th>RuTD</th>
				<th>ReYD</th>
				<th>ReTD</th>
				<th>Fum</th><th>Fantasy Pts</th>
				
            </tr>
        </tfoot></table>
	</div>
</div>

<div id="formSpan">
<button name="adminOptions" onclick="showAdminForm()">Admin Options</button>


<form id="adminForm">
	Input week number: <input type="text" name="weekNumberInput"><button type="button" name="gameFindButton" onclick="findallgames(this.form.weekNumberInput.value)">FindAllGames</button>
	<br />
	<!--Input game number: <input type="text" name="gameNumberInput"><button type="button" name="gameNumberButton" onclick="getReplaysInGame(this.form.gameNumberInput.value)">Find This Game</button>
	<br />
	Input team name: <input type="text" name="teamNameInput"><button type="button" name="teamFindButton" onclick="findteamReplays(this.form.teamNameInput.value)">Find Team Replays</button>-->
	<span id="txtHint"></span>	
	<span id="txtHint2"></span>	
	<br />
	<button type="button" name="hideFormButton" onclick="startup()">Reload Page</button>
	
</form>
</span
</body>


<footer class="footer"><div class="container"> <p class="text-muted"><?php echo($footer); ?></p></div></footer>

</html>



