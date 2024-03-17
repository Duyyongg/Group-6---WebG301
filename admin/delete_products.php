<?php
require_once('database.php');
require_once('functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
  
    delete_products($_POST['product_id']);
    redirect_to('index products.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('index products.php');
    }
    $id = $_GET['id'];
    $product= find_products_by_id($id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
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
    <div class="container">
     <h1>Delete Product</h1>
    <h2>Are you sure you want to delete this product?</h2>
    <p><span class="label">ID: </span><?php echo $product['product_id']; ?></p>
    <p><span class="label">name: </span><?php echo $product['product_name']; ?></p>
    <p><span class="label">category: </span><?php echo $product['category_id']; ?></p>
    <p><span class="label">price: </span><?php echo $product['price']; ?></p>
    <p><span class="label">size: </span><?php echo $product['size']; ?></p>
    <p><span class="label">ingredients: </span><?php echo $product['ingredients']; ?></p>
    <p><span class="label">image_url: </span><?php echo $product['image_url']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" >
     
        <input type="submit" name="submit" value="Delete product">
     
    </form>
    
    <br><br>
    <a href="index products.php">Back to Products</a> 
</body>
</html>


<?php
db_disconnect($db);
?>
