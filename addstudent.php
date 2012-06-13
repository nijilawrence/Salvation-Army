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
<form method="post" name="stud">
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>Input Form</legend>
<table style="margin-left:auto; margin-right:auto; width:80%; color:inherit;" cellpadding="3">
<tr>
<td width="50%">First Name : </td>
<td width="50%"><input type="text" name="fname" value="<?php echo $_POST['fname'];?>"  />
</td>
</tr>
<tr>
<td width="50%">Last Name : </td>
<td width="50%"><input type="text" name="lname" value="<?php echo $_POST['lname'];?>"/>
</td>
</tr>
<tr>
<td width="50%">Admission Number : </td>
<td width="50%"><input type="text" name="anum" value="<?php echo $_POST['anum'];?>"/>
</td>
</tr>
<tr>
<td width="50%">Standard : </td>
<td width="50%"><input type="text" name="std" value="<?php echo $_POST['std'];?>"/>
</td>
</tr>
<tr>
<td width="50%">Division : </td>
<td width="50%"><input type="text" name="division" value="<?php echo $_POST['division'];?>"/>
</td>
</tr>
<tr>
<td width="50%">Sex : </td>
<td width="50%"><select name="sex">
<option></option>
<option value="Male" <?php echo $_POST['sex']=='Male'?'selected':''; ?> >Male</option>
<option value="Female" <?php echo $_POST['sex']=='Female'?'selected':''; ?> >Female</option>
</select>
</td>
</tr>
<tr>
<td width="50%">Category : </td>
<td width="50%"><select name="category">
<option></option>
<option value="Normal" <?php echo $_POST['category']=='Normal'?'selected':''; ?> >Normal</option>
<option value="OH" <?php echo $_POST['category']=='OH'?'selected':''; ?> >OH</option>
<option value="MR" <?php echo $_POST['category']=='MR'?'selected':''; ?> >MR</option>
<option value="LD" <?php echo $_POST['category']=='LD'?'selected':''; ?> >LD</option>
<option value="VI" <?php echo $_POST['category']=='VI'?'selected':''; ?> >VI</option>
<option value="MR & OH" <?php echo $_POST['category']=='MR & OH'?'selected':''; ?> >MR & OH</option>
</select>
</td>
</tr>
<tr>
<td width="50%">Name of Father : </td>
<td width="50%"><input type="text" name="father" value="<?php echo $_POST['father'];?>" />
</td>
</tr>
<tr>
<td width="50%">Name of Mother : </td>
<td width="50%"><input type="text" name="mother" value="<?php echo $_POST['mother'];?>"/>
</td>
</tr>
<tr>
<td width="50%">Name of Guardian : </td>
<td width="50%"><input type="text" name="guardian" value="<?php echo $_POST['guardian'];?>"/>
</td>
</tr>
<tr>
<td width="50%" style="vertical-align:middle;">Address : </td>
<td width="50%"><textarea rows="3" name="address" style="width:200"><?php echo $_POST['address'];?></textarea>
</td>
</tr>
<tr>
<td width="50%">Identification Marks : </td>
<td width="50%">
1.&nbsp;<input type="text" name="identif1" style="width:185" value="<?php echo $_POST['identif1'];?>"/><br>
2.&nbsp;<input type="text" name="identif2" style="width:185" value="<?php echo $_POST['identif2'];?>"/>
</td>
</tr>
<tr>
<td width="50%"></td>
<td width="50%">
<input type="submit" name="sub" value="Save" />
&nbsp;<input name="back" type="button" value="<< Back" onClick="location.href='index.php'"  />
</td>
</tr>
</table>
</fieldset>
<?php
if(isset($_POST['sub']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$anum=$_POST['anum'];
	$std=intval($_POST['std']);
	$division=strtoupper($_POST['division']);
	$sex=$_POST['sex'];
	$category=$_POST['category'];
	$father=$_POST['father'];
	$mother=$_POST['mother'];
	$guardian=$_POST['guardian'];
	$address=$_POST['address'];
	$address=trim($address);
	$address=str_replace("'","''",$address);
	$identif1=$_POST['identif1'];
	$identif2=$_POST['identif2'];
	include('connection.php');
	
	if($std>=5 && $std<=7)
	{
		mysql_query("INSERT INTO studdetails(fname,lname,admno,std,division,sex,category,father,mother,guardian,address,ident1,ident2) VALUES ('$fname','$lname','$anum','$std','$division','$sex','$category','$father','$mother','$guardian','$address','$identif1','$identif2')")  or die(mysql_error());
		mysql_query("INSERT INTO firstup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		mysql_query("INSERT INTO secondup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		mysql_query("INSERT INTO thirdup(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		echo "<script>document.stud.reset();</script>";
		echo "<script>location.href='addstudent.php'</script>";
	}
	else if($std>=8 && $std<=10)
	{
		mysql_query("INSERT INTO studdetails(fname,lname,admno,std,division,sex,category,father,mother,guardian,address,ident1,ident2) VALUES ('$fname','$lname','$anum','$std','$division','$sex','$category','$father','$mother','$guardian','$address','$identif1','$identif2')")  or die(mysql_error());
		mysql_query("INSERT INTO firsths(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		mysql_query("INSERT INTO secondhs(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		mysql_query("INSERT INTO thirdhs(fname,lname,admno,std,division) VALUES ('$fname','$lname','$anum','$std','$division')")  or die(mysql_error());
		echo "<script>document.stud.reset();</script>";
		echo "<script>location.href='addstudent.php'</script>";
	}
	else
	{
		echo "<script>alert('ENTER A VALID CLASS (5-10)');</script>";
	}
}
?>
</form>

</div>
</div>
</body>
</html>