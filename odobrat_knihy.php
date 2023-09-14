<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

if (isset($_POST['btn-odobranie'])) {
    $id = $_POST['book_id'];

    $sql = "DELETE FROM zoznam_knih WHERE book_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Kniha bola úspešne odstránená.";
    } else {
        echo "Chyba pri odstraňovaní knihy: " . $conn->error;
    }
} else {
    echo "ID knihy na odstránenie nebolo zaslané.";
}

$conn->close();
?>
