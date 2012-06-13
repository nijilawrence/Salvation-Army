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
<legend>All Details</legend>
<?php
$id=$_GET['id'];

include('connection.php');
	
$result=mysql_query("SELECT * FROM deleted WHERE id='$id'")  or die(mysql_error());
$row=mysql_fetch_array($result);
echo "<table border=0 cellpadding=5 align=center width=80%>";
echo "<tr><td width=50%>Admission number :</td><td width=50%>".$row['admno']."</td></tr>";
echo "<tr><td width=50%>First Name :</td><td width=50%>".$row['fname']."</td></tr>";
echo "<tr><td width=50%>Last Name :</td><td width=50%>".$row['lname']."</td></tr>";
echo "<tr><td width=50%>Class :</td><td width=50%>".$row['std']."</td></tr>";
echo "<tr><td width=50%>Division :</td><td width=50%>".$row['division']."</td></tr>";
echo "<tr><td width=50%>Sex :</td><td width=50%>".$row['sex']."</td></tr>";
echo "<tr><td width=50%>Category :</td><td width=50%>".$row['category']."</td></tr>";
echo "<tr><td width=50%>Name of Father :</td><td width=50%>".$row['father']."</td></tr>";
echo "<tr><td width=50%>Name of Mothe :r</td><td width=50%>".$row['mother']."</td></tr>";
echo "<tr><td width=50%>Name of Guardian :</td><td width=50%>".$row['guardian']."</td></tr>";
echo "<tr><td width=50%>Address :</td><td width=50%>".$row['address']."</td></tr>";
echo "<tr><td width=50%>Identification Mark :</td><td width=50%>".$row['ident1']."<br>".$row['ident2']."</td></tr>";
echo "<tr><td width=50%></td><td width=50%><input type='button' value='Print' onClick=window.open('printstuddetail.php?id=".$id."') />&nbsp;<input type='button' value='<<Back' onClick='history.go(-1)'/></td></tr>";
echo "</table>";
?>
</fieldset>
</form>

</div>
</div>
</body>
</html>