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
            <?php foreach ($cursos as $curso): ?>
                <li><?= htmlspecialchars($curso['titulo']) ?></li>
            <?php endforeach; ?>
        </ul>
    </main>
</body>

</html>