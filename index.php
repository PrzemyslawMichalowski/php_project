<?php
// Połączenie z bazą danych
include 'connect.php';

// Pobranie wszystkich użytkowników
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz użytkownika</title>
</head>
<body>

    <!-- Formularz dodawania użytkownika -->
    <form action="process.php" method="POST">
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Zapisz">
    </form>

    <br><br>

    <!-- Wyświetlenie listy użytkowników -->
    <h3>Lista użytkowników:</h3>
    <table border="1">
        <tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
