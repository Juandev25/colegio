<?php
// guardar_comunicado.php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $remitente = $conn->real_escape_string($_POST['remitente']);
    
    // Manejo de la subida de archivo (foto) si se envía
    $foto_nombre = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $uploads_dir = '../../uploads';
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }
        $tmp_name = $_FILES['foto']['tmp_name'];
        $foto_nombre = basename($_FILES['foto']['name']);
        $target_file = "$uploads_dir/$foto_nombre";
        move_uploaded_file($tmp_name, $target_file);
    }
    
    $sql = "INSERT INTO comunicados (titulo, descripcion, remitente, foto)
            VALUES ('$titulo', '$descripcion', '$remitente', '$foto_nombre')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: gestion_comunicados.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
