<?php
require_once 'database_homepage.php'; // Đảm bảo rằng bạn đã thay đổi tên file này nếu cần thiết

if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];
    $category = getCategoryById($categoryId); // Giả định bạn có hàm này để lấy thông tin của một category
    $products = getProductsByCategoryId($categoryId); // Giả định bạn có hàm này để lấy tất cả sản phẩm theo categoryId
} else {
    // Chuyển hướng người dùng nếu không có ID loại sản phẩm nào được cung cấp
    header('Location: menu.php');
    exit;
}
function getCategoryById($category_id) {
    global $db; // Sử dụng biến kết nối cơ sở dữ liệu toàn cục
    // Truy vấn cơ sở dữ liệu để lấy thông tin loại sản phẩm
    $sql = "SELECT * FROM Categories WHERE category_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc(); // Trả về loại sản phẩm
}

function getProductsByCategoryId($category_id) {
    global $db; // Sử dụng biến kết nối cơ sở dữ liệu toàn cục
    // Truy vấn cơ sở dữ liệu để lấy sản phẩm thuộc loại sản phẩm
    $sql = "SELECT * FROM Products WHERE category_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row; // Thêm sản phẩm vào mảng
    }
    return $products; // Trả về mảng các sản phẩm
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

  <title><?php echo htmlspecialchars($category['category_name']); ?> | Shrek Juice</title>

  <style>
        /* Thêm CSS tùy chỉnh ở đây */
        .product {
            margin-bottom: 30px;
        }
        .product img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .product h3 {
            margin-top: 15px;
            margin-bottom: 5px;
        }
        .product p {
            margin-bottom: 5px;
        }
        /* Sử dụng media queries để tạo responsive layout */
        @media (min-width: 768px) {
            .product {
                /* Chỉnh sửa lại cho phù hợp nếu cần */
                max-width: 220px;
            }
        }
    </style>
</head>

<body>
<div class="container mt-4">
        <h2 class="text-center mb-4"><?php echo htmlspecialchars($category['category_name']); ?></h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
                    <div class="product card">
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h3>
                            <p class="card-text">Price: <?php echo htmlspecialchars($product['price']); ?></p>
                            <!-- Thêm chi tiết sản phẩm khác ở đây nếu cần -->
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