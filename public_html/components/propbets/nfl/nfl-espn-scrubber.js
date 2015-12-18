
function findGame(gameNum) {
		//gameNum = '400791638';
var xmlhttp = new XMLHttpRequest();

var url = "http://espn.go.com/nfl/playbyplay?gameId=" + gameNum;

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
		//RegExpTest(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();
}


function findallgames(weekNum) {
		
var xmlhttp = new XMLHttpRequest();

var url = "http://espn.go.com/nfl/scoreboard/_/year/2015/seasontype/2/week/" + weekNum;

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        findGameNumbers(xmlhttp.responseText);
		//RegExpTest(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

}

function findGameNumbers(response) {
		
 	var regex = /recap\?gameId=(4007\d*)/g;
	var matches = getMatches(response, regex, 1);
	var out = '';
	var arrayLength = matches.length;
	for (var i = 0; i < arrayLength; i++) {

		getReplaysInGame(matches[i]);
	}
	
	//document.getElementById("txtHint").innerHTML += out;
	
}

function getMatches(string, regex, index) {
  index || (index = 1); // default to the first capturing group
  var matches = [];
  var match;
  while (match = regex.exec(string)) {
    matches.push(match[index]);
  }
  return matches;
}


function getReplaysInGame(gameNum) {
	$.ajax({
  url: "http://espn.go.com/nfl/playbyplay?gameId=" + gameNum,
  context: document.body,
  success: function(result) {
	var out = '';
	var regex_Title = /<title>(.*) vs\. (.*) - Play-By-Play - (.*) - ESPN<\/title>/i
	var titleMatch = regex_Title.exec(result);
	var awayTeam = titleMatch[1];
	var homeTeam = titleMatch[2];
	var gameDate = new Date(titleMatch[3]);
	gameDate = gameDate.getFullYear() + '/' + (gameDate.getMonth() + 1) + '/' + gameDate.getDate();
	
	console.log('<br>' + awayTeam + ' ' + homeTeam + ' ' + gameDate + ":");
	
	
	// document.getElementById("txtHint").innerHTML += '<br>' + awayTeam + ' ' + homeTeam + ' ' + gameDate;	
	
	
	var regex = /<span.*class="post-play".*>[.|\s]*(.*challenge.*|.*review.*)[.|\s]*<\/span>/gi, match, indices = [];
	var matches = getMatches(result, regex, 1);
	
	var arrayLength = matches.length;
	var inputObj = [];
	inputObj.gameNum = gameNum;
	inputObj.gameDate = gameDate;
	inputObj.awayTeam = awayTeam;
	
	for (var i = 0; i < arrayLength; i++)
	{
			$.ajax({
			type: "POST",
			url: 'includes/nfl_db.php',
			dataType: 'json',
			data: {functionname: 'db_insert', arguments: [gameNum, gameDate, awayTeam, homeTeam, matches[i]]},

			success: function (obj, textstatus, inputObj) {
						  if( !('error' in obj) ) {
							  console.log('<br />' + obj.result);
							  // document.getElementById("txtHint").innerHTML += out;
						  }
						  else {
							  console.log(obj.error);
						  }
						  
					findteamReplays("Vikings", "vikingsSpan");
					findteamReplays("Packers", "packersSpan");
						  
					}
			});
	}
	
	
	
	}})
}


function findteamReplays(teamNm, element){
	var out ='';
	var outputelement = (element != '') ? element : 'txtHint';
	
			$.ajax({
			type: "POST",
			url: 'includes/nfl_db.php',
			dataType: 'json',
			data: {functionname: 'db_select', arguments: [teamNm]},

			success: function (obj, textstatus) {
						  if( !('error' in obj) ) {
							  out += '<br />' + obj.result;
							  document.getElementById(element).innerHTML = out;
						  }
						  else {
							  console.log(obj.error);
						  }
					}
			});

}

function showAdminForm(){
	document.getElementById("adminForm").style.visibility = "visible";
}

function startup(){
  document.getElementById("adminForm").style.visibility = "hidden";
  findteamReplays("Vikings", "vikingsSpan");
  findteamReplays("Packers", "packersSpan");
}


window.onload = function() {
  startup();

};











