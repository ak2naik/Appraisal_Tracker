<?php
	include 'rnfunctions.php';
	//include 'rnheader.php';
	session_start();
	$user=$_SESSION['user'];
	if(isset($_POST['password']))
	{
		$pass = sanitizeString($_POST['password']);
		//$task = preg_replace('/\s\s+/', ' ', $task);
		$newp=sanitizeString($_POST['newpassword']);
		querymysql("update users set password='$newp' where name='$user'");
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

<form method='post' action='changepassword.php' enctype='multipart/form-data'>
<label>Password: </label><br/>
<textarea name='password' cols='10' rows='1'></textarea><br/>
<label>New Password: </label> </br>
<textarea name='newpassword' cols='10' rows='1'></textarea><br/>
<input type='submit' value='Change password'/>
</pre></form>
_END;
?>