<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id_reserva) && isset($data->nuevo_estado)) {
    $stmt = $pdo->prepare("CALL ActualizarEstadoReserva(:id_reserva, :nuevo_estado)");
    $stmt->bindParam(':id_reserva', $data->id_reserva);
    $stmt->bindParam(':nuevo_estado', $data->nuevo_estado);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Estado de reserva actualizado exitosamente.']);
    } else {
        echo json_encode(['message' => 'Error al actualizar el estado de la reserva.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
