<?php
	include 'rnfunctions.php';
	session_start();
	$user=$_SESSION['user'];
	if(isset($_POST['nameofemp']))
	{
		$nameofemp = sanitizeString($_POST['nameofemp']);
		//$task = preg_replace('/\s\s+/', ' ', $task);
		$idno=sanitizeString($_POST['id']);
		//$password=sanitizestring($_POST['password']);
		//$position=sanitizeString($_POST['position']);
		querymysql("delete from users where id='$idno'");
		querymysql("delete from tasks where name='$nameofemp'");
		querymysql("delete from ratings where name='$nameofemp'");
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

<form method='post' action='removeusers.php' enctype='multipart/form-data'>
<label>Name of the employee: </label><br/>
<textarea name='nameofemp' cols='10' rows='1'></textarea><br/>
<label>Id No: </label> </br>
<textarea name='id' cols='10' rows='1'></textarea><br/><br />
<input type='submit' value='Remove user'/>
</pre></form>
_END;
?>