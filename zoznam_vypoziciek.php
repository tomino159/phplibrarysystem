<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

if (isset($_POST['vypozicka'])) {
    $id_citatel = $_POST['citatel_id'];
    $id_kniha = $_POST['kniha_id'];
    $datum_vypozicky = date("Y-m-d"); // Aktuálny dátum

    $sql = "INSERT INTO zoznam_vypoziciek (id_citatel, id_kniha, datum_vypozicky) VALUES ($id_citatel, $id_kniha, '$datum_vypozicky')";

    if ($conn->query($sql) === TRUE) {
        echo "Kniha bola úspešne vypožičaná.";
    } else {
        echo "Chyba pri vypožičiavaní knihy: " . $conn->error;
    }
} elseif (isset($_POST['vratenie'])) {
    $id_vypozicky = $_POST['vypozicka_id'];
    $datum_vratene = date("Y-m-d"); // Aktuálny dátum

    $sql = "UPDATE zoznam_vypoziciek SET datum_vratene = '$datum_vratene' WHERE id = $id_vypozicky";

    if ($conn->query($sql) === TRUE) {
        echo "Kniha bola úspešne vrátená.";
    } else {
        echo "Chyba pri vracaní knihy: " . $conn->error;
    }
}

$conn->close();
?>