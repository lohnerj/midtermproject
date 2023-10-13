<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>

    <?php
    $userFile = "./5/users.txt";

   
    function getUsers() {
        global $userFile;
        $users = file($userFile, FILE_IGNORE_NEW_LINES);
        return $users;
    }

   
    function addUser($username, $password, $role) {
        global $userFile;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userEntry = "$username:$hashedPassword:$role";
        $currentContent = file_get_contents($userFile);
        if (!empty($currentContent)) {
            // Add a blank line if the file is not empty
            $userEntry = PHP_EOL . $userEntry;
        }
        file_put_contents($userFile, $userEntry, FILE_APPEND);
        header('Location: manage.php');
        exit;
    }
    

    function deleteUser($username) {
        global $userFile;
        $users = getUsers();
        $newUsers = array_filter($users, function ($line) use ($username) {
            return !str_starts_with($line, "$username:");
        });
        $newUserEntries = implode(PHP_EOL, $newUsers);
        file_put_contents($userFile, $newUserEntries); // Add a blank line after writing user entries
        header('Location: manage.php');
        exit;
    }
    

    $users = getUsers();


    if (!empty($users)) {
        echo '<h2>User Information</h2>';
        echo '<ul>';
        foreach ($users as $user) {
            list($username, $password, $role) = explode(':', $user);
            echo "<li>Username: $username, Role: $role</li>";
        }
        echo '</ul>';
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['add_user'])) {
            $newUsername = $_POST['new_username'];
            $newPassword = $_POST['new_password'];
            $newRole = $_POST['new_role'];
            addUser($newUsername, $newPassword, $newRole);
            echo "User added successfully.";
            header('Location: manage.php');
            exit;
        } elseif (isset($_POST['delete_user'])) {
            $usernameToDelete = $_POST['delete_username'];
            deleteUser($usernameToDelete);
            echo "User deleted successfully.";
        }
    }
    ?>

<h2>Add User</h2>
    <form method="post">
        Username: <input type="text" name="new_username" required><br>
        Password: <input type="password" name="new_password" required><br>
        Role:
        <input type="radio" name="new_role" value="admin" required> admin
        <input type="radio" name="new_role" value="user" required> user<br>
        <input type="submit" name="add_user" value="Add User">
    </form>

    <h2>Delete User</h2>
    <form method="post">
        Username to Delete: <input type="text" name="delete_username" required><br>
        <input type="submit" name="delete_user" value="Delete User">
    </form>

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go Back</a>
</body>
</html>
