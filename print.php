<?php
	include('connection.php');
	//$handle = printer_open("Bullzip PDF Printer");
//	printer_start_doc($handle,"My Document");
//	printer_start_page($handle);
//	$font = printer_create_font("Arial", 72, 48, 400, false, false, false, 0);
//	printer_select_font($handle,$font);
//	printer_draw_text($handle,"test", 10, 10);
//	printer_delete_font($font);
//
//	printer_end_page($handle);
//	printer_end_doc($handle);
//	printer_close($handle);

	$handle=fopen('textcheck.html','w');
	$result=mysql_query("SELECT * FROM studdetails")  or die(mysql_error());
	$row=mysql_fetch_array($result);
	$str="<html><head></head><body><input type='button' value='Print' onclick='window.print()' /><table align='center'><tr><td>SALAVATION ARMY HIGHER SECONDARY SCHOOL</td></tr><tr><td align='center'>KOWDIAR</td></tr><tr><td>".$row['admno']."</td><td>".$row['fname']."</td></tr><tr><td>".$row['lname']."</td><td>".$row['std']."</td></tr></table></body></html>";
	fwrite($handle,$str);
	include('html\html2fpdf.php');
	$pdf=new HTML2FPDF();
	$pdf->AddPage();
	$fp = fopen("test.html","r");
	$strContent = fread($fp, filesize("test.html"));
	fclose($fp);
	$pdf->WriteHTML($strContent);
	$pdf->Output("sample.pdf");
	//echo "PDF file is generated successfully!";
	
	//echo "<script>window.open('textcheck.html'); </script>";
//	exec("acrord32.exe /t /n sample.pdf");
	$result=mysql_query("SELECT * FROM studdetails")  or die(mysql_error());
?>
<html>
<head>
</head>
<body>
<br />
<input type="button" value="Print" onClick="window.c" />
<iframe src="sample.pdf" width="100%" height="100%" ></iframe>
</body>
</html>