<?php
$conn = new mysqli("localhost", "root", "@Sid786Fir", "collegeeventdb");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>