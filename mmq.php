<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include 'variables/variables.php'; ?>

<title><?php echo($title); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.8/css/dataTables.bootstrap.min.css">


<!-- jQuery library -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.8/js/dataTables.bootstrap.min.js"></script>

<!--<script src="/js/login.js"></script>-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="/js/jquery.csv-0.71.js"></script>
<script type="text/javascript" src="/js/mmq.js"></script>

</head>
<header></header>


<nav class="navbar navbar-inverse">
	<div id='php_nav_content' name='php_nav_content'><?php include 'nav.php'; ?></div>
</nav>
<body>

<div class="container-fluid">
<?php 

$pgDisplayed = $_GET["pg"]; 
if ($pgDisplayed == Keepers) {
	include('./includes/MMQKeepers.php');
}
/*elseif ($pgDisplayed == ChangeProposal) {
	include('MMQ_2015_proposed.htm');
}*/
else
{
	include('MMQ_2015.htm');
}

?>
</div>

</body>
<footer class="footer"><div class="container"> <p class="text-muted"><?php echo($footer); ?></p></div></footer>

</html>



