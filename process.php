<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Połączenie z bazą danych
    include 'connect.php';

    // Pobieranie danych z formularza
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Przygotowanie zapytania SQL
    $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
    $stmt = $pdo->prepare($sql);

    // Powiązanie parametrów i wykonanie zapytania
    $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);

    echo "Dane zostały zapisane!";
}
?>
