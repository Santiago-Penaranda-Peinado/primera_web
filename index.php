<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="styles/main.css">

  <title>Mi primera página web tilin</title>

</head>
<body>
  <div class="title-box">
    <h1>Titulo de prueba</h1>
  </div>

  <h1>wenas wenaaas</h1>
  <p>Este es mi primer párrafo tilina.</p>

  <h2> hola </h2>
  <p>Este es mi segundo párrafo tilina.</p>

  <h3> hola </h3>
  <p>Este es mi tercer párrafo tilina.</p>

  <h4> hola </h4>
  <p>Este es mi cuartoパrrafo tilina.</p>

  <h5> hola </h5>
  <p>Este es mi quinto párrafo tilina.</p>

  <h6> hola </h6>
  <p>Este es mi sextoパrrafo tilina.</p>

<img src="perrillo.jpeg" alt="pichiscv">
<a href="https://www.facebook.com/santiago.penaranda.75">facebook del mayor tilin</a>

<div class="particle-container" id="particle-container"></div> <!-- Contenedor de las particulas -->

<div class ="title-box">
  <h1>formulario para guardar datos</h1>
</div>

<form action="guardar_datos.php" method="post">
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="correo">Correo:</label>
  <input type="email" id="email" name="email" required>

  <input type="submit" value="Enviar">
</form>

<div class="box">
  <h2>datos guardados</h2>
  <table border="1">
    <tr>
      <th>ID</th>  
      <th>Nombre</th>
      <th>Correo</th>
    </tr>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario_db";

    $conn = new mysqli($servername, $username, $password, $dbname); // Crear conexión

    if ($conn->connect_error) { // Verificar conexión, si falla, mostrar mensaje de error
        die("Conexión fallida: " . $conn->connect_error); // Terminar la ejecución del script
    }

    $sql = "SELECT id, nombre, email FROM datos"; // Consulta SQL, seleccionar id, nombre y correo de la tabla datos en la base de datos formulario_db 
    $result = $conn->query($sql); // Ejecutar la consulta SQL, con el fin de obtener los resultados y almacenar el resultado en la variable $result 

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["email"] . "</td></tr>"; // Mostrar los datos en una tabla usando el HTML correspondiente
        }
    } else {
      echo "No se encontraron datos en la base de datos.";  
    }

    $conn->close();
    ?>
  </table>
</div>

<script src="scripts/particles.js"></script>
</body>
</html>





