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

	include('connection.php');
	$adm=$_GET['ad'];
	$handle=fopen('textcheck.html','w');
	$result=mysql_query("SELECT * FROM studdetails WHERE admno='$adm'")  or die(mysql_error());
	$row=mysql_fetch_array($result);
	if($row['std']>=5 && $row['std']<=7)
	{
		$result1=mysql_query("SELECT * FROM firstup WHERE admno='$adm'")  or die(mysql_error());
		$row1=mysql_fetch_array($result1);
		$result2=mysql_query("SELECT * FROM secondup WHERE admno='$adm'")  or die(mysql_error());
		$row2=mysql_fetch_array($result2);
		$result3=mysql_query("SELECT * FROM thirdup WHERE admno='$adm'")  or die(mysql_error());
		$row3=mysql_fetch_array($result3);
		$str="<html>
			  <head>
			  </head>
			  <body>
			  <center><h1>Salvation Army Higher Secondary School</h1></center>
			  <center><h2>Kowdiar</h2></center>
			  <br><br><br><br>
			  
			  <table align='center' border='1'>
			  <tr>
			  <th align='left'>&nbsp;Admission No.&nbsp;</th><td>".$row['admno']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;First Name&nbsp;</th><td>".$row['fname']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Last Name&nbsp;</th><td>".$row['lname']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Fathers Name&nbsp;</th><td>".$row['father']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Mothers Name&nbsp;</th><td>".$row['mother']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Guardian Name&nbsp;</th><td>".$row['guardian']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Sex&nbsp;</th><td>".$row['sex']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Category&nbsp;</th><td>".$row['category']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Class&nbsp;</th><td>".$row['std']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Division&nbsp;</th><td>".$row['division']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Address&nbsp;</th><td maxwidth='500'>".$row['address']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Identification Marks&nbsp;</th><td>1. ".$row['ident1']."<br>2. ".$row['ident2']."</td>
			  </tr>
			  </table>
			  <br>
			  <br>
			  <table align='center' border='1'>
			  <tr>
			  <th rowspan='2'>Mark Details</th>
			  <th colspan='2'>First Term</th>
			  <th colspan='2'>Second Term</th>
			  <th colspan='2'>Third Term</th>
			  </tr>
			  <tr>
			  <th>Mark</th><th>Grade</th>
			  <th>Mark</th><th>Grade</th>
			  <th>Mark</th><th>Grade</th>
			  </tr>
			  <tr>
			  <th align='left'>Malayalam</th>
			  <td align='center'>".$row1['malayalam']."</td><td align='center'>".$row1['malayalamg']."</td>
			  <td align='center'>".$row2['malayalam']."</td><td align='center'>".$row2['malayalamg']."</td>
			  <td align='center'>".$row3['malayalam']."</td><td align='center'>".$row3['malayalamg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Sanskrit</th>
			  <td align='center'>".$row1['sanskrit']."</td><td align='center'>".$row1['sanskritg']."</td>
			  <td align='center'>".$row2['sanskrit']."</td><td align='center'>".$row2['sanskritg']."</td>
			  <td align='center'>".$row3['sanskrit']."</td><td align='center'>".$row3['sanskritg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>English</th>
			  <td align='center'>".$row1['english']."</td><td align='center'>".$row1['englishg']."</td>
			  <td align='center'>".$row2['english']."</td><td align='center'>".$row2['englishg']."</td>
			  <td align='center'>".$row3['english']."</td><td align='center'>".$row3['englishg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Hindi</th>
			  <td align='center'>".$row1['hindi']."</td><td align='center'>".$row1['hindig']."</td>
			  <td align='center'>".$row2['hindi']."</td><td align='center'>".$row2['hindig']."</td>
			  <td align='center'>".$row3['hindi']."</td><td align='center'>".$row3['hindig']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Basic Science</th>
			  <td align='center'>".$row1['basicscience']."</td><td align='center'>".$row1['basicscienceg']."</td>
			  <td align='center'>".$row2['basicscience']."</td><td align='center'>".$row2['basicscienceg']."</td>
			  <td align='center'>".$row3['basicscience']."</td><td align='center'>".$row3['basicscienceg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Social Science</th>
			  <td align='center'>".$row1['socialscience']."</td><td align='center'>".$row1['socialscienceg']."</td>
			  <td align='center'>".$row2['socialscience']."</td><td align='center'>".$row2['socialscienceg']."</td>
			  <td align='center'>".$row3['socialscience']."</td><td align='center'>".$row3['socialscienceg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Maths</th>
			  <td align='center'>".$row1['maths']."</td><td align='center'>".$row1['mathsg']."</td>
			  <td align='center'>".$row2['maths']."</td><td align='center'>".$row2['mathsg']."</td>
			  <td align='center'>".$row3['maths']."</td><td align='center'>".$row3['mathsg']."</td>
			  </tr>";
		$total1=$row1['malayalam']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['basicscience']+$row1['socialscience']+$row1['maths'];
		$avg1=round($total1/7,3);
		$total2=$row2['malayalam']+$row2['sanskrit']+$row2['english']+$row2['hindi']+$row2['basicscience']+$row2['socialscience']+$row2['maths'];
		$avg2=round($total2/7,3);
		$total3=$row3['malayalam']+$row3['sanskrit']+$row3['english']+$row3['hindi']+$row3['basicscience']+$row3['socialscience']+$row3['maths'];
		$avg3=round($total3/7,3);

		$str.="<tr>
			  <th align='left'>Total</th>
			  <td align='center'>".$total1."</td><td align='center'></td>
			  <td align='center'>".$total2."</td><td align='center'></td>
			  <td align='center'>".$total3."</td><td align='center'></td>
			  </tr>
			  <tr>
			  <th align='left'>Average</th>
			  <td align='center'>".$avg1."</td><td align='center'>".grade($avg1)."</td>
			  <td align='center'>".$avg2."</td><td align='center'>".grade($avg2)."</td>
			  <td align='center'>".$avg3."</td><td align='center'>".grade($avg3)."</td>
			  </tr>
			  </table>
			  </body>
			  </html>";
	}
	else
	{
		$result1=mysql_query("SELECT * FROM firsths WHERE admno='$adm'")  or die(mysql_error());
		$row1=mysql_fetch_array($result1);
		$result2=mysql_query("SELECT * FROM secondhs WHERE admno='$adm'")  or die(mysql_error());
		$row2=mysql_fetch_array($result2);
		$result3=mysql_query("SELECT * FROM thirdhs WHERE admno='$adm'")  or die(mysql_error());
		$row3=mysql_fetch_array($result3);
		$str="<html>
			  <head>
			  </head>
			  <body>
			  <center><h1>Salvation Army Higher Secondary School</h1></center>
			  <center><h2>Kowdiar</h2></center>
			  <br><br><br><br>
			  
			  <table align='center' border='1'>
			  <tr>
			  <th align='left'>&nbsp;Admission No.&nbsp;</th><td>".$row['admno']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;First Name&nbsp;</th><td>".$row['fname']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Last Name&nbsp;</th><td>".$row['lname']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Fathers Name&nbsp;</th><td>".$row['father']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Mothers Name&nbsp;</th><td>".$row['mother']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Guardian Name&nbsp;</th><td>".$row['guardian']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Sex&nbsp;</th><td>".$row['sex']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Category&nbsp;</th><td>".$row['category']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Class&nbsp;</th><td>".$row['std']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Division&nbsp;</th><td>".$row['division']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Address&nbsp;</th><td maxwidth='500'>".$row['address']."</td>
			  </tr>
			  <tr>
			  <th align='left'>&nbsp;Identification Marks&nbsp;</th><td>1. ".$row['ident1']."<br>2. ".$row['ident2']."</td>
			  </tr>
			  </table>
			  <br>
			  <br>
			  <table align='center' border='1'>
			  <tr>
			  <th rowspan='2'>Mark Details</th>
			  <th colspan='2'>First Term</th>
			  <th colspan='2'>Second Term</th>
			  <th colspan='2'>Third Term</th>
			  </tr>
			  <tr>
			  <th>Mark</th><th>Grade</th>
			  <th>Mark</th><th>Grade</th>
			  <th>Mark</th><th>Grade</th>
			  </tr>
			  <tr>
			  <th align='left'>Malayalam 1</th>
			  <td align='center'>".$row1['malayalam1']."</td><td align='center'>".$row1['malayalam1g']."</td>
			  <td align='center'>".$row2['malayalam1']."</td><td align='center'>".$row2['malayalam1g']."</td>
			  <td align='center'>".$row3['malayalam1']."</td><td align='center'>".$row3['malayalam1g']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Malayalam 2</th>
			  <td align='center'>".$row1['malayalam2']."</td><td align='center'>".$row1['malayalam2g']."</td>
			  <td align='center'>".$row2['malayalam2']."</td><td align='center'>".$row2['malayalam2g']."</td>
			  <td align='center'>".$row3['malayalam2']."</td><td align='center'>".$row3['malayalam2g']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Sanskrit</th>
			  <td align='center'>".$row1['sanskrit']."</td><td align='center'>".$row1['sanskritg']."</td>
			  <td align='center'>".$row2['sanskrit']."</td><td align='center'>".$row2['sanskritg']."</td>
			  <td align='center'>".$row3['sanskrit']."</td><td align='center'>".$row3['sanskritg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>English</th>
			  <td align='center'>".$row1['english']."</td><td align='center'>".$row1['englishg']."</td>
			  <td align='center'>".$row2['english']."</td><td align='center'>".$row2['englishg']."</td>
			  <td align='center'>".$row3['english']."</td><td align='center'>".$row3['englishg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Hindi</th>
			  <td align='center'>".$row1['hindi']."</td><td align='center'>".$row1['hindig']."</td>
			  <td align='center'>".$row2['hindi']."</td><td align='center'>".$row2['hindig']."</td>
			  <td align='center'>".$row3['hindi']."</td><td align='center'>".$row3['hindig']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Physics</th>
			  <td align='center'>".$row1['physics']."</td><td align='center'>".$row1['physicsg']."</td>
			  <td align='center'>".$row2['physics']."</td><td align='center'>".$row2['physicsg']."</td>
			  <td align='center'>".$row3['physics']."</td><td align='center'>".$row3['physicsg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Chemistry</th>
			  <td align='center'>".$row1['chemistry']."</td><td align='center'>".$row1['chemistryg']."</td>
			  <td align='center'>".$row2['chemistry']."</td><td align='center'>".$row2['chemistryg']."</td>
			  <td align='center'>".$row3['chemistry']."</td><td align='center'>".$row3['chemistryg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Biology</th>
			  <td align='center'>".$row1['biology']."</td><td align='center'>".$row1['biologyg']."</td>
			  <td align='center'>".$row2['biology']."</td><td align='center'>".$row2['biologyg']."</td>
			  <td align='center'>".$row3['biology']."</td><td align='center'>".$row3['biologyg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Social Science</th>
			  <td align='center'>".$row1['socialscience']."</td><td align='center'>".$row1['socialscienceg']."</td>
			  <td align='center'>".$row2['socialscience']."</td><td align='center'>".$row2['socialscienceg']."</td>
			  <td align='center'>".$row3['socialscience']."</td><td align='center'>".$row3['socialscienceg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Maths</th>
			  <td align='center'>".$row1['maths']."</td><td align='center'>".$row1['mathsg']."</td>
			  <td align='center'>".$row2['maths']."</td><td align='center'>".$row2['mathsg']."</td>
			  <td align='center'>".$row3['maths']."</td><td align='center'>".$row3['mathsg']."</td>
			  </tr>
			  <tr>
			  <th align='left'>Information Technology</th>
			  <td align='center'>".$row1['informationtechnology']."</td><td align='center'>".$row1['informationtechnologyg']."</td>
			  <td align='center'>".$row2['informationtechnology']."</td><td align='center'>".$row2['informationtechnologyg']."</td>
			  <td align='center'>".$row3['informationtechnology']."</td><td align='center'>".$row3['informationtechnologyg']."</td>
			  </tr>";
		$total1=$row1['malayalam1']+$row1['malayalam2']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['physics']+$row1['physics']+$row1['biology']+$row1['socialscience']+$row1['maths']+$row1['informationtechnology'];
		$avg1=round($total1/11,3);
		$total2=$row2['malayalam1']+$row2['malayalam2']+$row2['sanskrit']+$row2['english']+$row2['hindi']+$row2['physics']+$row2['physics']+$row2['biology']+$row2['socialscience']+$row2['maths']+$row2['informationtechnology'];
		$avg2=round($total2/11,3);
		$total3=$row3['malayalam1']+$row3['malayalam2']+$row3['sanskrit']+$row3['english']+$row3['hindi']+$row3['physics']+$row3['physics']+$row3['biology']+$row3['socialscience']+$row3['maths']+$row3['informationtechnology'];
		$avg3=round($total3/11,3);

		$str.="<tr>
			  <th align='left'>Total</th>
			  <td align='center'>".$total1."</td><td align='center'></td>
			  <td align='center'>".$total2."</td><td align='center'></td>
			  <td align='center'>".$total3."</td><td align='center'></td>
			  </tr>
			  <tr>
			  <th align='left'>Average</th>
			  <td align='center'>".$avg1."</td><td align='center'>".grade($avg1)."</td>
			  <td align='center'>".$avg2."</td><td align='center'>".grade($avg2)."</td>
			  <td align='center'>".$avg3."</td><td align='center'>".grade($avg3)."</td>
			  </tr>
			  </table>
			  </body>
			  </html>";
	}
	
	fwrite($handle,$str);
	include('html\html2fpdf.php');
	$pdf=new HTML2FPDF();
	$pdf->AddPage();
	$fp = fopen("textcheck.html","r");
	$strContent = fread($fp, filesize("textcheck.html"));
	fclose($fp);
	$pdf->WriteHTML($strContent);
	$pdf->Output("sample.pdf");
?>
<html>
<head>
<title>Salvation Army</title>
</head>
<body>
<iframe src="sample.pdf" width="100%" height="100%" ></iframe>
</body>
</html>