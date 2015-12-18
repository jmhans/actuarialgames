<?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['PHP_SELF'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>

<?php include_once 'variables/variables.php'; ?>
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><?php echo($title); ?></a>
    </div>
    <div>
      <ul class="nav navbar-nav">
	
<?php

 session_start();
 $u = $_SESSION['username'];
  if($_SESSION['signed_in'] == TRUE) {
  ?>

        <li><?php echo "<a>$u</a>"; ?></li>
        <li><a href='index.php'>my account</a></li>
		<li><a href='logout.php'>logout</a></li> 

<?php
	}
	else {
	?>

        <li <?=echoActiveClassIfRequestMatches("index")?>>
			<a href="index.php">Home</a>
		</li>
        <li <?=echoActiveClassIfRequestMatches("ablinfo")?>>
			<a href="ablinfo.php">ABL</a>
		</li>
		<li class="dropdown" <?=echoActiveClassIfRequestMatches("mmq")?>>
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expandied="false">Fantasy<span class="caret"></a>
			<ul class="dropdown-menu">
				<li><a href="http://actuarialgames.netne.net/#/ffb/mmq">MMQ</a></li>
					<ul>
						<li><a href="#/ffb/mmq">Constitution</a></li>
						<li><a href="#/ffb/mmq/keepers">Keeper Costs</a></li>
					</ul>
				<li><a href="#/ffb/footballdex">FootballDex</a></li>
			</ul>
		</li>
		<li class="dropdown" <?=echoActiveClassIfRequestMatches("mmq")?>>
			<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expandied="false">Prop Bets<span class="caret"></a>
			<ul class="dropdown-menu">
				<li><a href="#/mlb">MLB</a></li>
				<li><a href="#/nfl">NFL</a></li>
			</ul>
		</li>
        <li <?=echoActiveClassIfRequestMatches("birthday")?>>
			<a href="#/birthday">Big Birthday Date</a>
		</li>
		</ul>
		
		<!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		</ul>-->

<?php
	}
	?>
      
    </div> 
</div> <!-- end #container-fluid -->
