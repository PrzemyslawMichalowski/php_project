<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Sprawdzenie, czy e-mail już istnieje
    $check_sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->execute(['email' => $email]);
    $emailExists = $check_stmt->fetchColumn();

    if ($emailExists) {
        echo "Błąd: Podany adres e-mail już istnieje!";
    } else {
        // Wstawianie rekordu
        $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]);

        echo "Dane zostały zapisane!";
    }
}
?>
<br><br>
<a href="index.php"><button>Powrót do formularza</button></a>