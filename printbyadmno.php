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
<?php
if(!isset($_POST['submit']))
{
?>
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>Enter Admission Number of Student</legend>
<table style="width:70%; margin-left:auto; margin-right:auto;">
<tr>
<td width="50%" align="center">Enter Admission Number : </td>
<td width="50%" align="left"><input type="text" name="admno"/></td>
</tr>
<tr>
<td></td>
<td align="left"><input type="submit" name="submit" value="View" style="background-color:inherit; color:inherit;" />
&nbsp;<input name="back" type="button" value="<< Back" onClick="history.go(-1)" />
</td>
</tr>
</table>
</fieldset>
<?php
}
if(isset($_POST['submit']))
{
?>
    <fieldset style="width:50%; margin-left:auto; margin-right:auto;">
	<legend>Mark details</legend>

<?php
	$admno=$_POST['admno'];
	
	include('connection.php');
	
	$result=mysql_query("SELECT * FROM studdetails WHERE admno='$admno'")  or die(mysql_error());
	echo "<table border=0 cellpadding=10 align=center style='text-align:center'>";
	echo "<tr><td>Admission No</td><td>First Name</td><td>Last Name</td><td>Class</td><td>Division</td><td>Category</td><td></td></tr>";
	while($row = mysql_fetch_object($result))
	{
	echo "<tr>";
	echo "<td>$row->admno</td>";
	echo "<td>$row->fname</td>";
	echo "<td>$row->lname</td>";
	echo "<td>$row->std</td>";
	echo "<td>$row->division</td>";
	echo "<td>$row->category</td>";
	echo "<td><input type='button' value='Print' name='print' style='background-color:inherit; color:inherit;' 
onClick=window.open('printonestudent.php?ad=".$row->admno."') /></td>";
	echo '</tr>';
	}
	echo '</table>';
?>

<input name="back" type="button" value="<< Back" onClick="history.go(-1)" style="float:right"/>   
</fieldset>
<?php
}

?>

</form>

</div>
</div>
</body>
</html>