<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

$sql = "SELECT * FROM zoznam_citatelov";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<b>Meno:</b> " . $row["meno"] . "<br>";
        echo "<b>Priezvisko:</b> " . $row["priezvisko"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "Žiadny čitatelia neboli nájdení v databáze.";
}

$conn->close();
?>
