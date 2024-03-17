<?php
require_once('database.php'); 
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['category_name'])){
        $errors[] = 'Category Name is required';
    }
    
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
        .error {
            color: #dc3545;
            margin-bottom: 20px;
            border-radius: 6px;
            padding: 10px;
            background-color: #f8d7da;
        }
        .btn-submit {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-reset {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-reset:hover {
            background-color: #5a6268;
            border-color: #545b62;
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
        <h1 class="text-center mb-4">Create Category</h1>
   
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
            <div class="error">
                <span>Please fix the following errors:</span>
                <ul>
                    <?php
                    foreach ($errors as $error){
                        echo '<li>', $error, '</li>';
                    }
                    ?>
                </ul>
            </div><br><br>
        <?php endif; ?>
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <label for="category_name">Category Name</label>
            <input type="text" id="category_name" name="category_name" 
            value="<?php echo isFormValidated() ? '' : $_POST['category_name'] ?>">
            <br><br>

            <label for="image">Category Image</label>
            <input type="text" id="image" name="image"
            value="<?php echo isFormValidated() ? '' : $_POST['category_name'] ?>">
            <br><br>
            

            <button type="submit" class="btn btn-submit mr-2">Submit</button>
            <button type="reset" class="btn btn-reset">Reset</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
            <?php 
            $category = [];
            $category['category_name'] = $_POST['category_name'];
            $category['image'] = $_POST['image'];
            $result = insert_categories($category); 
            $newcategory_id = mysqli_insert_id($db);
            ?>
            <h2>A new category has been created:</h2>
        <?php endif; ?>
        
        <br><br>
        <a href="category.php" class="btn btn-back mt-3">Back to Category List</a>

    </div>
    </div>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <footer class="footer bg-primary text-white text-center py-3">
        © 2024 Shrek-Juices. All Rights Reserved.
    </footer>
</body>
</html>

<?php
db_disconnect($db); 
?>
