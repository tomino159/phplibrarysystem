<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Pripojenie k databáze zlyhalo: " . $conn->connect_error);
}

if (isset($_GET['zobraz_cita'])) {
    $id_kniha = $_GET['id_kniha'];

    $sql = "SELECT c.id AS citatel_id, c.meno AS citatel_meno, c.priezvisko AS citatel_priezvisko, c.datum_narodenia AS citatel_datum_narodenia
        FROM zoznam_vypoziciek AS v
        INNER JOIN zoznam_knih AS k ON v.book_id = k.book_id
        INNER JOIN zoznam_citatelov AS c ON v.id_citatel = c.id
        WHERE k.book_id = $id_kniha";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Kniha je požičaná čitateľovi s ID {$row['citatel_id']} (Meno: {$row['citatel_meno']}, Priezvisko: {$row['citatel_priezvisko']}, Dátum narodenia: {$row['citatel_datum_narodenia']}).";
        }
    } else {
        echo "Táto kniha nie je momentálne požičaná.";
    }
} else {
    echo "Prosím, zadajte ID knihy do formulára.";
}

$conn->close();
?>