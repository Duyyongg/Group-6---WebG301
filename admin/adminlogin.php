<?php
require_once('database.php');

session_start();
$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $admin = find_admin_by_username($username);

    if ($admin) {
       
        if (sha1($password) === $admin['Hash_password']) {
            $_SESSION['admin_id'] = $admin['AdminID'];
            $_SESSION['username'] = $admin['Username'];
            header("Location: adminaccount.php");
            exit;
        } else {
            $errorMsg = 'Invalid password.';
        }
    } else {
        $errorMsg = 'Username not found.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Shrek Juices</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Admin Login</h1>
        <?php if ($errorMsg): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMsg; ?>
            </div>
        <?php endif; ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
