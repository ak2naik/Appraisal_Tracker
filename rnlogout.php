<?php
include 'rnheader.php';
echo "<h3> logout </h3>";
if(isset($_SESSION['user']))
{
destroySession();
echo "you have logged out"; 
echo "<a href='rnlogin.php'>click here </a> to refresh";
mysql_close($db_server);
}
else echo "you have not logged in";
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