<?php
session_start();

if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	include('connection.php');
	$result = mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password'") or die(mysql_error());
	if(mysql_num_rows($result))
	{
		$_SESSION['name']=$username;
		echo "<script>location.href='index.php'</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Username/Password')</script>";
	}
}
?>
<html>
<head>
<title>Salvation Army</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
</head>
<body id="login-bg">
 
<!-- Start: login-holder --> 
<div id="login-holder">

	<!-- start logo --> 
	<div id="logo-login">
		<img src="images/shared/logo.png" width="156" height="40" alt="" />
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	<h1 align="center" style="margin-top:-25; font-weight:900; font-size:36px">S A H S S</h1><br><br>

	<!--  start login-inner -->
	<div id="login-inner">
    <form method="post">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text" name="username"  class="login-inp" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="password" value="******"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="login" class="submit-login"  /></td>
		</tr>
		</table></form>
	</div>
 	<!--  end login-inner -->
	<div class="clear"></div>
	
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>