<?php
require_once 'database_homepage.php'; // Đường dẫn tới file chứa function getAllCategories
$categories = getAllCategories();
$products = getAllProducts();
$keyword = '';
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $categories = search_categories($keyword);
    $products = search_products($keyword);
} else {
    $categories = getAllCategories();
    $products = getAllProducts();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="webside icon" type="png" href="/img/baner-icon/07D132B4-BB34-4BD8-8F26-5EC38035539E.png">
  <!-- font google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Css -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <!--link này dùng cho trang index.php-->
  <link rel="stylesheet" href="css/head-footer.css">
  <!--link này dùng chung cho header , footer-->
  <link rel="stylesheet" href="css/menu.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <title>Shrek Juice</title>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary navone">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Coolercleanse</a>
          </li>
          <li class="nav-item line">
            <a class="nav-link" href="#">Blend it yourself</a>
          </li>
        </ul>
      </div>
      <a class="navbar-brand" href="index.php"><img src="./img/Logo/Logo.png"
          alt=""></a>
          <form class="d-flex" role="search" action="menu.php" method="get">
    <input id="searchbar" onkeyup="search_animal()" name="search" class="form-control me-2" type="search" placeholder="Search juice generation" aria-label="Search" value="<?php echo htmlspecialchars($keyword); ?>">
    <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        <a href="shopping-cart.php" class="ping"><i class="fa-solid fa-cart-shopping"></i><span
            class="qtycart">0</span></a>
      </form>
    </div>
  </nav>
  <br>
  <br>
  <nav class="navbar navbar-expand-lg bg-secondary navtwo">
    <div class="container-fluid tog">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <a href="shopping-cart.php"><i class="fa-solid fa-cart-shopping show-mobile"></i></a>
      <div class="collapse navbar-collapse menu" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="menu.php" aria-current="page">menu</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  
  <!-- baner -->
  <div class="container-fluid">
    <img class="baner" src="./img/Fruit Juice/hinhanh.png" alt="">
  </div>
  <!-- end baner -->
<br>
<br>

  <div class="container select-menu-showmb">
    <select class="form-select mt-3" name="" id="">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['category_id']; ?>">
                <?php echo $category['category_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<ul class="nav justify-content-center listPage">
    <?php foreach($categories as $category): ?>
        <li class="nav-item">
            <!-- Update the link to point to category.php with the correct category ID -->
            <a class="nav-link" href="category.php?id=<?php echo $category['category_id']; ?>">
                <span class="img-oring"><img src="<?php echo $category['image']; ?>" alt=""></span>
                <span class="text"><?php echo $category['category_name']; ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>




  <!-- end section -->

  <!--product list -->
  <div class="container">
  <div class="list">
    <?php foreach ($products as $product): ?>
      <div class="item" type="button" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $product['product_id']; ?>">
        <div class="img">
          <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['product_name']; ?>">
        </div>
        <div class="name-drink">
          <h3><?php echo $product['product_name']; ?></h3>
        </div>
      </div>

      <!-- Product Modal -->
      <div class="modal fade" id="productModal<?php echo $product['product_id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $product['product_name']; ?></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <img src="<?php echo $product['image_url']; ?>" class="img-fluid" alt="<?php echo $product['product_name']; ?>">
              <p>Price: <?php echo $product['price']; ?></p>
              <p>Size: <?php echo $product['size']; ?></p>
              <p>Ingredients: <?php echo $product['ingredients']; ?></p>
              <!-- Add the rest of your product details here -->
              <div class="product-count">
                <label for="size">Quantity:</label>
                <form action="#" class="display-flex">
                  <div class="qtyminus">-</div>
                  <input type="text" name="quantity" value="1" class="qty">
                  <div class="qtyplus">+</div>
                </form>
                <a href="#" class="round-black-btn">Add to Cart</a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

     

  <!-- end product list -->



  <!-- footer -->
  <div class="container-fluid footer">
    <div class="container mt-3">
      <div class="row">
        <div class="col-sm-4 p-3 logo ">
          <a href="index.php">
            <img src="./img/Logo/Logo.png" alt="">
          </a>
        </div>
        <div class="col-sm-8 p-3 link-info">
          <ul class="nav justify-content-center">
            <li class="nav-item Rewards">
              <a class="nav-link " href="#">Rewards</a>
            </li>
            
            <li class="nav-item faq">
              <a class="nav-link" href="faq.php">faq</a>
            </li>
            <li class="nav-item contact">
              <a class="nav-link " href="contact.php">contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-3 green-footer">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col p-3 ">2024 Juice Generation, All Rights Reserved</div>
          <div class="col p-3 ">
            <label for="">NEWSLETTER :</label>
            <input class="mail" type="email" placeholder="Enter your email address ">
          </div>
          <div class="col p-3 ">
            <ul class="nav">
              <li class="nav-item first">
                <a href="">Privacy Policy</a>
              </li>
              <li class="nav-item ">
                <a href="">Terms of Use</a>
              </li>
              <li class="nav-item ">
                <a href="">Accessibility</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/menu.js"></script>
  <script src="js/script.js"></script>
</body>

</html>