<?php
include 'connect.php';

// Sprawdzanie, czy formularz został wysłany
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pobranie danych z formularza
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Przygotowanie zapytania SQL do aktualizacji danych
    $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Wykonanie zapytania
    $stmt->execute([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'id' => $id
    ]);

    echo "Dane zostały zaktualizowane!";
}
?>
