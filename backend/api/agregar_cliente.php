<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->nombre) && isset($data->apellido) && isset($data->email) && isset($data->telefono)) {
    $stmt = $pdo->prepare("CALL AgregarCliente(:nombre, :apellido, :email, :telefono)");
    $stmt->bindParam(':nombre', $data->nombre);
    $stmt->bindParam(':apellido', $data->apellido);
    $stmt->bindParam(':email', $data->email);
    $stmt->bindParam(':telefono', $data->telefono);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Cliente agregado exitosamente.']);
    } else {
        echo json_encode(['message' => 'Error al agregar cliente.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
