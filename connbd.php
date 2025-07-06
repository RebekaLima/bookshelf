<?php

$username = 'root';
$password = '';

$conn = new PDO('mysql:host=localhost;dbname=bookshelf', $username, $password);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "banco conectado";
} catch(PDOException $e) {
    echo 'ERROR'.$e->getMessage();
}


?>