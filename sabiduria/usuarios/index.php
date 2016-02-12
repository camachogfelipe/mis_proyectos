<?php
session_start();
define( '_GSABIDURIA', 1 );
/*unset($_SESSION['usuario']);
unset($_SESSION['nombre']);*/

if(isset($_POST['usuario']) and isset($_POST['clave'])) {
	$user = $_POST['usuario'];
	$clave = md5($_POST['clave']);

	include("funciones_globales.php");

	$consulta = new BDManejo(1);
	$consulta->tabla("accesos, usuarios");
	$consulta->datos("accesos.acc_login, accesos.acc_clave, usuarios.usr_id, usuarios.usr_nombre, usuarios.usr_apellido_paterno");
	$consulta->opciones("WHERE accesos.acc_login='".$user."' and accesos.acc_clave = '".$clave."'");
	$consulta->leer_datos();
	$resultados = $consulta->array_array(2);
	$consulta->libera();
	$consulta->desconecta();
	
	$usuario = strcmp($user, $resultados[0]['acc_login']);
	$password = strcmp($clave, $resultados[0]['acc_clave']);
	if ($usuario == 0 and $password == 0) {
		// Si están en la base de datos del registro de usuario
		$_SESSION['usr_id'] = $resultados[0]['usr_id'];
		$_SESSION['usuario'] = $user;
		$_SESSION['nombre'] = $resultados[0]['usr_nombre']." ".$resultados[0]['usr_apellido_paterno'];
	}
}
if(isset($_GET['salir'])) {
	unset($_SESSION['usr_id']);
	unset($_SESSION['usuario']);
	unset($_SESSION['nombre']);
	header("Location: ../");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Grupo Sabiduria - A&amp;P</title>
<link href="usuarios.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<script language="javascript" src="../Scripts/jquery-1.7.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="../Scripts/jquery.corner.js"></script>
<script language="javascript" src="../Scripts/sabiduria.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<script language="javascript" type="text/javascript">
function setFocus() {
	document.acceso.usuario.select();
	document.acceso.usuario.focus();
}
</script>
<script type="text/javascript">
function mainmenu(){
$(" #menu_usuarios ul li ul ").css({display: "none"}); // Opera Fix
$(" #menu_usuarios ul li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 
 
 $(document).ready(function(){					
	mainmenu();
});
</script>
</head>

<body onload="javascript:setFocus()">
<?php
if(isset($_SESSION['usuario']) and isset($_SESSION['nombre'])) {
	include("index2.php");
}
else {
?>
<div id="cuerpo">
<div id="acceso">
<?php include("encabezado.php"); ?>
<div id="main">
<div id="contenido_usuarios"><span id="titulo">Acceso a administradores</span><hr />
<form action="" id="acceso" name="acceso" method="post">
<table width="70%" border="0" cellspacing="3" cellpadding="0" align="center">
  <tr>
    <td width="32%" align="right">Usuario</td>
    <td width="68%"><input type="text" name="usuario" id="usuario" tabindex="1" /></td>
  </tr>
  <tr>
    <td align="right">Contrase&ntilde;a</td>
    <td><input type="password" name="clave" id="clave" tabindex="2" /></td>
  </tr>
  <tr>
    <td colspan="2">
		<div id="button" onclick="acceso.submit()">Ingresar</div>
    </td>
  </tr>
</table>
</form>
</div>
</div>
<div id="pie_pagina_usuarios">&copy; 2011 Todos los derechos reservados. Desarrollo por <a href="http://cogroupsas.com"><img src="../imagenes/co_group32x32.png" width="32" height="32" align="absmiddle" alt="COGroup" border="0" /></a></div>
</div>
</div>
<?php } ?>
</body>
</html>