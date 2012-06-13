<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");

	include('connection.php');
	$id=$_GET['id'];
	$handle=fopen('textcheck.html','w');
	$result=mysql_query("SELECT * FROM leftwithtc WHERE id='$id'")  or die(mysql_error());
	$row=mysql_fetch_array($result);
	$str="<html>
		  <head>
		  </head>
		  <body>
		  <center><h1>Salvation Army Higher Secondary School</h1></center>
		  <center><h2>Kowdiar</h2></center>
		  <br><br><br><br>
		  
		  <table align='center' border='1'>
		  <tr>
		  <th align='left' >&nbsp;Admission No.&nbsp;</th><td>".$row['admno']."</td>
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
		  <tr>
		  <th align='left'>&nbsp;Date of Leaving&nbsp;</th><td maxwidth='500'>".$row['date']."</td>
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