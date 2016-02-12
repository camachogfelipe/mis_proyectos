<?php
defined( '_GSABIDURIA' ) or die("Accesos restringido solo para usuarios");

if(isset($_SESSION['usuario'])) { ?>
<div id="load"><img src="../imagenes/preloader.png" width="128" height="128" class="load" /></div>
<div id="cuerpo">
<?php
	include("encabezado.php");
}
?>
	<ul id="menu_usuarios">
    		<li><a href="#charlas">Charlas</a>
            	<ul class="submenu">
                	<li><a href="#charlas_crear" onclick="recargar('charlas', 'op=1', 'contenido')">Crear una nueva charla</a></li>
                    <li><a href="#charlas_ver" onclick="recargar('charlas', 'op=6', 'contenido')">Ver charlas existentes</a></li>
                </ul>
            </li>
	        <li><a href="#">Fotos</a>
            	<ul class="submenu">
                	<li><a href="#fotos_nuevo_album">Crear album de fotos</a></li>
                    <li><a href="#fotos_ver_albumes">Ver albumes existentes</a></li>
                </ul>
            </li>
    	    <li><a href="#">Testimonios</a>
            	<ul class="submenu">
                	<li><a href="#testimonios_nuevo_testimonio">Nuevo testimonio</a></li>
                    <li><a href="#testimonios_ver">Ver lista de testimonios</a></li>
                </ul>
            </li>
        	<li><a href="#">Peticiones de oraci&oacute;n</a>
            	<ul class="submenu">
                	<li><a href="#peticiones_nueva">Nueva petici&oacute;n de oraci&oacute;n</a></li>
                    <li><a href="#peticiones_ver">Ver peticiones de oraci&oacute;n</a></li>
                </ul>
            </li>
	        <li><a href="#">Comentarios</a></li>
    	    <li><a href="#">Eventos</a>
            	<ul class="submenu">
                	<li><a href="#eventos_nuevo">Crear un nuevo evento</a></li>
                    <li><a href="eventos_ver">Ver calendario de eventos</a></li>
                </ul>
            </li>
        	<li><a href="#">Anuncios</a></li>
	        <li><a href="#">Usuarios</a></li>
    	    <li><a href="#">Configuraci&oacute;n</a></li>
        	<li class="salir"><a href="?salir">Salir</a></li>
    </ul>
	<div id="contenido">
	</div>
    <?php include("pie.php"); ?>
</div>