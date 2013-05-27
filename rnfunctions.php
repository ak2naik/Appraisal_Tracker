<?php // rnfunctions.php
$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'miniproject'; // Modify these...
$dbuser  = 'root';     // ...variables according
$dbpass  = '';     // ...to your installation
$appname = "Appraisal Tracker"; // ...and preference

$db_server=mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

function createTable($name, $query)
{
	if (tableExists($name))
	{
		echo "Table '$name' already exists<br />";
	}
	else
	{
		queryMysql("CREATE TABLE $name($query)");
		echo "Table '$name' created<br />";
	}
}

function tableExists($name)
{
	$result = queryMysql("SHOW TABLES LIKE '$name'");
	return mysql_num_rows($result);
}

function queryMysql($query)
{
	$result = mysql_query($query) or die(mysql_error());
	return $result;
}

function destroySession()
{
	$_SESSION=array();
	
	if (session_id() != "" || isset($_COOKIE[session_name()]))
	    setcookie(session_name(), '', time()-2592000, '/');
		
	session_destroy();
}

function sanitizeString($var)
{
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return mysql_real_escape_string($var);
}

function showProfile($user)
{
	if (file_exists("$user.jpg"))
		echo "<img src='$user.jpg' border='1' align='center' /><br clear/><br/><br/>";
	$result = queryMysql("SELECT text FROM users WHERE name='$user'");
	$res=queryMysql("select position from users where name='$user'");
	echo mysql_result($res,0)."<br />";
	$res1=queryMysql("select id from users where name='$user'");
	echo mysql_result($res1,0)."<br />";
	$rows=mysql_num_rows($result);
	for($j=0;$j<$rows;++$j)
	echo  mysql_result($result,$j)."<br clear=left /><br />";
}
?>