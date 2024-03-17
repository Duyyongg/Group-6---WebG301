<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ShrekJuices");

function db_connect() {
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect($connection);
  return $connection;
}
$db = db_connect();

function confirm_db_connect($connection) { 
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
}

function find_admin_by_id($connection, $id) {
  $sql = "SELECT * FROM admins WHERE AdminID = ? LIMIT 1"; 
  $stmt = mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $admin = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_stmt_close($stmt);
  return $admin;
}
function update_admin_info($connection, $id, $username, $email, $hashed_password) {
  $sql = "UPDATE Admins SET Username=?, Email=?, Hash_password=? WHERE AdminID=? LIMIT 1";
  $stmt = mysqli_prepare($connection, $sql);
  mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashed_password, $id);
  $result = mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  return $result;
}


function find_all_admins() {
  global $db; 
  $sql = "SELECT * FROM Admins ORDER BY Username"; 
  $result = mysqli_query($db, $sql);
  confirm_query_result($result); 
  return $result;
}

function confirm_query_result($result) {
  global $db; 
  if (!$result) {
      $msg = "Query failed: ";
      $msg .= mysqli_error($db);
      exit($msg);
  }
  return $result; 
}
function find_admin_by_username($username) {
  global $db;
  $sql = "SELECT * FROM Admins WHERE Username = ? LIMIT 1";
  $stmt = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if ($admin = mysqli_fetch_assoc($result)) {
      return $admin;
  } else {
      return false;
  }
}

function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function insert_products($product) {
  global $db;

  $sql = "INSERT INTO Products "; 
  $sql .= "(product_id, product_name, category_id, price, size, ingredients, image_url) ";    
  $sql .= "VALUES (";
  $sql .= "'" . $product['product_id'] . "', "; // Thêm dấu phẩy và khoảng trắng
  $sql .= "'" . $product['product_name'] . "', ";
  $sql .= "'" . $product['category_id'] . "', ";
  $sql .= "'" . $product['price'] . "', ";
  $sql .= "'" . $product['size'] . "', "; // Thêm dấu phẩy và khoảng trắng
  $sql .= "'" . $product['ingredients'] . "', ";
  $sql .= "'" . $product['image_url'] . "'";
  $sql .= ")"; // Đóng dấu ngoặc đơn

  $result = mysqli_query($db, $sql);
  if ($result) {
      return true;
  } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit; //terminate php
  }
}

function find_products($product) {
  global $db;

  foreach ($product as $product) {
      // Sử dụng câu lệnh SQL SELECT để tìm kiếm thông tin sản phẩm
      $sql = "SELECT * FROM Products WHERE product_name LIKE '%" . $product['search_keyword'] . "%'";

      // Thực thi truy vấn
      $result = $db->query($sql);

      if ($result->num_rows > 0) {
          // Hiển thị dữ liệu cho mỗi sản phẩm được tìm thấy
          while($row = $result->fetch_assoc()) {
              echo "Product Name: " . $row["product_name"]. " - Category ID: " . $row["category_id"]. " - Price: " . $row["price"]. "<br>";
          }
      } else {
          echo "No products found";
      }
  }
}

function update_products($product) {
  global $db;
  $sql = "UPDATE Products SET ";
 
  $sql .= "product_name='" . $product['product_name'] . "', ";
  $sql .= "category_id='" . $product['category_id'] . "', ";
  $sql .= "price='" . $product['price'] . "', ";
  $sql .= "size='" . $product['size'] . "', ";
  $sql .= "ingredients='" . $product['ingredients'] . "', ";
  $sql .= "image_url='" . $product['image_url'] . "' ";
  $sql .= "WHERE product_id='" . $product['product_id'] . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);  
}

function find_category_by_id($category_id) {
  global $db;

  $sql = "SELECT * FROM Categories WHERE category_id = ?";
  $stmt = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($stmt, "i", $category_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if($category = mysqli_fetch_assoc($result)) {
      return $category;
  } else {
      return null; // Không tìm thấy danh mục với ID đã cho
  }
}

function find_all_products() {
  global $db;
  $sql = "SELECT * FROM Products ";
  $sql .= "ORDER BY product_id"; 
  $result = mysqli_query($db, $sql); 
  return confirm_query_result($result); 
}
function find_products_by_id($product_id) {
  global $db;

  $sql = "SELECT * FROM Products ";
  $sql .= "WHERE product_id='" . $product_id . "'";
  $result = mysqli_query($db, $sql);
  confirm_query_result($result);
  $product = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $product;
}
function delete_products($product_id) {
  global $db;

  
  $sql = "DELETE FROM Products ";
  $sql.= " WHERE product_id = '" . $product_id . "' ";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
  
}



function hash_password($password) {
  return password_hash($password, PASSWORD_DEFAULT);
}

function fint_all_categories() {
  global $db;

  $sql = "SELECT * FROM Categories ";
  $sql .= "ORDER BY category_name";
  $result = mysqli_query($db, $sql); 
  return confirm_query_result($result); 
}

function find_categories_by_id($id) {
  global $db;

  $sql = "SELECT * FROM Categories ";
  $sql .= "WHERE category_id='" . $id . "'";
  $result = mysqli_query($db, $sql);
  confirm_query_result($result);
  $category = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $category;
}

function update_category($category) {
  global $db;

  $sql = "UPDATE Categories SET ";
  $sql .= "category_name='" . $category['category_name'] . "', ";
  $sql .= "image='" . $category['image'] . "' "; // Thêm cột image vào câu lệnh SQL
  $sql .= "WHERE category_id='" . $category['category_id'] . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}
function delete_category($id) {
  global $db;

  // Sử dụng prepared statement để thực hiện xóa an toàn hơn
  $sql = "DELETE FROM Categories WHERE category_id = ? LIMIT 1";
  $stmt = mysqli_prepare($db, $sql);

  // Thay thế '?' bằng giá trị thực tế của biến $id
  mysqli_stmt_bind_param($stmt, 'i', $id);

  // Thực hiện truy vấn
  $result = mysqli_stmt_execute($stmt);

  // Kiểm tra xem truy vấn có thành công không
  if($result) {
      mysqli_stmt_close($stmt);
      return true;
  } else {
      // Hiển thị lỗi nếu có và không đóng statement
      // để có thể lấy thông tin lỗi sau đó
      echo mysqli_error($db);
      return false;
  }
}


function search_categories($keyword) {
  global $db;
  $keyword = mysqli_real_escape_string($db, $keyword);
  $sql = "SELECT * FROM Categories WHERE category_name LIKE '%$keyword%'";
  $result = mysqli_query($db, $sql);
  return $result;
}
function insert_categories($category) {
  global $db;

  $sql = "INSERT INTO Categories ";
  $sql .= "(category_name, image) "; 
  $sql .= "VALUES (";
  $sql .= "'" . $category['category_name'] . "',";
  $sql .= "'" . $category['image'] . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}
function insert_customers($customer) {
  global $db;
  $sql= "INSERT INTO customers";
  $sql.= " (full_name,address,phone_number,gender)";
  $sql.= " VALUES (";
  $sql .= "'" . $customer['full_name'] . "', ";
  $sql .= "'" . $customer['address'] . "', ";
  $sql .= "'" . $customer['phone_number'] . "', ";
  $sql .= "'" . $customer['gender'] . "', ";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
}

function getAllCategories() {
  // Kết nối cơ sở dữ liệu
  $conn = mysqli_connect("hostname", "username", "password", "databaseName");
  
  // Truy vấn lấy tất cả categories
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($conn, $sql);
  
  // Mảng chứa tất cả categories
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  // Đóng kết nối cơ sở dữ liệu
  mysqli_close($conn);
  
  return $categories;
}

?>