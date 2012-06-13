<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=excel.xls");

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

include('connection.php');


$result = mysql_query("SELECT * FROM studdetails ORDER BY std,division,fname") or die(mysql_error());

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
<th colspan=17>&nbsp;First Term&nbsp;</th>
<th colspan=17>&nbsp;Second Term&nbsp;</th>
<th colspan=17>&nbsp;Third Term&nbsp;</th>
</tr>
<tr>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th colspan=2>&nbsp;Malayalam&nbsp;</th>
<th colspan=2>&nbsp;Sanskrit&nbsp;</th>
<th colspan=2>&nbsp;English&nbsp;</th>
<th colspan=2>&nbsp;Hindi&nbsp;</th>
<th colspan=2>&nbsp;Basic Science&nbsp;</th>
<th colspan=2>&nbsp;Social Science&nbsp;</th>
<th colspan=2>&nbsp;Maths&nbsp;</th>
<th >&nbsp;Total&nbsp;</th>
<th colspan=2>&nbsp;Average&nbsp;</th>
<th colspan=2>&nbsp;Malayalam&nbsp;</th>
<th colspan=2>&nbsp;Sanskrit&nbsp;</th>
<th colspan=2>&nbsp;English&nbsp;</th>
<th colspan=2>&nbsp;Hindi&nbsp;</th>
<th colspan=2>&nbsp;Basic Science&nbsp;</th>
<th colspan=2>&nbsp;Social Science&nbsp;</th>
<th colspan=2>&nbsp;Maths&nbsp;</th>
<th >&nbsp;Total&nbsp;</th>
<th colspan=2>&nbsp;Average&nbsp;</th>
<th colspan=2>&nbsp;Malayalam&nbsp;</th>
<th colspan=2>&nbsp;Sanskrit&nbsp;</th>
<th colspan=2>&nbsp;English&nbsp;</th>
<th colspan=2>&nbsp;Hindi&nbsp;</th>
<th colspan=2>&nbsp;Basic Science&nbsp;</th>
<th colspan=2>&nbsp;Social Science&nbsp;</th>
<th colspan=2>&nbsp;Maths&nbsp;</th>
<th >&nbsp;Total&nbsp;</th>
<th colspan=2>&nbsp;Average&nbsp;</th>
</tr>
<tr>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th><th>Grade</th>
<th>Mark</th>
<th>Mark</th><th>Grade</th>
</tr>";
while($row=mysql_fetch_array($result))
{
	if($row['std']>=5 && $row['std']<=7)
	{
	$adm=$row['admno'];
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
	$result1 = mysql_query("SELECT * FROM firstup WHERE admno='$adm'") or die(mysql_error());
	$row1=mysql_fetch_array($result1);
	$total=0;
	$strtoprt.="<td>".$row1['malayalam']."</td><td>".$row1['malayalamg']."</td>";
	$strtoprt.="<td>".$row1['sanskrit']."</td><td>".$row1['sanskritg']."</td>";
	$strtoprt.="<td>".$row1['english']."</td><td>".$row1['englishg']."</td>";
	$strtoprt.="<td>".$row1['hindi']."</td><td>".$row1['hindig']."</td>";
	$strtoprt.="<td>".$row1['basicscience']."</td><td>".$row1['basicscienceg']."</td>";
	$strtoprt.="<td>".$row1['socialscience']."</td><td>".$row1['socialscienceg']."</td>";
	$strtoprt.="<td>".$row1['maths']."</td><td>".$row1['mathsg']."</td>";
	$total=$row1['malayalam']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['basicscience']+$row1['socialscience']+$row1['maths'];
	$avg=round($total/7,3);
	$strtoprt.="<td>".$total."</td><td>".$avg."</td><td>".grade($avg)."</td>";	
	$result1 = mysql_query("SELECT * FROM secondup WHERE admno='$adm'") or die(mysql_error());
	$row1=mysql_fetch_array($result1);
	$total=0;
	$strtoprt.="<td>".$row1['malayalam']."</td><td>".$row1['malayalamg']."</td>";
	$strtoprt.="<td>".$row1['sanskrit']."</td><td>".$row1['sanskritg']."</td>";
	$strtoprt.="<td>".$row1['english']."</td><td>".$row1['englishg']."</td>";
	$strtoprt.="<td>".$row1['hindi']."</td><td>".$row1['hindig']."</td>";
	$strtoprt.="<td>".$row1['basicscience']."</td><td>".$row1['basicscienceg']."</td>";
	$strtoprt.="<td>".$row1['socialscience']."</td><td>".$row1['socialscienceg']."</td>";
	$strtoprt.="<td>".$row1['maths']."</td><td>".$row1['mathsg']."</td>";
	$total=$row1['malayalam']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['basicscience']+$row1['socialscience']+$row1['maths'];
	$avg=round($total/7,3);
	$strtoprt.="<td>".$total."</td><td>".$avg."</td><td>".grade($avg)."</td>";	
	$result1 = mysql_query("SELECT * FROM thirdup WHERE admno='$adm'") or die(mysql_error());
	$row1=mysql_fetch_array($result1);
	$total=0;
	$strtoprt.="<td>".$row1['malayalam']."</td><td>".$row1['malayalamg']."</td>";
	$strtoprt.="<td>".$row1['sanskrit']."</td><td>".$row1['sanskritg']."</td>";
	$strtoprt.="<td>".$row1['english']."</td><td>".$row1['englishg']."</td>";
	$strtoprt.="<td>".$row1['hindi']."</td><td>".$row1['hindig']."</td>";
	$strtoprt.="<td>".$row1['basicscience']."</td><td>".$row1['basicscienceg']."</td>";
	$strtoprt.="<td>".$row1['socialscience']."</td><td>".$row1['socialscienceg']."</td>";
	$strtoprt.="<td>".$row1['maths']."</td><td>".$row1['mathsg']."</td>";
	$total=$row1['malayalam']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['basicscience']+$row1['socialscience']+$row1['maths'];
	$avg=round($total/7,3);
	$strtoprt.="<td>".$total."</td><td>".$avg."</td><td>".grade($avg)."</td></tr>";	
	$i++;
	}
}
$strtoprt.="</table>
</body>
</html>";
echo $strtoprt;
?>