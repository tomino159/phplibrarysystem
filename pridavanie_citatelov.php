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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meno = $_POST["meno"];
    $priezvisko = $_POST["priezvisko"];
    $cislo_op = $_POST["cislo_op"];
    $datum_narodenia = $_POST["datum_narodenia"];

    $sql = "INSERT INTO zoznam_citatelov (meno, priezvisko, cislo_op, datum_narodenia) VALUES (:meno, :priezvisko, :cislo_op, :datum_narodenia)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':meno', $meno, PDO::PARAM_STR);
        $stmt->bindParam(':priezvisko', $priezvisko, PDO::PARAM_STR);
        $stmt->bindParam(':cislo_op', $cislo_op, PDO::PARAM_STR);
        $stmt->bindParam(':datum_narodenia', $datum_narodenia, PDO::PARAM_STR);
        $stmt->execute();
        echo "Čitateľ bol úspešne pridaný.";
    } catch (PDOException $e) {
        die("Chyba pri vkladaní čitateľ do databázy: " . $e->getMessage());
    }
}
?>
