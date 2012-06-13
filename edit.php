<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
input[type=text], select
{
	width:150;
}
</style>
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
	
$result=mysql_query("SELECT * FROM studdetails WHERE id='$id'")  or die(mysql_error());
$row=mysql_fetch_array($result);
$oldadmn=$row['admno'];
$oldclass=$row['std'];
echo "<table border=0 cellpadding=10 align=center width=80%>";
echo "<tr><td width=50%>Admission number :</td><td width=50%><input type='text' name='admno' value='".$row['admno']."' /></td></tr>";
echo "<tr><td width=50%>First Name :</td><td width=50%><input type='text' name='fname' value='".$row['fname']."' /></td></tr>";
echo "<tr><td width=50%>Last Name :</td><td width=50%><input type='text' name='lname' value='".$row['lname']."' /></td></tr>";
echo "<tr><td width=50%>Class :</td><td width=50%><input type='text' name='std' value='".$row['std']."' /></td></tr>";
echo "<tr><td width=50%>Division :</td><td width=50%><input type='text' name='division' value='".$row['division']."' /></td></tr>";
$male= $row['sex']=='Male'?'selected':'';
$female=$row['sex']=='Female'?'selected':'';
echo "<tr><td width=50%>Sex :</td><td width=50%><select name='sex'><option></option><option value='Male' ".$male." >Male</option><option value='Female' ".$female." >Female</option></select></td></tr>";
$normal= $row['category']=='Normal'?'selected':'';
$oh=$row['category']=='OH'?'selected':'';
$mr=$row['category']=='MR'?'selected':'';
$ld=$row['category']=='LD'?'selected':'';
$vi=$row['category']=='VI'?'selected':'';
$mroh=$row['category']=='MR & OH'?'selected':'';
echo "<tr><td width=50%>Category :</td><td width=50%><select name='category'><option></option><option value='Normal' ".$normal." >Normal</option><option value='OH' ".$oh." >OH</option><option value='MR' ".$mr." >MR</option><option value='LD' ".$ld." >LD</option><option value='VI' ".$vi." >VI</option><option value='MR & OH' ".$mroh." >MR & OH</option></select></td></tr>";
echo "<tr><td width=50%>Name of Father :</td><td width=50%><input type='text' name='father' value='".$row['father']."' /></td></tr>";
echo "<tr><td width=50%>Name of Mother</td><td width=50%><input type='text' name='mother' value='".$row['mother']."' /></td></tr>";
echo "<tr><td width=50%>Name of Guardian</td><td width=50%><input type='text' name='guardian' value='".$row['guardian']."' /></td></tr>";
echo "<tr><td width=50%>Address :</td><td width=50%><textarea rows='3' name='address' style='width:200'>".$row['address']."</textarea></td></tr>";
echo "<tr><td width=50%>Identification Mark :</td><td width=50%>1.&nbsp;<input type='text' name='ident1' value='".$row['ident1']."' /><br>2.&nbsp;<input type='text' name='ident2' value='".$row['ident2']."' /></td></tr>";
echo "<tr><td></td><td><input type='submit' name='submit' value='Update' style='background-color:inherit; color:inherit;'/>&nbsp;<input type='button' value='<<Back' onClick='history.go(-1)'/></td></tr>";
echo "</table>";


if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$admno=$_POST['admno'];
	$std=$_POST['std'];
	$division=strtoupper($_POST['division']);
	$sex=$_POST['sex'];
	$category=$_POST['category'];
	$father=$_POST['father'];
	$mother=$_POST['mother'];
	$guardian=$_POST['guardian'];
	$address=$_POST['address'];
	$address=trim($address);
	$address=str_replace("'","''",$address);
	$ident1=$_POST['ident1'];
	$ident2=$_POST['ident2'];
	
	
	if($oldclass>=5 && $oldclass<=7)
	{
		if($std>=5 && $std<=7)
		{
			mysql_query("UPDATE studdetails SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division',sex='$sex',category='$category',father='$father',mother='$mother',guardian='$guardian',address='$address',ident1='$ident1',ident2='$ident2' WHERE id='$id'")  or die(mysql_error());
			mysql_query("UPDATE firstup SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("UPDATE secondup SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("UPDATE thirdup SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			echo "<script>location.href='view.php?id=$id'</script>";
		}
		else if($std>=8 && $std<=10)
		{
			mysql_query("UPDATE studdetails SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division',sex='$sex',category='$category',father='$father',mother='$mother',guardian='$guardian',address='$address',ident1='$ident1',ident2='$ident2' WHERE id='$id'")  or die(mysql_error());
			mysql_query("DELETE FROM firstup WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("DELETE FROM secondup WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("DELETE FROM thirdup WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("INSERT INTO firsths(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			mysql_query("INSERT INTO secondhs(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			mysql_query("INSERT INTO thirdhs(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			echo "<script>location.href='view.php?id=$id'</script>";
		}
		else
		{
			echo "<script>alert('ENTER A VALID CLASS (5-10)');</script>";
		}
	}
	else
	{
		if($std>=5 && $std<=7)
		{
			mysql_query("UPDATE studdetails SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division',sex='$sex',category='$category',father='$father',mother='$mother',guardian='$guardian',address='$address',ident1='$ident1',ident2='$ident2' WHERE id='$id'")  or die(mysql_error());
			mysql_query("DELETE FROM firsths WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("DELETE FROM secondhs WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("DELETE FROM thirdhs WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("INSERT INTO firstup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			mysql_query("INSERT INTO secondup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			mysql_query("INSERT INTO thirdup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$admno','$std','$division')")  or die(mysql_error());
			echo "<script>location.href='view.php?id=$id'</script>";
		}
		else if($std>=8 && $std<=10)
		{
			mysql_query("UPDATE studdetails SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division',sex='$sex',category='$category',father='$father',mother='$mother',guardian='$guardian',address='$address',ident1='$ident1',ident2='$ident2' WHERE id='$id'")  or die(mysql_error());
			mysql_query("UPDATE firsths SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("UPDATE secondhs SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			mysql_query("UPDATE thirdhs SET admno='$admno',fname='$fname',lname='$lname',std='$std',division='$division' WHERE admno='$oldadmn'")  or die(mysql_error());
			echo "<script>location.href='view.php?id=$id'</script>";
		}
		else
		{
			echo "<script>alert('ENTER A VALID CLASS (5-10)');</script>";
		}
	}
}
?>
</fieldset>
</form>

</div>
</div>
</body>
</html>