<!DOCTYPE html>
<?php include 'conn.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>

    <style>
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f4f6f8;
        margin: 0;
        padding: 30px;
    }

    main {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #2c3e50;
    }

    h2 {
        color: #34495e;
        margin-top: 30px;
    }

    form {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    button:hover {
        background-color: #2980b9;
    }

    hr {
        border: 0;
        border-top: 1px solid #ddd;
        margin: 30px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th {
        background-color: #34495e;
        color: white;
        padding: 12px;
        text-align: center;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #eaf2f8;
    }

    select {
        padding: 6px;
        border-radius: 5px;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    td form {
        margin: 0;
    }

    td button {
        background-color: #e74c3c;
    }

    td button:hover {
        background-color: #c0392b;
    }
</style>
</head>

<body>
    <main>
        <section>
            <h1>Curso</h1>

            <button type="button" onclick="mostrarFormulario()">
                Agregar curso
            </button>

            <div id="formularioCurso" style="display:none; margin-top:20px;">

                <h2>Nuevo Curso</h2>

                <form method="POST">

                    <label>Título:</label><br>
                    <input type="text" name="titulo" required><br><br>

                    <label>Descripción:</label><br>
                    <textarea name="descripcion" required></textarea><br><br>

                    <button type="submit">Guardar</button>

                </form>

            </div>
        </section>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>descripcion</th>
                <th>estado</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>

            <?php foreach ($cursos as $curso): ?>
            <tr>
                <td><?= $curso["titulo"] ?></td>
                <td><?= $curso["descripcion"] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id_curso" value="<?= $curso["id_curso"] ?>">
                        <select name="estado" onchange="this.form.submit()">
                            <option value="A" <?= $curso["estado"] == "A" ? "selected" : "" ?>>
                                A
                            </option>
                            <option value="I" <?= $curso["estado"] == "I" ? "selected" : "" ?>>
                                I
                            </option>
                        </select>
                    </form>
                </td>
                <td><?= $curso["registro_fecha"] ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="id_curso" value="<?= $curso["id_curso"] ?>">

                        <button type="submit" name="eliminar">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <script>
        function mostrarFormulario() {

            let formulario = document.getElementById("formularioCurso");

            if (formulario.style.display === "none") {
                formulario.style.display = "block";
            } else {
                formulario.style.display = "none";
            }

        }
    </script>
</body>

</html>