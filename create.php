<?php 
// Vista
include 'conn.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Curso</title>
</head>
<body>
    <main>
        <form action="insert.php" method="POST">

            <label for="titulo">Título del Curso:</label><br>
            <input type="text" id="titulo" name="titulo" required><br><br>

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="40" required></textarea><br><br>

            <input type="submit" value="Crear Curso">
        </form>
    </main>
</body>
</html>
