<?php
    define('BASEPATH', __FILE__);
    require_once 'controllers.php';
    $controllers = new Controller();

    $output = $controllers->get_data_with_scraping("kamu lagi makan", "is");

    echo $output;
?>