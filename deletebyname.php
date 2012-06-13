<?php
session_start();

if(!isset($_SESSION['name']))
	header("Location:login.php");
?>
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
<?php
if(!isset($_GET['page']) && !isset($_POST['submit']))
{
	unset($_SESSION['fname']);
?>
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend>Enter Name of Student</legend>
<table style="width:60%; margin-left:auto; margin-right:auto;">
<tr>
<td width="50%" align="center">Enter First Name : </td>
<td width="50%" align="left"><input type="text" name="fname"/></td>
</tr>
<tr>
<td></td>
<td align="left"><input type="submit" name="submit" value="View" style="background-color:inherit; color:inherit;"/>
&nbsp;<input name="back" type="button" value="<< Back" onClick="location.href='deleteview.php'"/>
</td>
</tr>
</table>
</fieldset>
<?php
}
else if(isset($_POST['submit']) or isset($_GET['page']))
{

	$fname=$_POST['fname'];
	(!$_SESSION['fname'])? $_SESSION['fname']=$fname : $fname=$_SESSION['fname'];
?>
<fieldset style="width:50%; margin-left:auto; margin-right:auto;">
<legend><?php echo $fname; ?> details</legend>

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
	$query = "SELECT COUNT(*) as num FROM studdetails WHERE fname='$fname'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	if($total_pages==0)
	{
		echo "<script>alert('Name not found');location.href='deletebyname.php';</script>";
	}
	/* Setup vars for query. */
	$targetpage = "deletebyname.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM studdetails WHERE fname='$fname' LIMIT $start, $limit";
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
echo "<table border=0 cellpadding=10 align=center>";
echo "<tr><td>Admission No</td><td>First Name</td><td>Last Name</td><td>Class</td><td>Division</td><td>Category</td></tr>";
while($row = mysql_fetch_object($result))
{
echo '<tr>';

echo "<td>$row->admno</td>";
echo "<td>$row->fname</td>";
echo "<td>$row->lname</td>";
echo "<td align='center'>$row->std</td>";
echo "<td align='center'>$row->division</td>";
echo "<td align='center'>$row->category</td>";
echo "<td><a href=delete.php?ad=".$row->admno." style='text-decoration:none; color:inherit;'><input type='button' value='Delete' name='view' style='background-color:inherit; color:inherit;'/></a></td>";
echo '</tr>';
}
echo '</table>';

	?>

<?php
echo "<br><br><center>";
echo $pagination; 
echo "</center>";
?>


<input name="back" type="button" value="<< Back" onClick="location.href='deletebyname.php'" style="float:right"/>
</fieldset>
    
    
<?php
}
?>
</form>

</div>
</div>
</body>
</html>