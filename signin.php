<?php 

include_once 'includes/database.php';
include_once 'variables/variables.php';
include_once 'includes/crypt.inc';
		
if(count($_POST)>0) {

	$entered_user = $_POST["userName"];
	$users_qry = mysql_query("SELECT * FROM users WHERE username='" . $entered_user . "'");
	
	if ($users_qry) { // Query successfully executed.
		
		$count = mysql_num_rows($users_qry);
		if ($count == 1) {
			$qry_Result 		= mysql_fetch_assoc($users_qry);	
			$stored_password 	= $qry_Result['password'];
			$check_password 	= validate_password($_POST["password"], $stored_password);
			if ($check_password) { // User is successfully authenticated.  

				session_start();
				$_SESSION["username"] = $entered_user;
				$_SESSION["signed_in"] = TRUE;
						
				if($_POST['rememberMe']) {
					$series = utf8_encode(base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM))); // Regenerate token;
					$token 	= utf8_encode(base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM))); // Regenerate token;
					setrawcookie("loginCookie", $entered_user . ":" . $series . ":" . $token, time() + 60 * 60 * 24 * $loginCookieExpirationTime);
					$users_qry = mysql_query("UPDATE users SET cookieToken = '" . $series . ":" . $token . "' WHERE userName='" . $entered_user . "'");
				
				}
				
				
				print "<br>Success! " . $_SESSION["username"] . " is logged in." ; 
			}
			else {
				print "Invalid username or password!";
			}
		}
		
	}
	else {
		die('Invalid query: ' . mysql_error());
		print "<br>Login failed";
	}
} 
else {
   print "<br>Please enter a username and password.";
} 

		mysql_close($conn);

?>