<?php
require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Products</h1>
        <a href="newproducts.php" class="btn btn-primary">Create Product</a>
        <table class="table table-bordered mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category ID</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Ingredients</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $product_set = find_all_products(); // Đảm bảo rằng hàm này lấy tất cả sản phẩm từ DB
                while ($product = mysqli_fetch_assoc($product_set)): ?>
                    <tr>
                        <td><?php echo $product['product_id']; ?></td>
                        <td><?php echo $product['product_name']; ?></td>
                        <td><?php echo $product['category_id']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['size']; ?></td>
                        <td><?php echo $product['ingredients']; ?></td>
                        <td><img src="<?php echo $product['image_url']; ?>" class="img-thumbnail" alt="Product Image"></td>
                        <td><a href="<?php echo 'edit_products.php?id='.$product['product_id']; ?>">Edit</a></td>
                        <td><a href="<?php echo 'delete_products.php?id='.$product['product_id']; ?>">Delete</a></td>
                    </tr>
                <?php endwhile; 
                mysqli_free_result($product_set);
                ?>
            </tbody>
        </table>
        <a href="adminaccount.php" class="btn btn-back mr-2">Back to Admin Account</a> 
    </div>
</body>
</html>
<?php
db_disconnect($db); // Đảm bảo bạn có hàm này để ngắt kết nối DB khi xong
?>
