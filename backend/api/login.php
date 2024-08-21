<?php
require 'db.php';

if (isset($_POST['usuario']) && isset($_POST['contra'])) {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    // Query to verify user credentials
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND contra = :contra");
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contra', $contra);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Successful login
        session_start();
        $_SESSION['usuario'] = $user['usuario']; // Store user information in session
        header('Location: ../../frontend/menu.php');
        exit();
    } else {
        // Invalid credentials
        echo json_encode(['message' => 'Usuario o contraseña incorrectos.']);
    }
} else {
    echo json_encode(['message' => 'Datos incompletos.']);
}
?>
