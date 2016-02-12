<?php
session_start();
?>
<script language="javascript" src="../Scripts/charlas.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.js"></script>
<script type="text/javascript" src="../Scripts/jquery.validate.additional-methods.js"></script>
<?php
defined( '_GSABIDURIA' ) or define( '_GSABIDURIA', 1 );
require("funciones_globales.php");

if(is_numeric($_REQUEST['op'])) $opcion = $_REQUEST['op'];
else $opcion = 6;

if(isset($_REQUEST['id'])) $id = $_REQUEST['id'];
else $id = NULL;

if(isset($_REQUEST['A'])) $activo = $_REQUEST['A'];
else $activo = NULL;

$operacion = new charlas($id);

switch($opcion) {
	case 1 : $operacion->crear();
			 break;
	case 2 : $operacion->editar($id);
			 break;
	case 3 : $operacion->ver($id);
			 break;
	case 4 : $operacion->activar($id, $activo);
			 break;
	case 5 : $operacion->eliminar($id);
			 break;
	case 6 : $operacion->listar();
			 break;
	case 7 : $res = $operacion->crear_articulo();
			 if($res == true) echo "El &aacute;rticulo se ha guardado con exito";
			 break;
}

class charlas{
	var $id;
	var $titulo;
	var $texto;
	var $usuario;
	var $nom_usuario;
	var $tipo;
	var $activo;
	var $consulta;
	var $resultados;
	var $tresultados;
	var $pag;
	var $limite;
	
	function __construct($id){
		if(!empty($id)) $this->id = $id;
		if(!empty($_REQUEST['titulo'])) $this->titulo = htmlentities($_POST['titulo']);
		if(!empty($_REQUEST['texto'])) $this->texto = $_POST['texto'];
		if(!empty($_REQUEST['tipo'])) {
			$this->tipo = $_POST['tipo'];
			if($this->tipo == 1) $this->activo = 1;
			else $this->activo = 0;
		}
		else $this->activo = 0;
		$this->usuario = $_SESSION['usr_id'];
		$this->nom_usuario = $_SESSION['nombre'];
		if(!empty($_REQUEST['pag'])) $this->pag = $_REQUEST['pag'];
		else $this->pag = 1;
		$this->consulta = new BDManejo($this->pag);
	}
	
	function crear() {
		$this->pintar_form(7);
	}
	
	function pintar_form($a) {
		echo '<form action="charlas.php?op='.$a.'" id="charlas" class="charlas" name="charlas" method="post">';
		echo '<label for="titulo">T&iacute;tulo: </label> <input name="titulo" type="text" size="60"><br />';
		echo '<label for="tipo">Tipo</label> <select name="tipo">';
		echo '<option value="Charla">Charla A&amp;P</option>';
		echo '<option value="Teologico">&Aacute;rticulo</option>';
		echo '</select><br />';
		echo '<label for="texto">Texto</label><br /><textarea name="texto" cols="100" rows="10"></textarea><br />';
		echo '<button id="button" type="submit">Guardar</button> <button id="button" class="reset" type="reset">Limpiar</button>';
		echo '</form>';
	}
	
	function listar($tipo = NULL) {
		switch($tipo) {
			case 1 : $datos = 'art_id, art_titulo, art_fecha, art_activo';
					 break;
			case 2 : $datos = '*';
					 break;
			default : $tipo = 1;
					  $datos = 'art_id, art_titulo, art_fecha, art_activo';
					  break;
		}
		$this->consulta->conecta();
		$this->consulta->tabla('articulos');
		$this->consulta->datos($datos);
		$this->consulta->opciones("WHERE art_eliminado='N' and art_tipo='Charla'");
		$this->consulta->leer_datos();
		$this->resultados = $this->consulta->array_asociativo();
		$this->consulta->desconecta();
		if(empty($this->resultados)) echo "No se encontraron resultados";
		else {
			echo "<p>Se encontraron ".$this->tresultados=$this->consulta->total_resultados()." resultados</p>";
			echo '<table width="100%" cellpadding="2" cellspacing="0" align="center">';
			echo "<thead>\n";
			if($tipo == 1) {
				echo "<th>Id</th>\n";
				echo "<th>Título</th>\n";
				echo "<th>Fecha</th>\n";
				echo "<th>Activo</th>\n";
				echo "<th>Acciones</th>\n";
			}
			else {
				foreach($this->resultados[0] as $clave=>$valor) {
					echo "<th>".$clave."</th>\n";
				}
			}
			echo "</thead>\n";
			echo "<tbody>";
			for($i=0; $i<$this->tresultados; $i++) {
				echo "<tr>";
				$res = $this->resultados[$i];
				foreach($res as $clave=>$valor) {
					echo "<td>";
					if($clave == "art_activo") {
						echo '<a href="#id='.$this->resultados[$i]['art_id'].'" onclick="recargar(\'charlas\', \'op=4&id='.$this->resultados[$i]['art_id'].'&A='.$valor.'&pag='.$this->pag.'\', \'contenido\')">';
						echo '<img src="../imagenes/';
						if($valor == "S") echo 'checked.png';
						else echo 'nochecked.png';
						echo '" width="16" height="16" border="0" align="absmiddle"></a>';
					}
					else echo $valor;
					echo "</td>";
				}
				echo "<td>Acciones</td>";
				echo "<tr>";
			}
			echo "<tbody>";
		}
	}
	
	function crear_articulo() {
		$this->consulta->conecta();
		$this->consulta->tabla("articulos");
		$this->consulta->columnas("usr_id, art_titulo, art_texto, art_tipo, art_fecha, art_activo");
		$this->consulta->datos("'".$this->usuario."','".$this->titulo."','".$this->texto."','".$this->tipo."','".date("Y-m-d")."','".$this->activo."'" );
		$this->consulta->insert();
		$this->consulta->ejecutar_query();
		$this->consulta->desconecta();
		return true;
	}
	
	function editar() {
	}
	
	function ver() {
	}
	
	function activar($id, $activo) {
		if($activo == "S") $activo = "N";
		elseif($activo == "N") $activo = "S";
		$this->consulta->conecta();
		$this->consulta->tabla("articulos");
		$this->consulta->datos("art_activo = '$activo'");
		$this->consulta->opciones("WHERE art_id = '$id'");
		$this->consulta->actualiza();
		$this->consulta->ejecutar_query();
		$this->listar();
	}
	
	function eliminar() {
	}
}
?>