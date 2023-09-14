<?php
$dsn = 'mysql:host=localhost;dbname=kniznica';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Chyba pripojenia k databázi: " . $e->getMessage());
}

if (isset($_POST["vratenie"])) {
    $vypozicka_id = $_POST["id"];

    $sql = "UPDATE zoznam_vypoziciek SET datum_vratene = NOW() WHERE id = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $vypozicka_id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Kniha bola úspešne vrátená.";
    } catch (PDOException $e) {
        die("Chyba pri vrátení knihy: " . $e->getMessage());
    }
}
?>