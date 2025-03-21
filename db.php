<?php
$host = 'localhost';
$dbname = 'testowa_baza';
$username = 'root';
$password = 'aaa'; // jeśli masz inne hasło, wpisz tutaj

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Połączenie z bazą danych działa!";
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}
?>
