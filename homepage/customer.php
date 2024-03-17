<?php
require_once('database_homepage.php'); 
$errors = [];
function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['user_id'])){
        $errors[] = 'id is required';
    }
   
    if (empty($_POST['full_name'])){
        $errors[] = 'name is required';
    }
    
    if (empty($_POST['address'])){
        $errors[] = 'customer is required';
   }

     if (empty($_POST['phone_number'])){
        $errors[] = 'phone is required';
    }

   
    if (empty($_POST['gender'])){
            $errors[] = 'gender is required';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
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
        <h1 class="text-center mb-4">Create Customer</h1>
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
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
       
       <label for="user_id">User ID:</label>
           <input type="text" name="user_id" id="user_id" min=1
           value="<?php echo isFormValidated()? '': $_POST['user_id'] ?>">
           <br><br>
   
   
           <label for="full_name">full Name:</label>
           <input type="text" name="full_name" id="full_name" 
           value="<?php echo isFormValidated()? '': $_POST['full_name'] ?>">
           <br><br>
   
   
           <label for="address">Address:</label>
           <input type="text" name="address" id="address"
            value="<?php echo isFormValidated()? '': $_POST['address'] ?>">
           <br><br>
   
   
           <label for="phone_number">Phone:</label>
           <input type="text" name="phone_number" id="phone_number"
           value="<?php echo isFormValidated()? '': $_POST['phone_number'] ?>">
           <br><br>
   
   
           <label for="gender">Gender:</label>
           <input type="text" name="gender" id="gender" 
           value="<?php echo isFormValidated()? '': $_POST['gender'] ?>">
           <br><br>
   
           <input type="submit" name= "submit" value="Submit"><a>
    </form>
</body>
<?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
    <?php
    $customer = []; // Initialize the $customer array

    // Assign values from the POST array to the $customer array
    $customer['full_name'] = $_POST['full_name'];
    $customer['address'] = $_POST['address'];
    $customer['phone_number'] = $_POST['phone_number'];
    $customer['gender'] = $_POST['gender'];

    // Assuming you have a function named insert_customer() to insert customer data into the database
    insert_customer($customer);

    // Display success message or redirect
    echo "Form submitted successfully!";
    ?>
     <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
<?php endif; ?>
<br><br>
    <a href="index.php" class="btn btn-back mt-3">Back to main page</a>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

<?php
db_disconnect($db);
?>



           
