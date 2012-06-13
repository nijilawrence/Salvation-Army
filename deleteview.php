<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Salvation Army</title>
</head>

<body>
<div class="a">
<div class="b">
<table height="80" align="center" style="padding:10" width="60%">
<tr>
<td rowspan="2" width="20%" align="center">
<img src="emblem2.gif" width="80" height="80" style="margin-left:auto;margin-right:auto" />
</td>
<td width="80%">
<h1 align="center" style="margin-bottom:0">Salvation Army Higher Secondary School</h1>
</td>
</tr>
<tr>
<td>
<h2 align="center" style="margin-top:0">Kowdiar</h2>
</td>
</tr>
</table>
</div>
<div class="c" align="justify">

<ol style="list-style:none; margin-left:50; margin-top:0">
<li><a href="addstudent.php" style="text-decoration:none; color:inherit;">Add New Student</a></li>
<li><a href="markview.php" style="text-decoration:none; color:inherit;">Marks</a></li>
<li><a href="studview.php" style="text-decoration:none; color:inherit;">Student Details</a></li>
<li><a href="printview.php" style="text-decoration:none; color:inherit;">Print</a></li>
<li><a href="deleteview.php" style="text-decoration:none; color:inherit;">Delete</a></li>
<li><a href="logout.php" style="text-decoration:none; color:inherit;">Log out</a></li>
</ol>

</div>
<div class="d">
<form method="post">
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>Select how to delete student</legend>
<ol style="list-style:none; margin-left:50; margin-top:0">
<li><a href="deletebyname.php" style="text-decoration:none; color:inherit;">Delete by Name</a></li>
<li><a href="deletebyadmno.php" style="text-decoration:none; color:inherit;">Delete by Admission Number</a></li>
<li><a href="deletebyclass.php" style="text-decoration:none; color:inherit;">Delete by Class</a></li>
<li><a href="deletebycategory.php" style="text-decoration:none; color:inherit;">Delete by Category</a></li>
<li><a href="deleteall.php" style="text-decoration:none; color:inherit;">Delete From Full List</a></li>
</ol>
</fieldset>
<br><br><br>
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>Select how to view deleted Student details</legend>
<ol style="list-style:none; margin-left:50; margin-top:0">
<li><a href="leftwithtcview.php" style="text-decoration:none; color:inherit;">Left With T C</a></li>
<li><a href="passedview.php" style="text-decoration:none; color:inherit;">Passed Out</a></li>
<li><a href="fulldeletedview.php" style="text-decoration:none; color:inherit;">Deleted</a></li>
</ol>
</fieldset>
</form>

</div>
</div>
</body>
</html>