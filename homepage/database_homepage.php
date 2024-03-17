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

function search_products($keyword) {
  global $db;
  $keyword = mysqli_real_escape_string($db, $keyword);
  $sql = "SELECT * FROM Products WHERE product_name LIKE '%$keyword%'";
  $result = mysqli_query($db, $sql);
  // Chuyển đổi kết quả thành một mảng
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  return $products;
}

function delete_category($id) {
  global $db;

  $sql = "DELETE FROM Categories ";
  $sql .= "WHERE category_id='" . $id . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  return confirm_query_result($result);
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

function getAllCategories() {
  // Kết nối cơ sở dữ liệu
  $conn = mysqli_connect("localhost", "root", "", "ShrekJuices");
  
  // Truy vấn lấy tất cả categories
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($conn, $sql);
  
  // Mảng chứa tất cả categories
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  // Đóng kết nối cơ sở dữ liệu
  mysqli_close($conn);
  
  return $categories;
}
function getAllProducts() {
  global $db;
  $sql = "SELECT * FROM Products";
  $result = mysqli_query($db, $sql);
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  return $products;
}
function insert_customer($customer) {
  global $db; // Assuming you have a database connection

  $sql = "INSERT INTO customers ";
  $sql .= "(full_name, address, phone_number, gender) ";
  $sql .= "VALUES (";
  $sql .= "'" . $customer['full_name'] . "', ";
  $sql .= "'" . $customer['address'] . "', ";
  $sql .= "'" . $customer['phone_number'] . "', ";
  $sql .= "'" . $customer['gender'] . "'";
  $sql .= ")";

  $result = mysqli_query($db, $sql);
  if (!$result) {
      // Handle error
      echo "Error: " . mysqli_error($db);
  } else {
      echo "Customer inserted successfully!";
  }
}

?>