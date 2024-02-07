<?php
define('BASEPATH', true);

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once '../../controllers/controllers.php';

$controller = new Controller();

if (isset($_GET['word']) && isset($_GET['type'])) :
    $word = $_GET['word'];
    $type = $_GET['type'];

    if (!array_key_exists($type, $controller->type)) :
        // set status code
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Type not found'
        ]);
        exit;
    endif;

    $sentences = [];
    $word = $word ? trim($_GET['word']) : '';

    // check is js script or HTML
    if (preg_match('/<script>/', $word) || preg_match('/<html>/', $word)) :
        // set status code
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Bad request'
        ]);

        exit;
    endif;

    $words = $controller::splitRemoveSpecialChars($word);
    foreach ($words as $key => $word) :
        $get_word = $controller->get_word($word, $type);
        $w[] = $get_word['translated'];

        if (in_array($get_word, $sentences)) :
            continue;
        else :
            $sentences[] = $get_word;
        endif;
    endforeach;

    echo json_encode([
        'status' => 'success',
        'data' => [
            'sentences' => $sentences
        ]
    ]);
else :
    // set status code
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'Bad request'
    ]);

    exit;
endif;
