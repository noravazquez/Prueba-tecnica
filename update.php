<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_curso = isset($_POST['id_curso']) ? trim($_POST['id_curso']) : null;
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;

    if (!empty($id_curso) && !empty($name) && !empty($email)) {
        
        $sql = "UPDATE cursos SET nombre = ?, email = ? WHERE id_curso = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            
            $stmt->bind_param("sss", $name, $email, $id_curso);
            
            if ($stmt->execute()) {
                header("Location: index.php?mensaje=actualizado");
                exit();
            } else {
                echo "Error al actualizar el registro: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }

    } else {
        echo "Por favor, rellena todos los campos del formulario.";
    }

} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>
