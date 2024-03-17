<?php
require_once('database.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_unset();

session_destroy();

redirect_to('index.php');
exit;
?>
