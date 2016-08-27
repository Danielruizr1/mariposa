<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><?php
$codigohtml = '

<html>
<head>
<title>Informcación Destinos Viajes de 15 - Rocio de Castiblanco</title>
</head>
<body>
<h1>Prueba de Correo de envio</h1>
</body>

';

$email = 'developer@mksla.com';
$asunto = 'E-Mail HTML';
$cabeceras = "Content-type: text/html\r\n";

mail($email,$asunto,$codigohtml,$cabeceras);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
