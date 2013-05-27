<?php
include 'rnheader.php';
//session_start();
//$user=$_SESSION['user'];
//session_start();
$user=$_SESSION['user'];
if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
//$user = $_SESSION['user'];
if(isset($_POST['efficiency']))
{
//$query="select efficiency from ratings where name='$user'";
//queryMysql("update ratings SET efficiency='$efficiency' where name='$user' ");
//$query = "SELECT * FROM ratings WHERE name='$user'";
$efficiency=sanitizeString($_POST['efficiency']);
$nameofemp=($_POST['nameofemp']);
$disc=sanitizeString($_POST['disc']);
$noh=sanitizeString($_POST['noh']);
$time=sanitizeString($_POST['time']);
//if (mysql_num_rows(queryMysql($query)))
	//{
		queryMysql("UPDATE ratings SET efficiency='$efficiency' where name='$user'");
	//}
	//else
	//{
		//$query = "update ratings set efficiency='$efficiency'";
		//queryMysql($query);
	//}
	queryMysql("update ratings set ratedby='$user' where name='$nameofemp'");
	queryMysql("update ratings set timeliness='$time' where name='$nameofemp'");
	queryMysql("update ratings set discipline='$disc' where name='$nameofemp'");
	
}
echo<<<_END
<style>
body
{
background-image:url('image4.jpg');
background-size:100% 200%;
background-repeat:no-repeat;
}
</style>
<form method='post' action='rnrates.php'>
Rating out of 10.</br>
<fieldset>

<label>Efficiency:</label></br>
<textarea name="efficiency" cols="4" rows="1"> </textarea> </br>
<label>No of hours:</label></br>
<textarea name="noh" cols="4" rows="1"> </textarea> </br>
<label>Discipline:</label></br>
<textarea name="disc" cols="4" rows="1"> </textarea> </br>
<label>Timeliness:</label></br>
<textarea name="time" cols="4" rows="1"> </textarea> </br>


</fieldset>
<input type='submit' value='submit'/>
</form>
_END;
?>