<?php // rnlogin.php
include 'rnheader.php';
echo "<h2>Member Log in</h2>";
$error = $user = $pass = "";
if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br />";
	}	
	else
	{
		$query = "SELECT name,password FROM users
				WHERE name='$user' AND password='$pass'";

		if (mysql_num_rows(queryMysql($query)) == 0)
		{
			$error = "Username/Password invalid<br />";
		}
		else
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			die("You are now logged in. Please
				<a href='rnhome.php'>click here</a>.");
		}
	}
}

echo <<<_END
<style>
body
{
background-image:url('image4.jpg');
background-size:100% 200%;
background-repeat:no-repeat;
}
</style><form method='post' action='rnlogin.php'>$error
<fieldset>

<legend><br /><b>Login<b /></legend>
<br />
<br />
<label for='username'>Username*:</label>
<input type='text' maxlength='16' name='user'
	value='$user' /><br /><br />
	
<label for='password'>Password*:</label>	
<input type='password' maxlength='16' name='pass'
	value='$pass' /><br /> <br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<input type='submit' value='Login' />
</fieldset>
</form>
_END;
?>