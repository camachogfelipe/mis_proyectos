<center>
<h4>Bienvenido al libro de citas biblicas</h4>
  <br>
  <br>

<?
// Configura los datos de tu cuenta
$dbhost='localhost';
$dbusername='felipe';
$dbuserpass='sabiduria';
$dbname='usuarios_poemas';

//nos conectamos a la base de datos
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die("Cannot select database");

include("index.php");
$sql = "select * FROM citasbiblicas";
$sql .= " ORDER BY id_citas_biblicas desc";
$cursor = mysql_query($sql);
while ($un_obj = mysql_fetch_object($cursor))
{
?>
  <table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#333333" bgcolor="#8A8A8A" aling="center">
    <tr>
      <td>
		<? echo "<font color='#FFFFFF'>$un_obj->texto<br>-$un_obj->libro<br><br></td></font>";?></td>
      </td>
    </tr>
  </table>
  <br>
  <?
  	}
  ?>
</center>