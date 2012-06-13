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
	
	$result1=mysql_query("SELECT * FROM firstup WHERE admno='$adm'")  or die(mysql_error());
	$row1=mysql_fetch_array($result1);
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
		  <th align='left'>&nbsp;Class&nbsp;</th><td>".$row['std']."</td>
		  </tr>
		  <tr>
		  <th align='left'>&nbsp;Division&nbsp;</th><td>".$row['division']."</td>
		  </tr>
		  <tr>
		  <th align='left'>&nbsp;Sex&nbsp;</th><td>".$row['sex']."</td>
		  </tr>
		  <tr>
		  <th align='left'>&nbsp;Category&nbsp;</th><td>".$row['category']."</td>
		  </tr>
		  </table>
		  <br>
		  <br>
		  <table align='center' border='1'>
		  <tr>
		  <th rowspan='2'>Mark Details</th>
		  <th colspan='2'>First Term</th>
		  </tr>
		  <tr>
		  <th>Mark</th><th>Grade</th>
		  </tr>
		  <tr>
		  <th align='left'>Malayalam</th>
		  <td align='center'>".$row1['malayalam']."</td><td align='center'>".$row1['malayalamg']."</td>
		  </tr>
		  <tr>
		  <th align='left'>Sanskrit</th>
		  <td align='center'>".$row1['sanskrit']."</td><td align='center'>".$row1['sanskritg']."</td>
		  </tr>
		  <tr>
		  <th align='left'>English</th>
		  <td align='center'>".$row1['english']."</td><td align='center'>".$row1['englishg']."</td>
		  </tr>
		  <tr>
		  <th align='left'>Hindi</th>
		  <td align='center'>".$row1['hindi']."</td><td align='center'>".$row1['hindig']."</td>
		  </tr>
		  <tr>
		  <th align='left'>Basic Science</th>
		  <td align='center'>".$row1['basicscience']."</td><td align='center'>".$row1['basicscienceg']."</td>
		  </tr>
		  <tr>
		  <th align='left'>Social Science</th>
		  <td align='center'>".$row1['socialscience']."</td><td align='center'>".$row1['socialscienceg']."</td>
		  </tr>
		  <tr>
		  <th align='left'>Maths</th>
		  <td align='center'>".$row1['maths']."</td><td align='center'>".$row1['mathsg']."</td>
		  </tr>";
	$total1=$row1['malayalam']+$row1['sanskrit']+$row1['english']+$row1['hindi']+$row1['basicscience']+$row1['socialscience']+$row1['maths'];
	$avg1=round($total1/7,3);

	$str.="<tr>
		  <th align='left'>Total</th>
		  <td align='center'>".$total1."</td><td align='center'></td>
		 </tr>
		  <tr>
		  <th align='left'>Average</th>
		  <td align='center'>".$avg1."</td><td align='center'>".grade($avg1)."</td>
		  </tr>
		  </table>
		  </body>
		  </html>";
	
	
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