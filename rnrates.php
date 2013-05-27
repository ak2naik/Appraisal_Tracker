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

$efficiency=sanitizeString($_POST['efficiency']);
$efficiency = preg_replace('/\s\s+/', ' ', $efficiency);
$nameofemp=($_POST['nameofemp']);
$nameofemp = preg_replace('/\s\s+/', ' ', $nameofemp);
$disc=sanitizeString($_POST['disc']);
$noh=sanitizeString($_POST['noh']);
$time=sanitizeString($_POST['time']);
$comm=sanitizeString($_POST['comm']);
$table="ratings";
	
	if(tableExists($table))
	queryMysql("insert into ratings values('$nameofemp','$user','$efficiency','$noh','$disc','$time','$comm')");
	else
	{
	queryMysql("create table ratings(name varcha(32),ratedby varchar(32),no of hours varchar(32), discipline varchar(32),
				time_spent varchar(32), communication_skills varchar(32))");
	queryMysql("insert into ratings values('$nameofemp','$user','$efficiency','$noh','$disc','$time','$comm')");			
	
	
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
<label>Name:</label></br>
<textarea name="nameofemp" cols="10" rows="1"> </textarea> </br>
<label>Id of employee:</label></br>
<textarea name="id" cols="10" rows="1"> </textarea> </br>
<label>Efficiency:</label></br>
<textarea name="efficiency" cols="4" rows="1"> </textarea> </br>
<label>No of hours:</label></br>
<textarea name="noh" cols="4" rows="1"> </textarea> </br>
<label>Discipline:</label></br>
<textarea name="disc" cols="4" rows="1"> </textarea> </br>
<label>Timeliness:</label></br>
<textarea name="time" cols="4" rows="1"> </textarea> </br>
<label>Communication Skills:</label></br>
<textarea name="comm" cols="4" rows="1"> </textarea> </br>

</fieldset>
<input type='submit' value='submit'/>
</form>
_END;
?>