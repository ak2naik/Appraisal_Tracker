<?php
include 'rnheader.php';
//session_start();
$user=$_SESSION['user'];
if(isset($_POST['task']))
{
	$task = sanitizeString($_POST['task']);
	$task = preg_replace('/\s\s+/', ' ', $task);
	$nameofemp=sanitizeString($_POST['nameofemp']);
	$deadline=sanitizeString($_POST['deadline']);
	$query="select task from tasks where name='$nameofemp'";
	//if (mysql_num_rows(queryMysql($query)))
	
		//queryMysql("UPDATE tasks SET task='$task' 
				    //where name='$nameofemp'");
	//}
	//$quer="select deadline from task where name='nameofemp'";
	//queryMysql("update tasks set deadline='$deadline' where name='$nameofemp'");
	//queryMysql("update tasks set tasksetby='$user' where name='$nameofemp'");
	$table=tasks;
	if(tableExists($table))
	queryMysql("insert into tasks values('$nameofemp','$task','$deadline','$user')");
	else
	{
	queryMysql("create table tasks(name_of_emp varchar(32),task vachar(32), deadline varchar(32), Task_set_by varchar(32))");
	queryMysql("insert into tasks values('$nameofemp','$task','$deadline','$user')");
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
<form method='post' action='rnsto.php' enctype='multipart/form-data'>
<label>Name of the employee: </label><br/>
<textarea name='nameofemp' cols='10' rows='1'></textarea><br/><br />
<label>Task: </label><br/>
<textarea name='task' cols='25' rows='7'></textarea><br/><br />
<label>Deadline: </label> </br>
<textarea name='deadline' cols='10' rows='1'></textarea><br/><br />
<input type='submit' value='set task'/>
</pre></form>
_END;
?>