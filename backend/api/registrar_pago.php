<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id_reserva) && isset($data->monto_pagado) && isset($data->fecha_pago) && isset($data->metodo_pago)) {
    $stmt = $pdo->prepare("CALL RegistrarPago(:id_reserva, :monto_pagado, :fecha_pago, :metodo_pago)");
    $stmt->bindParam(':id_reserva', $data->id_reserva);
    $stmt->bindParam(':monto_pagado', $data->monto_pagado);
    $stmt->bindParam(':fecha_pago', $data->fecha_pago);
    $stmt->bindParam(':metodo_pago', $data->metodo_pago);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Pago registrado exitosamente.']);
    } else {
        echo json_encode(['message' => 'Error al registrar el pago.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
