<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tu usuario es diferente
$password = "";     // Cambia esto si tienes contraseña
$database = "streaming";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

