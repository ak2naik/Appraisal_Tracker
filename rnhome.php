<?php
include 'rnheader.php';

if(!isset($_SESSION['user']))
	die("<br><br /> You need to login!!");
$user=$_SESSION['user'];


if (file_exists("$user.jpg"))
		echo "<img src='$user.jpg' border='1' align='left' /><br clear/>";
		
	$result = queryMysql("SELECT text FROM users WHERE name='$user'");
	$rows=mysql_num_rows($result);
	//for($j=0;$j<$rows;++$j)
	echo  mysql_result($result,$j=0)."<br clear /><br />";

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