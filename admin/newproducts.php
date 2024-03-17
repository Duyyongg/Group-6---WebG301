<?php
require_once('database.php');
$errors = [];
function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    
    if (empty($_POST['product_id'])) {
        $errors[] = 'Product id is required';
    }
    if (empty($_POST['product_name'])) {
        $errors[] = 'Product name is required';
    }
    if (empty($_POST['category_id'])) {
        $errors[] = 'Category ID is required';
    }
    if (empty($_POST['price'])) {
        $errors[] = 'Price is required';
    }
    if (empty($_POST['size'])) {
        $errors[] = 'Size is required';
    }
    if (empty($_POST['ingredients'])) {
        $errors[] = 'Ingredients are required';
    }
    if (empty($_POST['image_url'])) {
        $errors[] = 'image is required';
    }

   
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    <div class="container">
        <h1 class="text-center mb-4">Create Product</h1>
        <!-- Your PHP code here -->
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

    <!-- Form nhập thông tin sản phẩm -->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
       
    <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id" min=1
        value="<?php echo isFormValidated()? '': $_POST['product_id'] ?>">
        <br><br>


        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" 
        value="<?php echo isFormValidated()? '': $_POST['product_name'] ?>">
        <br><br>


        <label for="category_id">Category ID:</label>
        <input type="text" name="category_id" id="category_id"
         value="<?php echo isFormValidated()? '': $_POST['category_id'] ?>">
        <br><br>


        <label for="price">Price:</label>
        <input type="text" name="price" id="price"
        value="<?php echo isFormValidated()? '': $_POST['price'] ?>">
        <br><br>


        <label for="size">Size:</label>
        <input type="text" name="size" id="size" 
        value="<?php echo isFormValidated()? '': $_POST['size'] ?>">
        <br><br>

        <label for="ingredients">Ingredients:</label>
        <input type="text" name="ingredients" id="ingredients"
         value="<?php echo isFormValidated()? '': $_POST['ingredients'] ?>">
        <br><br>

       
        <!-- Đổi 'image_path' thành 'image_url' -->
<label for="image_url">Image URL:</label>
<input type="text" name="image_url" id="image_url" value="<?php echo isFormValidated()? '': htmlspecialchars($_POST['image_url'] ?? '') ?>">


        <br><br>

        <input type="submit" name= "submit" value="Submit"><a>
    </form>
</body>
<?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
            <?php 
            $product = [];
            $product['product_id'] = $_POST['product_id'];
            $product['product_name'] = $_POST['product_name'];
            $product['category_id'] = $_POST['category_id'];
            $product['price'] = $_POST['price'];;
            $product['size'] = $_POST['size'];
            $product['ingredients'] = $_POST['ingredients'];
            $product['image_url'] = $_POST['image_url'];

            $result = insert_products($product); 
            $newproduct_id = mysqli_insert_id($db);
            ?>
            <h2>A new category has been created:</h2>
            <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
        <?php endif; ?>

    





<br><br>
    <a href="index products.php" class="btn btn-back mt-3">Back to Product List</a>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

<?php
db_disconnect($db);
?>
