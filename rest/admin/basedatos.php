<?php
// CREAR CONEXIÓN
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "restaurante";

// Creacion de connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection falliada: " . $conn->connect_error);
}
?>
