<?php
// eliminar_comunicado.php
include('../../conexion.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Opcional: obtener el nombre de la foto para eliminarla si existe
    $sql = "SELECT foto FROM comunicados WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foto = $row['foto'];
        if ($foto && file_exists('../../uploads/' . $foto)) {
            unlink('../../uploads/' . $foto);
        }
    }
    
    // Eliminar el comunicado
    $sql = "DELETE FROM comunicados WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: gestion_comunicados.php");
        exit;
    } else {
        echo "Error al eliminar el comunicado: " . $conn->error;
    }
} else {
    echo "No se especificó el comunicado a eliminar.";
}

$conn->close();
?>
