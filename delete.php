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
<fieldset style="width:60%; margin-left:auto; margin-right:auto;">
<legend>Confirm Delete</legend>
<?php
$adm=$_GET['ad'];
include('connection.php');
$result=mysql_query("SELECT * FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
$row=mysql_fetch_array($result);
?>
<table align="center" width="80%" cellpadding="10">
<tr>
<td width="50%"><?php echo $row['admno'];?></td>
<td width="50%"><?php echo $row['fname']."&nbsp;&nbsp;".$row['lname'];?></td>
</tr>
<tr>
<td><?php echo $row['std']."&nbsp;&nbsp;".$row['division'];?></td>
<td><?php echo $row['category'];?></td>
</tr>
<tr>
<td><input type="checkbox" name="left" value="1"/>&nbsp;Leaving with T C</td>
<td><input type="checkbox" name="passed" value="1"/>&nbsp;Passing out</td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Delete" onClick="return confirm('Are you sure you want to delete this data?')"  />&nbsp;&nbsp;<input type="button" onClick="history.go(-2)" value="<< Back" /></td>
</tr>
</table>
</fieldset>
</form>
<?php
if(isset($_POST['submit']))
{
	$left=$_POST['left'];
	$passed=$_POST['passed'];
	if($left==1 || $passed==1)
	{
		if($left==1)
		{
			mysql_query("INSERT INTO leftwithtc(admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,date) SELECT admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,now() FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
		}
		if($passed==1)
		{
			mysql_query("INSERT INTO passed(admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,date) SELECT admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,now() FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
		}
		mysql_query("INSERT INTO deleted(admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,date) SELECT admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,now() FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
		$result=mysql_query("SELECT * FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
		$row=mysql_fetch_array($result);
		$std=$row['std'];
		mysql_query("DELETE FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
		if($std>=5 && $std<=7)
		{
			mysql_query("DELETE FROM firstup WHERE admno='$adm'")  or die(mysql_error());
			mysql_query("DELETE FROM secondup WHERE admno='$adm'")  or die(mysql_error());
			mysql_query("DELETE FROM thirdup WHERE admno='$adm'")  or die(mysql_error());
		}
		else if($std>=8 && $std<=10)
		{
			mysql_query("DELETE FROM firsths WHERE admno='$adm'")  or die(mysql_error());
			mysql_query("DELETE FROM secondhs WHERE admno='$adm'")  or die(mysql_error());
			mysql_query("DELETE FROM thirdhs WHERE admno='$adm'")  or die(mysql_error());
		}
		echo "<script>alert('All records of the students have been deleted');location.href='deleteview.php'</script>";
	}
	else
		echo "<script>alert('Select one option');</script>";
}

//insert into leftwithtc(admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,date) select admno,fname,lname,std,division,sex,category,father,mother,guardian,address,ident1,ident2,now() from studdetails where admno=123457 
?>


</div>
</div>
</body>
</html>