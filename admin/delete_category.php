<?php
require_once('database.php');
require_once('functions.php');

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_category($_POST['category_id']);
    redirect_to('category.php');
}else {
    if(!isset($_GET['id'])){
        redirect_to('category.php');
    }
    $id = $_GET['id'];
    $teacher = find_categories_by_id($id);
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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold; 
            color: #28a745 !important; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
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
                        <li class="nav-item ">
                            <a class="nav-link" href="adminlogin.php">Admin Login</a> 
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="category.php">Category <span class="sr-only">(current)</span></a> 
                        </li>
                    </ul>
                </div>  
            </nav>
        </header>
    <div class="container">
        <h1 class="text-center mb-4">Delete Category</h1>
        <h5>Are you sure you want to delete this Category?</h5>
        <p><span class="label">Category name: </span><?php echo $teacher['category_name']; ?></p>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="hidden" name="category_id" value="<?php echo $teacher['category_id']; ?>" >

            <button type="submit" class="btn btn-delete mr-2">Delete Category</button>
        </form>
        
        <br><br>
        <a href="category.php" class="btn btn-back mt-3">Back to Category List</a>
    </div>

    <footer class="footer bg-primary text-white text-center py-3">
        © 2024 Shrek-Juices. All Rights Reserved.
    </footer>
</body>
</html>

<?php
db_disconnect($db);
?>