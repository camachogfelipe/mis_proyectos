<?php
defined("_GSABIDURIA") or die();

class BDManejo {
	var $usuario;
	var $clave;
	var $servidor;
	var $base_datos;
	var $tabla;
	var $datos;
	var $opciones;
	var $sql;
	var $resultados;
	var $conecto;
	var $tipo;
	
	function __construct() {
		if(empty($this->usuario)) {
			$this->usuario = "C270150_GS11";
			$this->clave = "GS2011";
			$this->servidor = "mysql912.ixwebhosting.com";
			$this->base_datos = "C270150_sabiduria";
		}
	}
	
	function tabla($tabla) {
		return $this->tabla = $tabla;
	}
	
	function datos($datos) {
		return $this->datos = $datos;
	}
	
	function opciones($opciones) {
		return $this->opciones = $opciones;
	}
	
	function conecta(){
		$this->conecto = mysql_connect($this->servidor, $this->usuario, $this->clave);
	    mysql_select_db($this->base_datos) or die("La base de datos no existe");
		return $conecto;
	}
	
	function desconecta() {
		mysql_close($this->conecto);
	}
	
	function insert(){
		
	}
	
	function leer_datos() {
		$this->sql = "SELECT ".$this->datos." FROM ".$this->tabla;
		if(!empty($this->opciones)) $this->sql .= " ".$this->opciones;
	}
	
	function ejecutar_query() {
		return $this->resultados = mysql_query($this->sql) or die(mysql_error());
	}
	
	function array_array($tipo = NULL) {
		$this->conecta();
		$this->ejecutar_query();
		if(!empty($this->resultados)) {
			switch($tipo) {
				case 1 : return mysql_fetch_array($this->resultados, MYSQL_NUM);
						 break;
				case 2 : return mysql_fetch_array($this->resultados, MYSQL_ASSOC);
						 break;
				case 3 : return mysql_fetch_array($this->resultados, MYSQL_BOTH);
						 break;
				default : return mysql_fetch_array($this->resultados, MYSQL_BOTH);
						  break;
			}
		}
	}
	
	function array_asociativo() {
		$this->conecta();
		$this->ejecutar_query();
		if(!empty($this->resultados)) return mysql_fetch_assoc($this->resultados);
	}
	
	function array_objetos() {
		$this->conecta();
		$this->ejecutar_query();
		if(!empty($this->resultados)) return mysql_fetch_object($this->resultados);
	}
	
	function mysql_row() {
		$this->conecta();
		$this->ejecutar_query();
		if(!empty($this->resultados)) return mysql_fetch_row($this->resultados);
	}
	
	function libera() {
		mysql_free_result($this->resultados);
	}
	
	function ultimo_id() {
		return mysql_insert_id();
	}
}
?>