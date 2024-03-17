<?php
require_once('database.php');

session_start();

$message = '';
$update_result = false;

$id = $_GET['id'] ?? '';
$admin = find_admin_by_id($db, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($current_password)) {
        $message = 'Please enter the current password.';
    } elseif (sha1($current_password) !== $admin['Hash_password']) {
        $message = 'Current password is incorrect.';
    } else {
       
        if (empty($new_password) && empty($confirm_password)) {
            $update_result = update_admin_info($db, $id, $username, $email, $admin['Hash_password']);
            $message = $update_result ? 'Admin updated successfully.' : 'Failed to update admin.';
        } elseif ($new_password === $confirm_password) {
            
            $hashed_new_password = sha1($new_password);
            $update_result = update_admin_info($db, $id, $username, $email, $hashed_new_password);
            $message = $update_result ? 'Admin updated successfully.' : 'Failed to update admin.';
        } else {
            $message = 'New password and confirmation do not match.';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin - Shrek Juices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .edit-form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-title {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-custom {
            width: 100%;
            padding: 10px;
        }
        .form-footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="edit-form-container">
                <h2 class="form-title">Edit Admin Account</h2>
                <?php if (!empty($message)): ?>
                    <div class="alert <?php echo ($update_result ? 'alert-success' : 'alert-danger'); ?>" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form action="edit_admin.php?id=<?php echo urlencode($id); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($admin['Username'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($admin['Email'] ?? ''); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="current_password">Current Password </label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password </label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password </label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-custom">Update Admin</button>
                </form>
                <div class="form-footer">
                    <a href="adminaccount.php" class="btn btn-link">Back to Admin Accounts</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>