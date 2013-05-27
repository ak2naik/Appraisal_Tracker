<?php // rnheader.php
include 'rnfunctions.php';
session_start();

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;

echo "<html><head><title>$appname";
if ($loggedin) echo " ($user)";

echo "</title></head><body><font face='verdana' size='2'>";
echo "<h2>$appname</h2>";

if ($loggedin)
{
	echo "<b>$user</b>:
		 <h3><a href='rnhome.php'> <input type='submit' name= 'Home' value= 'Home'></a> |
		 <a href='rnotherprofile.php'> <input type= 'submit' name='View Others Profiles' value='View Others Profiles'></a> |
		 <a href='rntasks.php'><input type='submit' name='Tasks' value='Tasks'></a> |
		 <a href='rnratings.php'><input type='submit' name='Ratings' value='Ratings'></a> |
		 <a href='rnprofile.php'><input type='submit' name='Profile' value= 'Profile'></a> |
		 <a href='rnlogout.php'><input type='submit' name='Log out' value='Log out'></a>|
		 <a href='changepassword.php'><input type='submit' name='Change Password' value='Change Password'></a></h3>";
}
		 
else
{
	echo "<a href='index.php'>Home</a> |
		 <a href='rnlogin.php'>Log in</a>";
}
if($loggedin)
{
if($user=='$Admin')
{
	echo"	 <h3><a href='newusers.php'><input type='submit' name='Add new users' value='Add new users'></a>|
			 <a href='removeusers.php'><input type='Submit' name='Remove users' value='Remove users'></a></h3>";
}
}
?>