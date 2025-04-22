<?php

include('conexion.php');
$sql = "SELECT * FROM comunicados ORDER BY created_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Colegio</title>
  <link rel="stylesheet" href="src/styles/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <header>
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <div class="logo_titulo">
      <img src="src/logo.png" alt="Logo Colegio" class="logo">
      <h1>Colegio</h1>
      <p>Educación para el futuro</p>
    </div>
    <nav>
      <ul id="menu">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="nosotros.html">Nosotros</a></li>
        <li><a href="servicios.html">Servicios</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="comunicados.php">Comunicados</a></li>
        <li><a href="src/admin/login.html">Iniciar Sesión</a></li>
      </ul>
    </nav>
    <div class="menu-hamburguesa" id="menuHamburguesa">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </header>

  <main>
    <section class="comunicados container">
      <h2>Comunicados</h2>
      <?php
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<article class="comunicado">';
              echo '<h3>' . htmlspecialchars($row["titulo"]) . '</h3>';
              echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';
              echo '<p><strong>Remitente:</strong> ' . htmlspecialchars($row["remitente"]) . '</p>';
              if ($row["foto"]) {
                  echo '<img src="uploads/' . htmlspecialchars($row["foto"]) . '" alt="Foto del comunicado">';
              }
              echo '<p class="fecha">' . htmlspecialchars($row["created_at"]) . '</p>';
              echo '</article>';
          }
      } else {
          echo '<p>No hay comunicados disponibles.</p>';
      }
      $conn->close();
      ?>
    </section>
  </main>

  <footer>
    <p>Síguenos en Nuestras Redes Sociales</p>
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>© 2024 Colegio Emanuel. Todos los derechos reservados.</p>
    <p>"Todo lo puedo en Cristo que me fortalece"</p>
  </footer>

  <script type="module" src="src/main.js"></script>
</body>
</html>
