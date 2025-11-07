<?php
$host = "localhost";
$user = "root";
$pass = "Senai@118";
$dbname = "crud";

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
