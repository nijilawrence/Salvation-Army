<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=excel.xls");

include('connection.php');

$category=$_GET['cat'];
$result = mysql_query("SELECT * FROM studdetails WHERE category!='Normal' ORDER BY std,division,fname") or die(mysql_error());

$i=1;
$strtoprt="<html>
<head>
<title>Test</title>
</head>
<body>
<table align='center' style='padding:10;text-align:center;' border='1'>
<tr>
<th>&nbsp;Sl no.&nbsp;</th>
<th>&nbsp;Admission No.&nbsp;</th>
<th>&nbsp;First Name&nbsp;</th>
<th>&nbsp;Last Name&nbsp;</th>
<th>&nbsp;Fathers Name&nbsp;</th>
<th>&nbsp;Mothers Name&nbsp;</th>
<th>&nbsp;Guardian Name&nbsp;</th>
<th>&nbsp;Sex&nbsp;</th>
<th>&nbsp;Category&nbsp;</th>
<th>&nbsp;Class&nbsp;</th>
<th>&nbsp;Division&nbsp;</th>
<th>&nbsp;Address&nbsp;</th>
<th>&nbsp;Identification Marks&nbsp;</th>
</tr>";
while($row=mysql_fetch_array($result))
{
	$strtoprt.="<tr><td>".$i."</td>";
	$strtoprt.="<td>".$row['admno']."</td>";
	$strtoprt.="<td>".$row['fname']."</td>";
	$strtoprt.="<td>".$row['lname']."</td>";
	$strtoprt.="<td>".$row['father']."</td>";
	$strtoprt.="<td>".$row['mother']."</td>";
	$strtoprt.="<td>".$row['guardian']."</td>";
	$strtoprt.="<td>".$row['sex']."</td>";
	$strtoprt.="<td>".$row['category']."</td>";
	$strtoprt.="<td>".$row['std']."</td>";
	$strtoprt.="<td>".$row['division']."</td>";
	$strtoprt.="<td>".$row['address']."</td>";
	$strtoprt.="<td>".$row['ident1']."<br>".$row['ident2']."</td>";
	$i++;
}
$strtoprt.="</table>
</body>
</html>";
echo $strtoprt;
?>