<?php
require 'db.php';

// Check if POST data is available
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    // Retrieve POST data
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    try {
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare("CALL AgregarCliente(:nombre, :apellido, :email, :telefono)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Cliente agregado exitosamente.']);
        } else {
            echo json_encode(['message' => 'Error al agregar cliente.']);
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo json_encode(['message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
