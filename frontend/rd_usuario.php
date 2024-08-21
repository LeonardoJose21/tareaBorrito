<?php
	$usuario=$_POST['usuario'];
	$contraseña=$_POST['contrasena'];
	include_once("servicios.php");
	$objconsulta = new ConsultasClientes;
	$objconsulta->verificar_usuario($usuario,$contraseña);
?>
