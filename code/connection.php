<?php
$connection = new mysqli('localhost', 'root', '', 'athenscoffee_database');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
?>
