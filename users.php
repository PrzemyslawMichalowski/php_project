<?php
include 'connect.php';

$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
</head>
<body>
    <h2>Lista użytkowników</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['first_name']) ?></td>
                <td><?= htmlspecialchars($user['last_name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('Czy na pewno chcesz usunąć?')">Usuń</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="formularz.html">Dodaj nowego użytkownika</a>
</body>
</html>
