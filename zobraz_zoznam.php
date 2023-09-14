<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

$sql = "SELECT * FROM zoznam_knih";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<b>Názov knihy:</b> " . $row["nazov"] . "<br>";
        echo "<b>Autor: </b>" . $row["autor"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Žiadne knihy neboli nájdené v databáze.";
}

$conn->close();
?>
