<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/design.css">
</head>
<body>
<div id=formular>
<table>
<?php

ini_set('display_errors', 1); error_reporting(-1);

$senderMail = $_POST["fromMail"];
$senderName = $_POST["fromName"];

$receiver = $_POST["toMail"];
$date = $_POST["date"];
$answer = $_POST["toAnswer"];
$cc = $_POST["CC"];
$bcc = $_POST["Bcc"];

$subject = $_POST["subject"];
$message = $_POST["messageBody"];

$header = 'From: ' . $senderName . ' <' . $senderMail . '>' . "\r\n";
$header .= 'Reply-To: ' . $answer . "\r\n";
$header .= 'Date: '. $date ."\r\n";
$header .= 'CC: '. $cc ."\r\n";
$header .= 'BCC: '. $bcc ."\r\n";
$header .= 'X-Mailer: PHP/' . phpversion();
$header .= "MIME-Version: 1.0\r\n";

$amount = $_POST["amount"];

if($_FILES['my_file']['name'] == "") 
{
	$header .= "Content-Type: text/html; charset=UTF-8";
	$body = $message;
}
else
{
	
	
	$file_tmp_name    = $_FILES['my_file']['tmp_name'];
    $file_name        = $_FILES['my_file']['name'];
    $file_size        = $_FILES['my_file']['size'];
    $file_type        = $_FILES['my_file']['type'];
    $file_error       = $_FILES['my_file']['error'];

	if($file_error>0)
    {
        die('<tr><td>Upload Error!</td><td><img src="styles/red.png"></td></tr>');
    }
	
	$handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));
	$boundary = md5("hiddenbek"); 
	$header .= "Content-Type: multipart/mixed; boundary =" . $boundary . "\r\n\r\n";
		$body = "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message)); 

		$body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=\"$file_name\"\r\n";
        $body .="Content-Disposition: attachment; filename=\"$file_name\"\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 	
}

for ($x = 1; $x <= $amount; $x++) {
  if(mail($receiver, $subject, $body, $header))
	echo "<tr><td>Email erfolgreich an " . $receiver . " versendet!</td><td><img src=\"styles/tick.png\"></td></tr>";
else
	echo "<tr><td>An error occured!</td><td><img src=\"styles/red.png\"></td></tr>";
}
?>
<tr>
		<td>
			<form action="index.php">
				<input type="submit" value="Zurück">
			</form>
		</td>
		<td>
		</td>
</tr>
</table>

</div>
</body>
</html>
