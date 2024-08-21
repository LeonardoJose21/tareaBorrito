<?php
require 'db.php';  // Include your database connection

// Check if the 'id_cliente' parameter is provided
if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];

    try {
        // Prepare the SQL call to the stored procedure
        $stmt = $pdo->prepare("CALL ObtenerClientePorID(:id_cliente)");
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch the client data
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            // Return the client data as JSON
            echo json_encode($cliente);
        } else {
            // If no client is found, return an appropriate message
            echo json_encode(['message' => 'No se encontró el cliente con el ID proporcionado.']);
        }
    } catch (PDOException $e) {
        // Handle any errors that occur during the query
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['message' => 'Por favor, proporcione un ID de cliente.']);
}
?>
``
