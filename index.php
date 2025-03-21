

<!DOCTYPE html>
<html>
<head>
    <title>Formularz PHP</title>
</head>
<body>
    <h1>Wprowadź swoje dane</h1>
    <form action="process.php" method="POST">
        <label for="name">Imię:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="age">Wiek:</label>
        <input type="number" id="age" name="age" required>
        <br>
        <input type="submit" value="Wyślij">
    </form>
</body>
</html>