<?php
include 'connect.php';

// Pobranie ID użytkownika z adresu URL
$user_id = $_GET['id'];

// Pobranie danych użytkownika z bazy
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "Użytkownik nie znaleziony!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj użytkownika</title>
</head>
<body>
    <h2>Edytuj dane użytkownika</h2>
    <form action="update_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" required><br><br>

        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>

        <input type="submit" value="Zapisz zmiany">
    </form>
</body>
</html>
