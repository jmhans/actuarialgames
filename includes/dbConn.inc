<?php // Connects to your Database 

$mysql_host = "mysql8.000webhost.com";
$mysql_database = "a5236623_DB";
$mysql_user = "a5236623_admin";
$mysql_password = "admin1";

mysql_connect($mysql_host, $mysql_user, $mysql_password) or die(mysql_error()); 
 mysql_select_db($mysql_database) or die(mysql_error()); ?>