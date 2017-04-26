<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mailbomber</title>
<link rel="stylesheet" type="text/css" href="styles/design.css">
</head>
<body>
<div id=formular>
<form enctype="multipart/form-data" action="send.php" method="post">
 <table>
  <tr>
    <td>Absender Name:</td>
    <td><input type="text" name="fromName">
  </tr>
  <tr>
	<td>Absender E-mail:</td>
	<td><input type="text" name="fromMail" required></td> 
  </tr>
  <tr>
	<td>Empfänger E-mail:</td>
	<td><input type="text" name="toMail" required></td>
  </tr>
  <tr>
	<td>Antwort an E-mail:</td>
	<td><input type="text" name="toAnswer"></td>
  </tr>
  <tr>
	<td>Cc:</td> 
	<td><input type="text" name="CC"></td> 
  </tr>
  <tr>
	<td>Bcc:</td>
	<td><input type="text" name="Bcc"></td> 
  </tr>
  <tr>
	<td>Datum:</td>
	<td><input type="text" name="date" value="Mon, 4 Dec 2006 15:51:37 +0100"></td> 
  </tr>
   <tr>
	<td>Betreff:</td> 
	<td><input type="text" name="subject"></td>  
  </tr>
   <tr>
	<td>Text:</td>
	<td><textarea cols="30" rows="15" id="text" type="text" name="messageBody"></textarea></td> 
  </tr>
   <tr>
	<td>Anhang:</td>
	<td><input type="file" name="my_file"></td> 
  </tr>
  <tr>
	<td>Anzahl:</td>
	<td><input type="text" name="amount" value="1"></td> 
  </tr>
   <tr>
	<td><input type="submit"></td>
	<td></td> 
  </tr>
</table>
</form>
</div>
</body>
</html>
