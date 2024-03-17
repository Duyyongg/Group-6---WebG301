<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['search'])) {
    // Xử lý yêu cầu tìm kiếm
    $keyword = $_POST['keyword'];
    $search_result = search_categories($keyword);
} else {
    // Hiển thị tất cả các category nếu không có yêu cầu tìm kiếm
    $search_result = fint_all_categories();     
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shrek-Juices</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold; 
            color: #28a745 !important; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .category-image {
            max-width: 100%;
            height: auto;
            max-height: 170px;
        }

        .btn-outline-light {
            background-color: #fff;
            color: #000; /* Màu chữ */
            border-color: #fff; /* Màu viền */
        }

        
       
    </style>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">Shrek-Juices</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Juice Menu</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <!-- <li class="nav-item ">
                        <a class="nav-link" href="adminlogin.php">Admin Login</a> 
                    </li> -->
                    <li class="nav-item active">
                        <a class="nav-link" href="category.php">Category <span class="sr-only">(current)</span></a> 
                    </li>
                </ul>
<form class="form-inline my-2 my-lg-0 ml-auto" action="category.php" method="post">
                    <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search...">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search">Search</button>
                </form>
            </div>
        </nav>
        
    </header>
</body>
<body>
    <div class="container">
        <h1 class="mt-5">Category</h1>
        <a href="creat_category.php" class="btn btn-primary">Create Category</a>
        <table class="table table-bordered mt-3">
        <a href="adminaccount.php" class="btn btn-primary">Back Account Admin</a>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $categories = fint_all_categories();
                while ($category = mysqli_fetch_assoc($search_result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($category['category_name']) . "</td>"; 
                    echo "<td><img src='" . htmlspecialchars($category['image']) . "' alt='Category Image' class='category-image'></td>";
                    echo "<td><a href='edit_category.php?id=" . urlencode($category['category_id']) . "' class='btn btn-primary'>Edit</a>   <a href='delete_category.php?id=" . urlencode($category['category_id']) . "' class='btn btn-primary'>Delete</a></td>";
                    echo "</tr>";
                }
                mysqli_free_result($categories);
                ?>
            </tbody>
        </table>

    </div>

    <footer class="footer bg-primary text-white text-center py-3">
        © 2024 Shrek-Juices. All Rights Reserved.
    </footer>
</body>
</html>
<?php
db_disconnect($db);
?>