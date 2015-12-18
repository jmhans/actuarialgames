<?php 

include 'database.php';
include_once 'crypt.inc';

if(count($_POST)>0) {

/* You should pass the entire results of crypt() as the salt for comparing a
   password, to avoid problems when different hashing algorithms are used. (As
   it says above, standard DES-based password hashing uses a 2-character salt,
   but MD5-based hashing uses 12.) */
$users_qry = mysql_query("SELECT * FROM users WHERE username='" . $_GET["userName"] . "'");
$count = mysql_num_rows($users_qry);

if($count>0) {
print "Username already taken!";
} 
else {
	
$stored_hash = create_hash($_POST["password"]);
$entered_user = $_POST["userName"];
$entered_email = $_POST["emailAddress"];
$entered_Name = $_POST["fName"] . " " . $_POST["lName"];

$insertQry = "INSERT INTO users (username, password, emailAddress, RealName) VALUES ('" . $entered_user . "', '" . $stored_hash . "', '" . $emailAddress . "', '" . $entered_Name . "')";
$result = mysql_query($insertQry);

if ($result) {
	print $result;
}
else
{
   die('Invalid query: ' . mysql_error());
   print "<br>User Creation Failed";
}

}
		mysql_close($conn);
}
?>