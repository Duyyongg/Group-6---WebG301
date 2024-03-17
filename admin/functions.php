<?php
if (!function_exists('redirect_to')) {
    function redirect_to($location){
        header("Location: " . $location);
        exit;
    }
}

?>