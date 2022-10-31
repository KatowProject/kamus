<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if(!isset($_GET['opt'])) {
        echo "No option specified";
        exit;
    }

    $opt = $_GET['opt'];
    switch ($opt) {
        case "search":
            require_once '../api/search.php';
            break;

        default:
            echo "Invalid Path";
            break;
    }
?>