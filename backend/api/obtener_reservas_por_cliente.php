<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id_cliente)) {
    $stmt = $pdo->prepare("CALL ObtenerReservasPorCliente(:id_cliente)");
    $stmt->bindParam(':id_cliente', $data->id_cliente);

    if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } else {
        echo json_encode(['message' => 'Error al obtener las reservas.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
