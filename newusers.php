<?php
	include 'rnheader.php';
	//session_start();
	$user=$_SESSION['user'];
	if(isset($_POST['nameofemp']))
	{
		$nameofemp = sanitizeString($_POST['nameofemp']);
		//$task = preg_replace('/\s\s+/', ' ', $task);
		$idno=sanitizeString($_POST['id']);
		$password=sanitizestring($_POST['password']);
		$position=sanitizeString($_POST['position']);
		$eid=sanitizeString($_POST['eid']);
		$table="users";
		if(tableExists($table))
		querymysql("insert into  users values('$nameofemp','$password','$position','$idno',NULL.'$eid')");
		else
		{
		queryMysql("create table users(nameofemp varchar(32), password varchar(32), position varchar(32), id varchar(32), about varchar(132)),email_id varchar(32)");
		querymysql("insert into  users values('$nameofemp','$password','$position','$idno',NULL,'$eid')");
	}
	
	echo<<<_END
	
<style>
body
{
background-image:url('image4.jpg');
background-size:100% 300%;
background-repeat:no-repeat;
}
</style>
<form method='post' action='newusers.php' enctype='multipart/form-data'>
<label>Name of the employee: </label><br/>
<textarea name='nameofemp' cols='10' rows='1'></textarea><br/>
<label>Password:</label><br/>
<textarea name='password' clos='10' rows='1'></textarea><br/>
<label>Postion: </label><br/>
<textarea name='position' cols='10' rows='1'></textarea><br/>
<label>Id No: </label> </br>
<textarea name='id' cols='10' rows='1'></textarea><br/>
<label>Email id: </label> </br>
<textarea name='eid' cols='10' rows='1'></textarea><br/>
<input type='submit' value='create user'/>
</pre></form>
_END;
?>