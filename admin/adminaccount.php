<?php
require_once('database.php');

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminlogin.php");
    exit;
}

$admins = find_all_admins();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Accounts - Shrek Juices</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Admin Accounts</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($admin = mysqli_fetch_assoc($admins)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($admin['Username']) . "</td>";
                    echo "<td>" . htmlspecialchars($admin['Email']) . "</td>";
                    echo "<td><a href='edit_admin.php?id=" . urlencode($admin['AdminID']) . "' class='btn btn-primary'>Edit</a></td>";
                    echo "</tr>";
                }
                mysqli_free_result($admins);
                ?>
            </tbody>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Shrek Juices Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="adminaccount.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="category.php">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index products.php">Product</a>
            </li>
            <!-- Thêm các mục menu khác ở đây nếu cần -->
        </ul>
    </div>
</nav>

        </table>
        <!-- <a href="index.php" class="btn btn-secondary">Back to Index</a> -->
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
