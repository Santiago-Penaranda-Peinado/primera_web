<!DOCTYPE html>
<html>
<head>
  <title>Mi primera página web tilin</title>
  <style>
    body {
        font-family: Arial, sans-serif;/*tipo de letra de la pagina*/
        background-color: lightblue ;/*color de fondo de la pagina*/
        color: gray;/*color de la letra de la pagina*/
        margin: 0;/*margen de la pagina*/
        padding: 0;/*padding de la pagina*/
    }
    img {
        width: 300px;/*ancho de la imagen*/
        height: auto;/*alto de la imagen, como esta en auto, mantiene la proporcion, evitando deformaciones*/
        display: block;/*hace que la imagen se muestre en bloque, es decir, que se muestre en una linea diferente, comportandose como un bloque*/
        margin: 0 auto;/*centra la imagen horizontalmente */
    }
    form {
        margin: 20px;/*margen del formulario*/
    }
    label, input {
        display: block;/*hace que los elementos se muestren en bloque, es decir, que se muestren en una linea diferente, comportandose como un bloque*/
        margin-bottom: 10px;/*margen inferior de los elementos*/
    }
    h1 + p {
      font-size: 2em; /* Tamaño de la letra */
    }
    h2 + p {
      font-size: 1.5em; /* Tamaño de la letra */
    }
    h3 + p {
      font-size: 1.17em; /* Tamaño de la letra */
    }
    h4 + p {
      font-size: 1em; /* Tamaño de la letra */
    }
    h5 + p {
      font-size: 0.83em; /* Tamaño de la letra */
    }
    h6 + p {
      font-size: 0.67em; /* Tamaño de la letra */
    }
    .title-box{
      background-color: white; /* Color de fondo */
      border: 2px solid black; /* Borde */
      padding: 10px; /* Espacio interior */
      margin: 20px; /* Espacio exterior */
      text-align: center; /* Alinear texto al centro */
      margin: 20px auto; /* Centrar horizontalmente */
      width: fit-content; /* Ancho del contenedor */
    }
    .particle-container {
      position: relative;
      width: 600px;
      height: 400px;
      border: 2px solid black;
      margin: 50px auto;
      overflow: hidden;
      background-color: lightgray;
    }
    .particle{
      position: absolute;
      width: 20px;
      height: 20px;
      background-color: chocolate;
      border-radius: 50%;
      pointer-events: none;
    }
    .box {
      background-color: lightcoral;
      padding: 20px; /* Espacio interior */
      margin: 20px; /* Espacio exterior */
      border: 3px solid black;
      text-align: center;
      color: black;
    }
  </style>

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
<script>
  const container = document.getElementById('particle-container');
  const particles = [];

  container.addEventListener('mousemove', (e) => {
    const rect = container.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const speed = Math.sqrt(e.movementX * e.movementX + e.movementY * e.movementY);

    const particle = document.createElement('div');
    particle.classList.add('particle');
    particle.style.left = `${x}px`;
    particle.style.top = `${y}px`;

    const direction = Math.random() * 2 * Math.PI;
    const velocityX = Math.cos(direction) * speed;
    const velocityY = Math.sin(direction) * speed;

    container.appendChild(particle);
    particles.push( {element: particle, velocityX, velocityY});

    setTimeout(() => {
      particle.remove();
      particles.shift();
    }, 10000);
  });

  function animateParticles() {
    particles.forEach(p => {
      const rect = container.getBoundingClientRect();
      const particleRect = p.element.getBoundingClientRect();
        let x = parseFloat(p.element.style.left);
        let y = parseFloat(p.element.style.top);

        x += p.velocityX * 0.1;
        y += p.velocityY * 0.1;

        if (x <= 0 || x >= rect.width - particleRect.width) {
          p.velocityX *= -1;
        }
        if (y <= 0 || y >= rect.height - particleRect.height) {
          p.velocityY *= -1;
        }

        p.element.style.left = `${x}px`;
        p.element.style.top = `${y}px`;
    })

    requestAnimationFrame(animateParticles);
  }

  animateParticles(); // Iniciar animación, fin de función
</script> 

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

</body>
</html>





