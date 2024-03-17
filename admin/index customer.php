<?php
require_once('database.php'); 
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['full_name'])){
        $errors[] = 'customer is required';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create customer</title>
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
        <h1 class="text-center mb-4">Create customer</h1>
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
        <h2>Customer Information</h2>
    <form action="index customer.php" method="POST">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name"><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>

        <label for="phone_number">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
            <?php 
            $customer = [];
            $customer['full_name'] = $_POST['full_name'];
            $customer['address'] = $_POST['adress'];
            $customer['phone_number'] = $_POST['phone_number'];
            $customer['gender'] = $_POST['gender'];
            $result = insert_customers($category); // Đảm bảo bạn đã định nghĩa hàm này
            $newcategory_id = mysqli_insert_id($db);
            ?>
            <h2>A new category has been created:</h2>
        <?php endif; ?>
</body>
</html>
<?php
db_disconnect($db); // Đảm bảo bạn đã định nghĩa hàm này
?>
