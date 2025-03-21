<?php
// Połączenie z bazą danych
$host = "localhost";
$dbname = "moja_baza";
$username = "root";
$password = "aaa";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

// Pobieranie danych z tabeli
$sql = "SELECT * FROM uzytkownicy";
$stmt = $conn->prepare($sql);
$stmt->execute();
$uzytkownicy = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Wyświetlanie danych
foreach ($uzytkownicy as $uzytkownik) {
    echo "ID: " . $uzytkownik['id'] . "<br>";
    echo "Imię: " . $uzytkownik['imie'] . "<br>";
    echo "Email: " . $uzytkownik['email'] . "<br>";
    echo "Wiek: " . $uzytkownik['wiek'] . "<br><br>";
}
?>
