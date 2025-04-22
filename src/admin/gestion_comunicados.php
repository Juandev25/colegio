<?php
session_start();

include('../../conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion de comunicados</title>
  <link rel="stylesheet" href="../styles/main.css">
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
      <img src="../logo.png" alt="Logo Colegio" class="logo">
      <h1>Colegio</h1>
      <p>Educación para el futuro</p>
    </div>
    <nav>
      <ul id="menu">
        <li><a href="../../index.html">Inicio</a></li>
        <li><a href="../../nosotros.html">Nosotros</a></li>
        <li><a href="../../servicios.html">Servicios</a></li>
        <li><a href="../../contacto.html">Contacto</a></li>
        <li><a href="../../comunicados.php">Comunicados</a></li>
        <li><a href="login.html">Iniciar Sesión</a></li>
        
      </ul>
    </nav>
    <div class="menu-hamburguesa" id="menuHamburguesa">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </header>

  <main>
    <section class="gestion-comunicados container">
      <h2>Gestión de Comunicados</h2>
      <!-- Formulario para agregar un comunicado -->
      <form class="form-comunicado" method="post" action="guardar_comunicado.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" id="titulo" name="titulo" placeholder="Título del comunicado" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción:</label>
          <textarea id="descripcion" name="descripcion" placeholder="Descripción del comunicado" rows="4" required></textarea>
        </div>
        <div class="form-group">
          <label for="remitente">Remitente:</label>
          <input type="text" id="remitente" name="remitente" placeholder="Nombre del remitente" required>
        </div>
        <div class="form-group">
          <label for="foto">Foto (opcional):</label>
          <input type="file" id="foto" name="foto" accept="image/*">
        </div>
        <button type="submit">Publicar Comunicado</button>
      </form>
      
      <!-- Sección para listar comunicados publicados con opción de eliminar -->
      <section class="lista-comunicados">
        <h3>Comunicados Publicados</h3>
        <?php
        $sql = "SELECT * FROM comunicados ORDER BY created_at DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<article class="comunicado">';
                echo '<h4>' . htmlspecialchars($row["titulo"]) . '</h4>';
                echo '<p>' . htmlspecialchars($row["descripcion"]) . '</p>';
                echo '<p><strong>Remitente:</strong> ' . htmlspecialchars($row["remitente"]) . '</p>';
                if ($row["foto"]) {
                    echo '<img src="../../uploads/' . htmlspecialchars($row["foto"]) . '" alt="Foto del comunicado">';
                }
                echo '<p class="fecha">' . htmlspecialchars($row["created_at"]) . '</p>';
                // Botón para eliminar el comunicado 
                echo '<a href="eliminar_comunicado.php?id=' . $row["id"] . '" onclick="return confirm(\'¿Está seguro de eliminar este comunicado?\');" class="btn-eliminar">Eliminar</a>';
                echo '</article>';
            }
        } else {
            echo '<p>No hay comunicados publicados.</p>';
        }
        $conn->close();
        ?>
      </section>
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

  <script type="module" src="../main.js"></script>
</body>
</html>
