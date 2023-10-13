<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome!</h1>
    <p>We are a platform designed to improve event management for companies and individuals. This web application reinvents how events, no matter how big or small, are carried out. Organizing events such as weddings, conferences, fundraisers, has never been simpler! </h2>
	<p>Start by logging in or creating an account:</p>
    <button id="createAccountButton" onclick="showCreateAccountForm()">Create an Account</button>
    <button id="loginButton" onclick="showLoginForm()">Log In</button>
    <div id="createAccountForm" style="display: none;">
        <form action="Dashboard.php" method="post">
            <label for="newUsername">New Username:</label>
            <input type="text" id="newUsername" name="newUsername" required><br>           
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required><br>    
            <button id="createAccountButton" onclick="redirectToRegister()">Submit</button>
        </form>
    </div>
    <div id="loginForm" style="display: none;">
        <form action="Dashboard.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>           
            <button id="loginButton" onclick="redirectToLogin()">Submit</button>
        </form>
    </div>
    <script>
        function showCreateAccountForm() {
            document.getElementById("createAccountForm").style.display = "block";
            document.getElementById("loginForm").style.display = "none";
        }
        function showLoginForm() {
            document.getElementById("createAccountForm").style.display = "none";
            document.getElementById("loginForm").style.display = "block";
        }
    </script>
</body>
</html>
