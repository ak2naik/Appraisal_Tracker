<?php
include 'rnheader.php';
if(!isset($_SESSION['user']))
	die("<br><br /> You need to login!!");
/*if(isset($_GET['view']))
{
	$view=sanitizeString($_GET['view']);
	echo "<h3>$view Page</h3>";
	showProfile($view);
}*/

$user=$_SESSION['user'];
$query="select name from users";
$result=mysql_query($query);
$rows=mysql_num_rows($result);
for($j=0;$j<$rows;++$j)
{
	if(mysql_result($result,$j)==$user)
	{}
	else
	{
	$d=mysql_result($result,$j);
	echo "$d profile <br/>";
	showProfile($d);
	//echo "<a href='rnhome.php?view=$d'> $d profile </a> <br />";
	}
}
if(isset($_GET['view']))
{
	$view=sanitizeString($_GET['view']);
	echo "<h3>$view Page</h3>";
	showProfile($view);
	
}

echo <<<_END
<style>
body
{
background-image:url('image4.jpg');
background-size:100% 300%;
background-repeat:no-repeat;
}
</style>
_END

?>
