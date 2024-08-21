<?php 
require("DbManager.php");
$objetoConnection = new DBManager();
class ConsultasClientes{




  function verificar_usuario($usuario,$contraseña){
    //Conectar a la base de datos 
    $objeto = new DbManager();
    $conexion = $objeto->conexionRespuesta;
    //consulta y ejecucion de la consulta
    if ($usuario!="" && $contraseña!="") {
      //verificando dentro de la base de datos
      $sql="SELECT `usuario`, `contraseña` FROM `usuarios` 
				WHERE `usuario`='$usuario' && `contraseña`='$contraseña'";
				$resultado = mysqli_query($conexion,$sql);
				if($row = mysqli_fetch_array($resultado)){	
						include_once("menu.php");  		
			}
			else{
				
				echo "Usuario no registrado";
        include_once('index.php');
        	}

    } else {
      //redireccionando a la pagina de inicio principal
      include_once('index.php');
    }
    
    //cerrando conexion de la base de datos  
    mysqli_close($conexion);
  }

  function mostrar_inventario($connection){
    $sql = "SELECT * FROM `producto`";
    $resultado = mysqli_query($connection, $sql);
    return $resultado;
  }


  function añadir_venta($anulado,$fecha){
    //Conectar a la base de datos 
    $objeto = new DbManager();
    $conexion = $objeto->conexionRespuesta;
    //consulta y ejecucion de la consulta 
    $sql = "INSERT INTO `venta`(`anulado`, `fecha`) 
            VALUES ('$anulado','$fecha')";
    $resultado = mysqli_query($conexion, $sql);
    //cerrando conexion de la base de datos  
    mysqli_close($conexion);
    //retornando el resultado de la consulta  
    return $resultado;
  }

  function mostrar_ventas(){
         //Conectar a la base de datos 
         $objeto = new DbManager();
         $conexion = $objeto->conexionRespuesta;
         //consulta y ejecucion de la consulta
         $sql = "SELECT v.*, SUM(dv.cantidad * dv.precio) AS total, COUNT(dv.id) AS productos
         FROM venta v 
         JOIN detalleventa dv ON v.id = dv.ventaId
         GROUP BY v.id";
   
         $resultado = mysqli_query($conexion, $sql);
         //cerrando la conexion de datos
         mysqli_close($conexion);
         //retornando el resultado de la consulta
         return $resultado;
  }

  function consultar_venta_id($id){
    //Conectar a la base de datos 
    $objeto = new DbManager();
    $conexion = $objeto->conexionRespuesta;
    //consulta y ejecucion de la consulta
    $sql = "SELECT v.*, SUM(dv.cantidad * dv.precio) AS total, COUNT(dv.id) AS productos
    FROM venta v 
    JOIN detalleventa dv ON v.id = dv.ventaId
    WHERE v.id = '$id'";

    $resultado = mysqli_query($conexion, $sql);
    //cerrando la conexion de datos
    mysqli_close($conexion);
    //retornando el resultado de la consulta
    return $resultado;
  }
  
  function consultar_detalle_venta_id($id) {
    //Conectar a la base de datos
    $objeto = new DbManager();
    $conexion = $objeto->conexionRespuesta;
    
    //consulta y ejecucion de la consulta
    $sql = "SELECT dv.*, p.nombre AS producto
    FROM detalleventa dv
    JOIN producto p ON dv.productoId = p.id
    WHERE dv.ventaId = '$id'";
    $resultado = mysqli_query($conexion, $sql);

    //cerrando la conexión de datos
    mysqli_close($conexion);
    
    //retornando el resultado de la consulta
    return $resultado;
}


function actualizar_detalle_venta_id($id, $precio, $cantidad) {
  // Conectar a la base de datos
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;
  
  // Consulta y ejecución de la consulta
  $sql = "UPDATE detalleventa 
          SET precio = '$precio', cantidad = '$cantidad'
          WHERE id = '$id'";
  
  $resultado = mysqli_query($conexion, $sql);

  // Cerrando la conexión de datos
  mysqli_close($conexion);
  
  // Retornando el resultado de la consulta
  return $resultado;
}


function anular_venta($id){
  //Conectar a la base de datos 
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;
  //consulta y ejecucion de la consulta
  $sql = "UPDATE `venta` SET `anulado` = '1' WHERE `id` = '$id'";
  $resultado = mysqli_query($conexion, $sql);
  //cerrando la conexion de datos
  mysqli_close($conexion);
  //retornando el resultado de la consulta
}


function ultima_venta(){
  //Conectar a la base de datos 
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;

  //consulta y ejecucion de la consulta
  $sql = "SELECT MAX(id) as ultimaVenta FROM `venta`";
  $resultado = mysqli_query($conexion, $sql);

  // Obtener el resultado como un array asociativo
  $row = mysqli_fetch_assoc($resultado);

  //cerrando la conexion de datos
  mysqli_close($conexion);

  //retornando el resultado de la consulta
  return $row['ultimaVenta'];
}


function añadir_detalle_venta($idVenta,$idProducto,$precio,$cantidad){
  //Conectar a la base de datos 
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;
  //consulta y ejecucion de la consulta
  $sql = "INSERT INTO `detalleventa`(`ventaId`, `productoId`, `precio`, `cantidad`) 
          VALUES ('$idVenta','$idProducto','$precio','$cantidad')";
  $resultado = mysqli_query($conexion, $sql);
  //cerrando la conexion de datos
  mysqli_close($conexion);
  //retornando el resultado de la consulta  
}


function descontar_producto ($idProducto,$cantidad){
  //Conectar a la base de datos 
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;
  //consulta y ejecucion de la consulta
  $sql = "UPDATE `producto` SET `unidades` = `unidades` - '$cantidad' WHERE `id` = '$idProducto'";
  $resultado = mysqli_query($conexion, $sql);
  //cerrando la conexion de datos
  mysqli_close($conexion);
  //retornando el resultado de la consulta  
}


// Dentro de la clase ConsultasClientes
function venta_id($detalleVentaId) {
  // Conectar a la base de datos
  $objeto = new DbManager();
  $conexion = $objeto->conexionRespuesta;

  $sql = "SELECT ventaId FROM detalleventa WHERE id = '$detalleVentaId'";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
      $fila = mysqli_fetch_assoc($resultado);
      return $fila['ventaId'];
  } else {
      // Manejo de errores, por ejemplo, devuelve un valor predeterminado o muestra un mensaje de error
      return false;
  }
}




 


     function registrar_producto ($nombre,$precio,$unidades,$descipcion,$provedor,$contacto){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta 
      $sql = "INSERT INTO `producto`(`nombre`, `precio`, `unidades`, `descripcion`, `provedor`, `contacto`)
             VALUES ('$nombre','$precio','$unidades','$descipcion','$provedor','$contacto')";
      if (mysqli_query($conexion, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
      }
      //cerrando conexion de la base de datos  
      mysqli_close($conexion);
     }

    function eliminar_producto($id){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta
      $sql = "DELETE  FROM `producto` WHERE id = '$id'";
      $resultado = mysqli_query($conexion, $sql);
      //cerrando la conexion de datos
      mysqli_close($conexion);
    }

    function consultar_referencia_producto($producto){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta
      $sql = "SELECT * FROM `producto` WHERE nombre LIKE '%$producto%'";
      $resultado = mysqli_query($conexion, $sql);
      //cerrando la conexion de datos
      mysqli_close($conexion);
      //retornando el resultado de la consulta
      return $resultado;
    }


    function consultar_producto($id){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta
      $sql = "SELECT * FROM `producto` WHERE id = '$id'";
      $resultado = mysqli_query($conexion, $sql);
      //cerrando la conexion de datos
      mysqli_close($conexion);
      //retornando el resultado de la consulta
      return $resultado;
    }

    function actualizar_producto($id, $precio, $cantidad) {
      // Conectar a la base de datos
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
  
      // Validar que se proporcionen valores para $precio y $cantidad
      if ($precio === null || $cantidad === null) {
          echo "Error: Precio y cantidad deben tener valores.";
          return;
      }
  
      // Consulta y ejecución de la consulta con consultas preparadas
      $sql = "UPDATE `producto` SET `precio` = ?, `unidades` = ? WHERE `id` = ?";
      
      $stmt = mysqli_prepare($conexion, $sql);
  
      if ($stmt) {
          // Vincular parámetros
          mysqli_stmt_bind_param($stmt, 'ddi', $precio, $cantidad, $id);
  
          // Ejecutar la consulta preparada
          if (mysqli_stmt_execute($stmt)) {
              // Redireccionar a detalleInventario.php
              header("Location: detalleInventario.php?id=" . $id);
              exit(); // Asegurarse de que el script se detenga después de la redirección
          } else {
              echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
          }
  
          // Cerrar la consulta preparada
          mysqli_stmt_close($stmt);
      } else {
          echo "Error al preparar la consulta: " . mysqli_error($conexion);
      }
  
      // Cerrando la conexión a la base de datos
      mysqli_close($conexion);
  }
  

    function consultar_venta_producto($id){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta
      $sql = "SELECT v.*, SUM(dv.cantidad * dv.precio) AS total, COUNT(dv.id) AS Productos
      FROM venta v 
      JOIN detalleventa dv ON v.id = dv.ventaId
      WHERE v.id IN (SELECT ventaId FROM detalleVenta WHERE productoid = '$id')
      GROUP BY v.id";

      $resultado = mysqli_query($conexion, $sql);
      //cerrando la conexion de datos
      mysqli_close($conexion);
      //retornando el resultado de la consulta
      return $resultado;
    }
    
    function consultar_venta_producto_limit($id){
      //Conectar a la base de datos 
      $objeto = new DbManager();
      $conexion = $objeto->conexionRespuesta;
      //consulta y ejecucion de la consulta
      $sql = "SELECT v.*, SUM(dv.cantidad * dv.precio) AS total, COUNT(dv.id) AS Productos
      FROM venta v 
      JOIN detalleventa dv ON v.id = dv.ventaId
      WHERE v.id IN (SELECT ventaId FROM detalleventa WHERE productoid = '$id')
      GROUP BY v.id
      LIMIT 4";

      $resultado = mysqli_query($conexion, $sql);
      //cerrando la conexion de datos
      mysqli_close($conexion);
      //retornando el resultado de la consulta
      return $resultado;
    }

  
}

?>