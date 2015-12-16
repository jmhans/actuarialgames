<?php 

include_once 'includes/database.php';
include_once 'variables/variables.php';
include_once 'includes/crypt.inc';

if(count($_POST)>0) {

	$params = explode(":", $_POST['cookie']);
	
	$entered_user 	= $params[0];
	$users_qry 		= mysql_query("SELECT * FROM users WHERE username='" . $entered_user . "'");
	$cookie_Series 	= utf8_decode($params[1]);
	$cookie_Token 	= utf8_encode($params[2]);
		
	if ($users_qry) { // Query successfully executed.
		$count = mysql_num_rows($users_qry);
		if ($count == 1) {
			$qry_Result 	= mysql_fetch_assoc($users_qry);
			$stored_cookie 	= explode(":", $qry_Result['cookieToken']);
			
			if ($stored_cookie[0] == $cookie_Series) { // Series matches
				if ($stored_cookie[1] == $cookie_Token) { // Token validated.  Allow login and generate new token.
					session_start();
					$_SESSION["username"] = $entered_user;
					$_SESSION["signed_in"] = TRUE;	
					$series = utf8_encode($params[1]);
					$token 	= utf8_encode(base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM))); // Regenerate token
					
					$users_qry = mysql_query("UPDATE users SET cookieToken = '" . $series . ":" . $token . "' WHERE userName='" . $entered_user . "'");
					setrawcookie("loginCookie", $entered_user . ":" . $series . ":" . $token, time() + 60 * 60 * 24 * $loginCookieExpirationTime);
					print "<br>Success! " . $_SESSION["username"] . " is logged in." ; 
				}
				else { // Stale token.  Assume theft occurred on prior login and warn user. 
					print "<br> " . $stored_cookie[1] . "<br>" . $cookie_Token;
					print "<br>Warning! Login cookie may have been compromised. Password information was not stored in the cookie, but to prevent future unauthorized access to this site, it is recommended that you change your password.";
				}
			}
			else { // Series doesn't match - Do not allow login.
				print "<br>'Remember me' information not recognized.  Please sign in again. (ERROR 1)" ; 
				print  "<br>" . utf8_decode($stored_cookie[0]);
				print "<br>" . utf8_encode($cookie_Series);
			}
		}
		
	}
	else {
		die('Invalid query: ' . mysql_error());
		print "<br>Login failed";
	}
} 
else {
   print "<br>'Remember me' information not recognized.  Please sign in again. (ERROR 2)" ;
} 

		mysql_close($conn);

?>