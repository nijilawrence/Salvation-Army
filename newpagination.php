<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="style1.css">
<title>Salvation Army</title>
</head>

<body>
<div class="a">
<div class="b">
<table height="80" align="center" style="padding:10" width="60%">
<tr>
<td rowspan="2" width="20%">
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
<li><a href="#" style="text-decoration:none; color:inherit;">Mark Details</a></li>
</ol>

</div>
<div class="d">
<form method="post">
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>All student details</legend>

<?php
//// number of records to be displayed per page
//$records_per_page = 10;
//// look for starting marker
//// if not available, assume 0
//(!$_GET['start']) ? $start = 0 : $start = $_GET['start'];
//// open connection to MySQL server
//$connection = mysql_connect('localhost', 'salvation', 'salvation') 
//or die ('Unable to connect!');
//// select database for use
//mysql_select_db('salvation') or die ('Unable to select database!');
//// create and execute query to count records
//$query = "SELECT COUNT(*) FROM studdetails";
//$result = mysql_query($query) 
//or die ('Error in query: $query. ' . mysql_error());
//// get total number of records
//$row = mysql_fetch_row($result);
//$total_records = $row[0];
//// if records exist
//if (($total_records > 0) && ($start < $total_records))
//{
//// create and execute query to get batch of records
//$query = "SELECT * FROM studdetails ORDER BY fname LIMIT $start , $records_per_page";
//$result = mysql_query($query) 
//or die ('Error in query: $query. ' . mysql_error());
//// iterate over record set
//// print data
//echo "<table border=0 cellpadding=10 align=center>";
//echo "<tr><td></td><td></td><td>Admission No</td><td>First Name</td><td>Last Name</td><td>Class</td><td>Division</td></tr>";
//while($row = mysql_fetch_object($result))
//{
//echo '<tr>';
//echo "<td><a href=view.php?id=".$row->id." style='text-decoration:none; color:inherit;'><input type='button' value='View' name='view' style='background-color:inherit; color:inherit;'/></a></td>";
//echo "<td><a href=edit.php?id=".$row->id." style='text-decoration:none; color:inherit;'><input type='button' value='Edit' name='edit' style='background-color:inherit; color:inherit;'  /></a></td>";
//echo "<td>$row->admno</td>";
//echo "<td>$row->fname</td>";
//echo "<td>$row->lname</td>";
//echo "<td>$row->std</td>";
//echo "<td>$row->division</td>";
//echo '</tr>';
//}
//echo '</table>';
//// set up the previous page link
//// this should appear on all pages except the first page
//// the start point for the previous page will be
//// the start point for this page
//// less the number of records per page
//if ($start >= $records_per_page)
//{
//echo "<a href=viewall.php?start=" . ($start-$records_per_page) . " style='text-decoration:none; color:inherit;'>Previous Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
//}
//// set up the "next page" link
//// this should appear on all pages except the last page
//// the start point for the next page
//// will be the end point for this page
//if ($start+$records_per_page < $total_records && $start >= 0)
//{
//echo "<a href=viewall.php?start=" . ($start+$records_per_page) . " style='text-decoration:none; color:inherit;'>Next Page</a>";
//}
//}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<?php
	/*
		Place code to connect to your DB here.
	*/
	include('connection.php');	// include your code to connect to DB.

//	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM studdetails WHERE std='$classname' AND division='$division'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	if($total_pages==0)
	{
		echo "<script>alert('Name not found');location.href='viewbyname.php';</script>";
	}
	/* Setup vars for query. */
	$targetpage = "newpagination.php"; 	//your file name  (the name of this file)
	$limit = 2; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM studdetails WHERE std='$classname' AND division='$division' LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
echo "<table border=0 cellpadding=10 align=center style='text-align:center'>";
echo "<tr><td></td><td></td><td>Admission No</td><td>First Name</td><td>Last Name</td><td>Class</td><td>Division</td><td colspan='3'>Marks</td></tr>";
while($row = mysql_fetch_object($result))
{
echo '<tr>';
echo "<td><a href=view.php?id=".$row->id." style='text-decoration:none; color:inherit;'><input type='button' value='View' name='view' style='background-color:inherit; color:inherit;'/></a></td>";
echo "<td><a href=edit.php?id=".$row->id." style='text-decoration:none; color:inherit;'><input type='button' value='Edit' name='edit' style='background-color:inherit; color:inherit;'  /></a></td>";
echo "<td>$row->admno</td>";
echo "<td>$row->fname</td>";
echo "<td>$row->lname</td>";
echo "<td>$row->std</td>";
echo "<td>$row->division</td>";
$std=intval($row->std);
if($std>=5 && $std<=7)
{
	echo "<td><a href=firstup.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='First' name='mark1' style='background-color:inherit; color:inherit;'/></a></td>";
	echo "<td><a href=secondup.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='Second' 
name='mark2' style='background-color:inherit; color:inherit;'/></a></td>";
	echo "<td><a href=thirdup.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='Third' name='mark3' style='background-color:inherit; color:inherit;'/></a></td>";
}
else
{
	echo "<td><a href=firsths.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='First' name='mark1' style='background-color:inherit; color:inherit;'/></a></td>";
	echo "<td><a href=secondhs.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='Second' 
name='mark2' style='background-color:inherit; color:inherit;'/></a></td>";
	echo "<td><a href=thirdhs.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='Third' name='mark3' style='background-color:inherit; color:inherit;'/></a></td>";
}
echo '</tr>';
}
echo '</table>';

	?>

<?php
echo "<br><br><center>";
echo $pagination; 
echo "</center>";
?>

</fieldset>
</form>

</div>
</div>
</body>
</html>