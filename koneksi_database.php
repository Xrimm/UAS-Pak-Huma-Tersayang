<?php
$host = "localhost";
$user = "root";
$pass = "Cr1mm0r@Ger1m";
$db   = "db_casholle"; // ganti sesuai database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ SQL TIDAK TERHUBUNG: " . $conn->connect_error);
}