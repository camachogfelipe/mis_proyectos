<?
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='felipe';
$dbuserpass='sabiduria';
$dbname='usuarios_poemas';

// Conexión a la base de datos
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die("Cannot select database");


// Preguntaremos si se han enviado ya las variables necesarias
if (isset($_POST["libro"])) {
$texto = $_POST["texto"];
$libro = $_POST["libro"];

// Hay campos en blanco
if($libro==NULL and $texto==NULL) {
echo "un campo está vacio.";
}else{

//Todo parece correcto procedemos con la inserccion
	$query = "INSERT INTO citasbiblicas (libro, texto) VALUES('$libro', '$texto')";
	mysql_query($query) or die(mysql_error());
}
}
echo '<script languaje="Javascript">location.href="ver_citas_biblicas.php"</script>';
?>