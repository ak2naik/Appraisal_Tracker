<?php // rnprofile.php

include 'rnhome.php';

if (!isset($_SESSION['user']))
	die("<br /><br />You need to login to view this page");
$user = $_SESSION['user'];

echo "<h3>Edit your Profile</h3>";

if (isset($_POST['text']))
{
	$text = sanitizeString($_POST['text']);
	$text = preg_replace('/\s\s+/', ' ', $text);
	
	$query = "SELECT * FROM users WHERE name='$user'";
	if (mysql_num_rows(queryMysql($query)))
	{
		queryMysql("UPDATE users SET text='$text' 
				    where name='$user'");
	}
	else
	{
		$query = "update users set name='$user'";
		queryMysql($query);
	}
}
else
{
	$query  = "SELECT * FROM users WHERE name='$user'";
	$result = queryMysql($query);
	
	if (mysql_num_rows($result))
	{
		$row  = mysql_fetch_row($result);
		$text = stripslashes($row[1]);
	}
	else $text = "";
}

$text = stripslashes(preg_replace('/\s\s+/', ' ', $text));

if (isset($_FILES['image']['name']))
{
	$saveto = "$user.jpg";
	move_uploaded_file($_FILES['image']['tmp_name'], $saveto);
	$typeok = TRUE;
	
	switch($_FILES['image']['type'])
	{
		case "image/gif":   $src = imagecreatefromgif($saveto); break;

		case "image/jpeg":  // Both regular and progressive jpegs
		case "image/pjpeg":	$src = imagecreatefromjpeg($saveto); break;

		case "image/png":   $src = imagecreatefrompng($saveto); break;

		default:			$typeok = FALSE; break;
	}
	
	if ($typeok)
	{
		list($w, $h) = getimagesize($saveto);
		$max = 500;
		$tw  = $w;
		$th  = $h;
		
		if ($w > $h && $max < $w)
		{
			$th = $max / $w * $h;
			$tw = $max;
		}
		elseif ($h > $w && $max < $h)
		{
			$tw = $max / $h * $w;
			$th = $max;
		}
		elseif ($max < $w)
		{
			$tw = $th = $max;
		}
		
		$tmp = imagecreatetruecolor($tw, $th);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tw, $th, $w, $h);
		imageconvolution($tmp, array( // Sharpen image
							    array(-1, -1, -1),
							    array(-1, 16, -1),
							    array(-1, -1, -1)
						       ), 8, 0);
		imagejpeg($tmp, $saveto);
		imagedestroy($tmp);
		imagedestroy($src);
	}
}

//showProfile($user);
/*$to = "abdulaston.martin@gmail.com.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "naik.abdulkhader@gmail.com";
$headers = "From:" . $from;
//fputs($smtpConnect, 'STARTTLS'.$newLine);
ini_set("SMTP","smtp.gmail.com");
ini_set('sendmail_from', 'naik.abdulkhader@gmail.com'); 
//ini_set("SMTP","ssl://smtp.gmail.com");
//ini_set("smtp_port","465");
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
*/
echo <<<_END
<form method='post' action='rnprofile.php'
	enctype='multipart/form-data'>
<font=ariel>	
Enter or edit your details and/or upload an image:<br />
<textarea autofocus name='text' cols='25' rows='5'></textarea><br />
Image: <input type='file' name='image' size='14' maxlength='32' />
<input type='submit' value='Save Profile' />
</font> 
</pre></form>
_END;
?>