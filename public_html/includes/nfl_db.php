<?php
    header('Content-Type: application/json');
	
function db_insert($gmNum, $game_date, $away_team, $home_team, $replay_text) {
$host = "mysql8.000webhost.com";
$db_user = "a5236623_admin";
$db_password = "DBadmin1";
$select_db = "a5236623_abl";
// Create connection
$conn = new mysqli($host, $db_user, $db_password, $select_db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO nfl_game_data (gameID, gameDate, awayTeam, homeTeam, replayText) VALUES ('" . $gmNum . "','" .  $game_date . "','".  $away_team . "','".  $home_team . "','" .  $replay_text . "') 
ON DUPLICATE KEY UPDATE gameID = '" . $gmNum . "'";
if ($conn->query($sql) === TRUE) {
    $out =  $replay_text;
} else {
    $out = "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
return $out;
}
function db_select($tmName) {
$host = "mysql8.000webhost.com";
$db_user = "a5236623_admin";
$db_password = "DBadmin1";
$select_db = "a5236623_abl";
// Create connection
$conn = new mysqli($host, $db_user, $db_password, $select_db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT gameDate as 'Game_Date', awayTeam, homeTeam, COUNT(replayID) As 'Total_Replays' FROM nfl_game_data WHERE awayTeam = '" . $tmName . "' OR homeTeam = '" . $tmName . "' GROUP BY gameDate, awayTeam, homeTeam";
$result = $conn->query($sql);
$total = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		$newDate = date_create($row["Game_Date"]);
		
		
        $out .= date_format($newDate, "m/d/Y") . " - " . $row["awayTeam"] . " @ " . $row["homeTeam"] . ":" . $row["Total_Replays"].  "<br>";
		$total += $row["Total_Replays"];
    }	
	$out .= "<h4><small>Total: " . $total . "</small></h4>";
} else {
    $out = "0 results";
}
$conn->close();
return $out;
	
}
    $aResult = array();
    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }
    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }
    if( !isset($aResult['error']) ) {
        switch($_POST['functionname']) {
            case 'db_insert':
               if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 5) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = db_insert(($_POST['arguments'][0]), ($_POST['arguments'][1]), ($_POST['arguments'][2]), ($_POST['arguments'][3]), ($_POST['arguments'][4]));
               }
               break;
			case 'db_select':
			   if( !is_array($_POST['arguments']) || (count($_POST['arguments']) < 1) ) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $aResult['result'] = db_select(($_POST['arguments'][0]));
               }
               break;
			default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }
    }
    echo json_encode($aResult);
?>