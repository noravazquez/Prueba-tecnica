<?php
$host = "10.10.127.2";
$port = "5432";
$dbname = "uc3g";
$user = "uc3g";
$password = "7A?Tk:fJV>(M9+KD";

try {

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titulo"], $_POST["descripcion"])) {

        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];

        $sql = "INSERT INTO public.curso
                (titulo, descripcion, registro_fecha, estado)
                VALUES
                (:titulo, :descripcion, NOW(), 'A')";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":titulo" => $titulo,
            ":descripcion" => $descripcion
        ]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_curso"], $_POST["estado"])) {

        $sql = "UPDATE public.curso
                SET estado = :estado
                WHERE id_curso = :id_curso";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":estado" => $_POST["estado"],
            ":id_curso" => $_POST["id_curso"]
        ]);

        header("Location: index.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {

        $sql = "DELETE FROM public.curso
                WHERE id_curso = :id_curso";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id_curso" => $_POST["id_curso"]
        ]);

        header("Location: index.php");
        exit;
    }

    $sql = "
        SELECT *
        FROM public.curso
        ORDER BY registro_fecha
    ";

    $stmt = $pdo->query($sql);

    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Error: " . $e->getMessage());

}
?>