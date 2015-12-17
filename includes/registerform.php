
<form name="frmUser" id="frmUser" method="post" action="">
<div id="loginDivId">
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>

<tr class="register_Element">
<td align="right">First Name</td>
<td><input type="text" name="firstName" id="firstName"></td>
</tr>

<tr class="register_Element">
<td align="right">Last Name</td>
<td><input type="text" name="lastName" id="lastName"></td>
</tr>

<tr class="login_Element">
<td align="right">Username</td>
<td><input type="text" name="userName" id="userName"></td>
</tr>

<tr class="register_Element">
<td align="right">Email</td>
<td><input type="text" name="emailAddress" id="emailAddress"></td>
</tr>

<tr class="login_Element">
<td align="right">Password</td>
<td><input type="password" name="password" id="password"></td>
</tr>
<tr class="register_Element">
<td align="right">Confirm Password</td>
<td><input type="password" name="passwordConfirm" id="passwordConfirm"></td>
</tr> 
<tr class="login_Element">
<td align="right">Remember Me?</td>
<td><input type="checkbox" name="rememberMe" id="rememberMe"></td>
</tr>

<tr class="tableheader">
	<td align="center" colspan="2">
		<input type="button" name="Register" class="register_Element" value="Create Account" onClick="registerUser();">
		<input type="button" name="submit" value="Log in" onClick="callLogin();">
		<input type="button" name="showReg" class="login_only_Element" value="Register" onClick="showRegister();">
	</td>
</tr>
</table>
</div>
</form>