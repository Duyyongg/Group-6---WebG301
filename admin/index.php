<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shrek-Juices</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold; 
            color: #28a745 !important; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Juice Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                <?php
    
                if (isset($_SESSION['admin_username'])) {
                    echo '<li class="nav-item"><span class="navbar-text">Welcome, ' . htmlspecialchars($_SESSION['admin_username']) . '</span></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="logoutadmin.php">Logout</a></li>';
                 } else {
                     echo '<li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin Login</a></li>';
    }
    ?>
                </ul>
                
            </div>
        </nav>
    </header>

    <main role="main" class="container">
        <div class="jumbotron text-center">
            <h1>Shrek-Juices</h1>
            <p>Discover the taste of nature with our fresh and organic juices!</p>
        </div>
        <div class="text-center">
            <img src="https://nvhphunu.vn/wp-content/uploads/2023/07/PTU1.jpg" alt="Assorted Juices" class="img-fluid">
        </div>
    </main>
<br>
<br>
<br>
<br>
    <footer class="footer bg-primary text-white text-center py-3">
        © 2024 Shrek-Juices. All Rights Reserved.
    </footer>
</body>
</html>
