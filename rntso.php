<?php
include 'rnfunctions.php';
session_start();
$user=$_SESSION['user'];
	$query="select * from tasks where name='$user'";
	$result=mysql_query($query);
	if(mysql_num_rows($result))
	{
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
		<Table><tr> <th>Task</th> <th> Deadline </th> <th> Task Set By </th></tr>";
		$rows=mysql_num_rows($result);
		for($j=0;$j<$rows; $j++)
		{
			$row=mysql_fetch_row($result);
			echo "<tr>";
			for($k=1;$k<=3;$k++) echo "<td> $row[$k] </td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "No tasks set";
	}
?>