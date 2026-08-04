<!DOCTYPE html>
// Vista
<?php include 'conn.php'; ?>
<?php 
    require_once "conn.php";
    $dbCurso = new Curso();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>

<body>
    <main>
        <section>
            <h1>Cursos</h1>
        </section>
        <!-- <ul>
            <?php //foreach ($cursos as $curso): ?>
                <li><?//= htmlspecialchars($curso['titulo']) ?></li>
            <?php //endforeach; ?>
        </ul> -->
        <table>
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $cursos = $dbCurso->read();
                foreach ($cursos as $curso): ?>
                <tr>
                    <th><?= htmlspecialchars($curso['titulo']) ?></th>
                    <td><?= htmlspecialchars($curso['descripcion'])?></td>
                    <td><?= htmlspecialchars($curso['registro_fecha'])?></td>
                    <td><?= htmlspecialchars($curso['estado'])?></td>
                    <td>
                        <a href="form.php?id=<?= htmlspecialchars($curso['id_curso']) ?>">
                            Actualizar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <section>
            <a href="create.php" class="btn-crear">Agregar Nuevo Curso</a>
        </section>
    </main>
</body>



<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    $result = $conn->query($query);

    if ($result) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
</html>