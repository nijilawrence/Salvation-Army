<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");


function grade($mark)
{
	if($mark >=90)
		return 'A+';
	else if($mark>=80 && $mark<=89)
		return 'A';
	else if($mark>=70 && $mark<=79)
		return 'B+';
	else if($mark>=60 && $mark<=69)
		return 'B';	
	else if($mark>=50 && $mark<=59)
		return 'C+';	
	else if($mark>=40 && $mark<=49)
		return 'C';	
	else if($mark>=30 && $mark<=39)
		return 'D+';	
	else if($mark>=20 && $mark<=29)
		return 'D';	
	else
		return 'E';	
}

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
$adm=$_GET['ad'];

include('connection.php');
	
$result=mysql_query("SELECT * FROM thirdup WHERE admno='$adm'")  or die(mysql_error());
$row=mysql_fetch_array($result);

echo "<table border=0 cellpadding=5 align=center width=80%>";
echo "<tr><td width=50%>Admission number :</td><td width=50%>".$row['admno']."</td></tr>";
echo "<tr><td width=50%>First Name : </td><td width=50%>".$row['fname']."</td></tr>";
echo "<tr><td width=50%>Last Name : </td><td width=50%>".$row['lname']."</td></tr>";
echo "<tr><td width=50%>Class : </td><td width=50%>".$row['std']."</td></tr>";
echo "<tr><td width=50%>Division : </td><td width=50%>".$row['division']."</td></tr>";
echo "<tr><td width=50%>Malayalam : </td><td width=50%><label>".$row['malayalam']."</label><label>".$row['malayalamg']."</label></td></tr>";
echo "<tr><td width=50%>Sanskrit : </td><td width=50%><label>".$row['sanskrit']."</label><label>".$row['sanskritg']."</label></td></tr>";
echo "<tr><td width=50%>English : </td><td width=50%><label>".$row['english']."</label><label>".$row['englishg']."</label></td></tr>";
echo "<tr><td width=50%>Hindi : </td><td width=50%><label>".$row['hindi']."</label><label>".$row['hindig']."</label></td></tr>";
echo "<tr><td width=50%>Basic Science : </td><td width=50%><label>".$row['basicscience']."</label><label>".$row['basicscienceg']."</label></td></tr>";
echo "<tr><td width=50%>Social Science :</td><td width=50%><label>".$row['socialscience']."</label><label>".$row['socialscienceg']."</label></td></tr>";
echo "<tr><td width=50%>Mathematics :</td><td width=50%><label>".$row['maths']."</label><label>".$row['mathsg']."</label></td></tr>";
$total=$row['malayalam']+$row['sanskrit']+$row['english']+$row['hindi']+$row['basicscience']+$row['socialscience']+$row['maths'];
$avg=round($total/7,3);
echo "<tr><td width=50%>Total :</td><td width=50%>".$total."</td></tr>";
echo "<tr><td width=50%>Average :</td><td width=50%><label>".$avg."</label><label>".grade($avg)."</label></td></tr>";
echo "<tr><td width=50%></td><td width=50%><a href='thirdupedit.php?ad=".$adm."' style='text-decoration:none; color:inherit;'><input type='button' value='Edit' name='edit' style='background-color:inherit; color:inherit;'  /></a>&nbsp;<input type='button' value='Print' onClick=window.open('printthirdup.php?ad=".$adm."') />&nbsp;<input type='button' value='<<Back' onClick='history.go(-1)'/></td></tr>";
echo "</table>";
?>
</fieldset>
</form>

</div>
</div>
</body>
</html>