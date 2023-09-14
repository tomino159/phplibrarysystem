<?php
$dsn = 'mysql:host=localhost;dbname=kniznica';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Chyba pripojenia k databáze: " . $e->getMessage());
}

if (isset($_POST["vypozicka"])) {
    $citatel_id = $_POST["id_citatel"];
    $kniha_id = $_POST["id_kniha"];

    $sql = "INSERT INTO zoznam_vypoziciek (id_citatel, id_kniha, datum_vypozicky) VALUES (:id_citatel, :id_kniha, NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_citatel', $citatel_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_kniha', $kniha_id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Kniha bola úspešne vypožičaná.";
    } catch (PDOException $e) {
        die("Chyba pri vypožičaní knihy: " . $e->getMessage());
    }
}
?>