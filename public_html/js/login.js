 if(window.attachEvent) {
    window.attachEvent('onload', initialLoad);
} 
else {
    if(window.onload) {
        var curronload = window.onload;
        var newonload = function() {
            curronload();
            initialLoad();
        };
        window.onload = newonload;
    } else {
        window.onload = initialLoad;
    }
	
} 

function initialLoad()
{
	var name = 'loginCookie';
	var loginCookie = getCookie(name);
	
	if (loginCookie == '') {
		$(".register_Element").hide();
	}
	else  { // User is logged in 		

		CookieLogin(encodeURI(loginCookie));
		
		$("#frmUser").hide();
		
	}
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return unescape(c.substring(name.length,c.length));
    }
    return "";
}



function callLogin() {

	var userName = document.getElementById("userName").value;
	var password = document.getElementById("password").value;
	var rememberMe = document.getElementById("rememberMe").value;

	xmlHttpRequest=new XMLHttpRequest();
	xmlHttpRequest.onreadystatechange=function() {
		if (xmlHttpRequest.readyState==4 && xmlHttpRequest.status==200) {
			document.getElementById("messageBoxId").innerHTML=xmlHttpRequest.responseText;
			initialLoad();
		}
	}

	xmlHttpRequest.open("POST","signin.php",true);
	xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttpRequest.send("userName="+userName+"&password="+password+"&rememberMe="+rememberMe);

	navContentRequest=new XMLHttpRequest();
	navContentRequest.onreadystatechange=function() {
		if (navContentRequest.readyState==4 && navContentRequest.status==200) {
			document.getElementById("php_nav_content").innerHTML=navContentRequest.responseText;
			initialLoad();
		}
	}

	navContentRequest.open("POST","nav.php",true);
	navContentRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	navContentRequest.send();
}

function callLoginByCookie(cookie) {

	xmlHttpRequest=new XMLHttpRequest();
	xmlHttpRequest.onreadystatechange=function() {
		if (xmlHttpRequest.readyState==4 && xmlHttpRequest.status==200) {
			document.getElementById("messageBoxId").innerHTML=xmlHttpRequest.responseText;
			// initialLoad();
		}
	}

	xmlHttpRequest.open("POST","signin_cookie.php",true);
	xmlHttpRequest.setRequestHeader("Content-type","multipart/form-data");
	xmlHttpRequest.send("cookie="+unescape(cookie));

	navContentRequest=new XMLHttpRequest(); 
	navContentRequest.onreadystatechange=function() {
		if (navContentRequest.readyState==4 && navContentRequest.status==200) {
		document.getElementById("php_nav_content").innerHTML=navContentRequest.responseText;
		}
	}

	navContentRequest.open("POST","nav.php",true);
	navContentRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	navContentRequest.send();
	
}

function CookieLogin(cookie) {

	$.ajax({
		url: "signin_cookie.php", 
		method: "POST",
		context: document.getElementById("messageBoxId"),
		contentType: "multipart/form-data",
		dataType: "html", 
		data: "cookie="+cookie
	}).done(function(req){
		this.innerHTML=req.responseText;
		});

	navContentRequest=new XMLHttpRequest();
	navContentRequest.onreadystatechange=function() {
		if (navContentRequest.readyState==4 && navContentRequest.status==200) {
		document.getElementById("php_nav_content").innerHTML=navContentRequest.responseText;
		}
	}

	navContentRequest.open("POST","nav.php",true);
	navContentRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	navContentRequest.send();
	
}







function callLogout() {

	xmlHttpRequest=new XMLHttpRequest();
	xmlHttpRequest.onreadystatechange=function() {
		if (xmlHttpRequest.readyState==4 && xmlHttpRequest.status==200) {
			document.getElementById("messageBoxId").innerHTML=xmlHttpRequest.responseText;
			initialLoad();
		}
	}
	//xmlHttpRequest.open("POST","signin.php?userName="+userName+"&password="+password,true);
	xmlHttpRequest.open("POST","signin.php",true);
	xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlHttpRequest.send("userName="+userName+"&password="+password);

}


function registerUser()
{
var userName = document.getElementById("userName").value;
var password = document.getElementById("password").value;
var emailAddress = document.getElementById("emailAddress").value;
var fName = document.getElementById("firstName").value;
var lName = document.getElementById("lastName").value;

var passwordConfirm = document.getElementById("passwordConfirm").value;
	if (password == passwordConfirm) {
		xmlHttpRequest=new XMLHttpRequest();
		xmlHttpRequest.onreadystatechange=function() {
			if (xmlHttpRequest.readyState==4 && xmlHttpRequest.status==200) {
				
				
				if (xmlHttpRequest.responseText == 1) {
				// User creation was successful.  
				callLogin();
				}
				else {
				// User creation was unsuccessful. Display error message.
				document.getElementById("messageBoxId").innerHTML=xmlHttpRequest.responseText;
				}
				
			}
		}
		xmlHttpRequest.open("POST","includes/register.php",true);
		xmlHttpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlHttpRequest.send("userName="+userName+"&password="+password+"&emailAddress="+emailAddress+"&fName="+fName+"&lName="+lName)
	}
	else {
		document.getElementById("messageBoxId").innerHTML="Password entries do not match. Please try again.";
	}

}

function showRegister()
{
$(".register_Element").show();
$(".login_only_Element").hide();
}
