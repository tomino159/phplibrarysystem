<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

if (isset($_POST['odobranie-cita'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM zoznam_citatelov WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Čitateľ bol úspešne odobraný z našej databáze.";
    } else {
        echo "Chyba pri odoberaní čitateľa: " . $conn->error;
    }
} else {
    echo "ID čitateľa na odobranie nebolo zaslané.";
}

$conn->close();
?>
