<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli("db", "root", "root123", "hola_db");

    $conn->query("CREATE TABLE IF NOT EXISTS mensajes (id INT AUTO_INCREMENT PRIMARY KEY, texto VARCHAR(100))");

    $total = $conn->query("SELECT COUNT(*) AS total FROM mensajes")->fetch_assoc()["total"];
    if ($total == 0) {
        $conn->query("INSERT INTO mensajes (texto) VALUES ('Hola, Mundo desde PHP y MySQL!')");
    }

    $fila = $conn->query("SELECT texto FROM mensajes LIMIT 1")->fetch_assoc();

    echo "<h1>" . $fila["texto"] . "</h1>";
    echo "<p>Conexion exitosa a la base de datos MySQL.</p>";
} catch (Exception $e) {
    echo "<h1>Error de conexion</h1><p>" . $e->getMessage() . "</p>";
}
