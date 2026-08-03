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

    $sql = "SELECT * FROM public.curso ORDER BY registro_fecha DESC";

    $stmt = $pdo->query($sql);

    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    die("Error: " . $e->getMessage());

}
?>