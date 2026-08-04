<?php
// Controlador
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo      = isset($_POST['titulo'])      ? trim($_POST['titulo'])      : null;
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : null;

    if (!empty($titulo) && !empty($descripcion)) {
        
        $dbCurso = new Curso();
        
        if ($dbCurso->create($titulo, $descripcion)) {
            header("Location: index.php?mensaje=creado");
            exit();
        } else {
            echo "No se pudo guardar el registro.";
        }

    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
