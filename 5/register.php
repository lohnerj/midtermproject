<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="auth.php" method="post">
        <input type="hidden" name="action" value="register">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="isAdmin">Register as admin:</label>
        <input type="checkbox" name="isAdmin"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
