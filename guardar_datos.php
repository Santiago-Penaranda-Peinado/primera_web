<!-- filepath: /C:/xampp/htdocs/primera_web/guardar_datos.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Formatear los datos para guardarlos en un archivo de texto
    $data = "Nombre: $name, Correo: $email" . PHP_EOL;

    // Especificar el archivo donde se guardarán los datos
    $file = 'datos.txt';

    // Guardar los datos en el archivo
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirigir al usuario a una página de confirmación o de vuelta al formulario
    header("Location: gracias.html");
    exit();
}
?>