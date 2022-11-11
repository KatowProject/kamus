<?php
    define('BASEPATH', 'public');
    
    require "../controllers/controllers.php";
    $controller = new Controller();

    $word = $_GET['word'];
    $type = $_GET['type'];

    $result = $controller->get_word($word, $type);

    if ($result):
        echo json_encode($result);
    else:
        echo "Word not found";
    endif;