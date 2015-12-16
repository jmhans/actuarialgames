<?php

session_start();
if(!isset($_SESSION['org_referer']))
{
    $_SESSION['referrer'] = $_SERVER['HTTP_REFERER'];
}
else 
{
	$_SESSION['referrer'] = 'index.php' ;
}

unset($_SESSION["userName"]);

setcookie('loginCookie', '', time() - 60);


 header("Location:" . $_SESSION['referrer']);

?>