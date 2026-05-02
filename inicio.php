<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD Videojuegos</title>
</head>
<body>
    <h1>Inicio de sesión</h1>

    <form method="POST" action="login.php">
        <label>Usuario:</label>
        <input type="text" name="user" required>
        <label>Password:</label>
        <input type="password" name="pass" required>

        <button type="submit" name="access">Acceder</button>
        <button type="submit" name="registre">Registrarse</button>


    </form>
    
</body>
</html>