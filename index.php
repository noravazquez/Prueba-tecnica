<!DOCTYPE html>
<?php include 'conn.php'; ?>
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
        <ul>
                <table class="table table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Fecha de registro</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                       <?php foreach($curso as $curso): ?>
                    <tr>
                    <td><?= $curso['id_curso']; ?></td>
                    <td><?= htmlspecialchars($curso['titulo']); ?></td>
                    <td><?= htmlspecialchars($curso['descripcion']); ?></td>
                    <td><?= $curso['estado'] == 'A' ? 'Activo' : 'Inactivo'; ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($curso['registro_fecha'])); ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>
            </tr>
            </tbody>
                </table>
            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>