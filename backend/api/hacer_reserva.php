<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id_cliente) && isset($data->id_paquete) && isset($data->fecha_reserva) && isset($data->estado_reserva) && isset($data->metodo_pago)) {
    $stmt = $pdo->prepare("CALL HacerReserva(:id_cliente, :id_paquete, :fecha_reserva, :estado_reserva, :metodo_pago)");
    $stmt->bindParam(':id_cliente', $data->id_cliente);
    $stmt->bindParam(':id_paquete', $data->id_paquete);
    $stmt->bindParam(':fecha_reserva', $data->fecha_reserva);
    $stmt->bindParam(':estado_reserva', $data->estado_reserva);
    $stmt->bindParam(':metodo_pago', $data->metodo_pago);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Reserva realizada exitosamente.']);
    } else {
        echo json_encode(['message' => 'Error al realizar la reserva.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
