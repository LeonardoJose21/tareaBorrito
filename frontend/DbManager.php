<?php

class DBManager{
	public $conexionRespuesta;
	function __construct(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proceduredb";
    $conexion = mysqli_connect($servername, $username, $password, $dbname);
	  if (!$conexion) {
      die("Connection failed: " . mysqli_connect_error());
    } else{
      $this->conexionRespuesta = $conexion;
    }   
   }
}

?>
