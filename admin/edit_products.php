<?php
require_once('database.php');
require_once ('functions.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if (empty($_POST['product_id'])){
        $errors[] = 'product id is required';
    }
    
    if (empty($_POST['product_name'])){
        $errors[] = 'Product Name is required';
    }


    if (empty($_POST['category_id'])){
        $errors[] = 'Category is required';
    }
    if (empty($_POST['price'])){
        
        $errors[] = 'Price is required';
    }
    if (empty($_POST['size'])){
        $errors[] = 'Size is required';
    }

    if (empty($_POST['ingredients'])){
        $errors[] = 'Ingredients is required';
    }
    if (empty($_POST['image_url'])){
        $errors[] = 'image is required';
    }
   
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        
        $product = [];
        $product['product_id'] = $_POST['product_id'];
        $product['product_name'] = $_POST['product_name'];
        $product['category_id'] = $_POST['category_id'];
        $product['price'] = $_POST['price'];
        $product['size'] = $_POST['size'];
        $product['ingredients'] = $_POST['ingredients'];
        $product['image_url'] = $_POST['image_url'];

        update_products($product); // Đảm bảo hàm update_product đã được định nghĩa trong functions.php
        redirect_to('index products.php'); // Đảm bảo bạn đã có trang index-products.php để quay lại
    }
} else { 
    if(!isset($_GET['id'])) {
        redirect_to('index products.php');
    }
    $product_id = $_GET['id'];
   
    $product = find_products_by_id($product_id); 
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
        <h1 class="text-center mb-4">Edit Product</h1>
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
        <input type="hidden" name="product_id" 
        value="<?php echo isset($product['product_id'])? $product['product_id']: (isset($_POST['product_id'])? $_POST['product_id'] : '') ?>">

        <label for="product_name">Product Name</label> <!--required-->
        <input type="text" name="product_name" id="product_name"  
        value="<?php echo isset($product['product_name'])? $product['product_name']: (isset($_POST['product_name'])? $_POST['product_name'] : '') ?>">

        <br><br>
        
        <label for="category_id">Category</label> <!--required-->
        <input type="text" id="category_id" name="category_id"  
        value="<?php echo isset($product['category_id'])? $product['category_id']: (isset($_POST['category_id'])? $_POST['category_id'] : '') ?>">

        <br><br>

        <label for="price">Price</label> <!--required-->
        <input type="text" id="price" name="price"  
        value="<?php echo isset($product['price'])? $product['price']: (isset($_POST['price'])? $_POST['price'] : '') ?>">

        <br><br>

        <label for="size">size</label> <!--required-->
        <input type="text" id="size" name="size"  
        value="<?php echo isset($product['size'])? $product['size']: (isset($_POST['size'])? $_POST['size'] : '') ?>">

        <br><br>

        <label for="ingredients">Ingredients</label> <!--required-->
        <input type="text" id="ingredients" name="ingredients"  
        value="<?php echo isset($product['ingredients'])? $product['ingredients']: (isset($_POST['ingredients'])? $_POST['ingredients'] : '') ?>">

        <br><br>

        <label for="image_url">Image Edit </label> <!--required-->
        <input type="text" id="image_url" name="image_url"  
        value="<?php echo isset($product['image_url'])? $product['image_url']: (isset($_POST['image_url'])? $_POST['image_url'] : '') ?>">

        <br><br>
        
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
    
    <br><br>
    <a href="index products.php">Back to index</a> 
</body>
</html>

<?php
db_disconnect($db);
?>

