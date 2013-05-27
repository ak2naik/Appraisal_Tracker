<?php
include 'rnfunctions.php';
session_start();
$user=$_SESSION['user'];
$query="select * from ratings where name='$user'";
	$result=mysql_query($query);
	//if(mysql_num_rows($result))
	//{
		//echo "<table border=2><tr> <th>Rated By</th> <th> Efficiency </th> <th> No of Hours </th> <th> Discipline</tr>";
		echo "<style>
table, td, th
{
border:1px solid green;
}
th
{
background-color:green;
color:white;
}
table
{
width:100%;
}
th
{
height:50px;
}
</style>
		<Table><tr> <th>Rated By</th> <th> Efficiency </th> <th> No of Hours </th> <th> Discipline </th><th> Timeliness <th> Communication Skills</tr>";
		$rows=mysql_num_rows($result);
		for($j=0;$j<$rows; $j++)
		{
			$row=mysql_fetch_row($result);
			echo "<tr>";
			for($k=1;$k<=6;$k++) echo "<td> $row[$k] </td>";
			echo "</tr>";
		}
		echo "</table>";
	//}
?>