<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'kniznica';
$conn = new mysqli($server, $username, $password, $dbname);

if($conn -> connect_error) {
    die("Pripojenie zlyhalo: " . $conn->connect_error );
}

if(isset($_POST['book-title']) && isset($_POST['book-author'])) {
    $nazov = $_POST['book-title'];
    $autor = $_POST['book-author'];
} else {
    echo "Chýbajú hodnoty pre nazov alebo autora knihy.";
    
    exit;
}

$nazov = $_POST['book-title'];
$autor = $_POST['book-author'];

$sql = "INSERT INTO zoznam_knih (nazov, autor) VALUES ('$nazov', '$autor')";

if($conn->query($sql) === TRUE) {
    echo "Kniha bola úspešne vložené do našej knižnice!";
} else {
    echo "Chyba" . $sql . "<br>" . $conn->error;
}

$conn->close();
?>