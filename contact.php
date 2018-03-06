<?php

echo '<link rel="stylesheet" type="text/css" href="my.css">';
echo '<link href="https://fonts.googleapis.com/css?family=Nunito:400,800i" rel="stylesheet">';

$referer = $_SERVER["HTTP_REFERER"];

$to = 'gouwm@u.washington.edu';

$name = "";
if( isset($_POST['name']) ) $name = $_POST['name'];

$email = "";
if( isset($_POST['email']) ) $email = $_POST['email'];

$subject = "";
if( isset($_POST['subject']) ) $subject = $_POST['subject'];

$message = "";
if( isset($_POST['message']) ) $message = $_POST['message'];

$headers = "From:" . $email;

mail($to, $subject, $message, $headers);

date_default_timezone_set('America/Los_Angeles');
$date = date('m/d/Y');
$time = date('h:i:s a', time());

print<<<END
<!doctype html>
<html>
<head>
	<title>Form Submission Success</title>
</head>
<body class="content">
	<h1>Thanks for your message, $name.</h1>
	<h3>I will get back to you soon.</h3>
	<br>
	<p>Your subject: $subject</p>
	<p>Your message: $message</p>
	<p>By the way, the date is $date and it is currently $time</p>
	<p><a href="$referer">Click here to return to the previous page</a></p>
</body>
</html>
END;

?>