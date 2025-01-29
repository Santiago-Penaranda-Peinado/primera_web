<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO datos (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $email);

    if ($stmt->execute()) {
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}


header("Location: index.php");

$conn->close();

exit();
?>