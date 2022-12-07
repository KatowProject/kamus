<?php
define("BASEPATH", true);

session_start();

if (!isset($_SESSION['id'])):
    header('Location: /admin/login');
endif;

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once "../../controllers/controllers.php";

$id = $_GET['id'] ?? null;
$action = $_GET['type'] ?? null;

header('Content-Type: application/json');
if (!$id || !$action):
    echo json_encode([
        'status' => false,
        'message' => 'Invalid request'
    ]);
    exit;
endif;

$controller = new Controller();
switch ($action):
    case 'delete':
        $controller->delete_word($id);
        echo json_encode([
            'status' => 'success',
            'message' => 'Word has been deleted'
        ]);

        $controller->insertLog([
            'message' => 'Deleted word with id: ' . $id,
            'author_id' => $_SESSION['id'] ?? 2
        ]);
        break;
    case 'edit':
        $data = $controller->update_word($id, $_POST);
        if ($data):
            echo json_encode([
                'status' => 'success',
                'message' => 'Word has been updated'
            ]);

            $controller->insertLog([
                'message' => 'Updated word: ' . $_POST['name'] . ' with id: ' . $id,
                'author_id' => $_SESSION['id'] ?? 2
            ]);
        else:
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update word: Invalid request'
            ]);
        endif;
        break;

    case 'get':
        $data = $controller->get_word_by_id($id);
        if ($data):
            echo json_encode([
                'status' => 'success',
                'data' => $data
            ]);
        else:
            http_response_code(404);
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        endif;
        break;

    case 'add':
        $data = $controller->add_word($_POST);
        if ($data):
            echo json_encode([
                'status' => 'success',
                'message' => 'Word has been added'
            ]);

            $controller->insertLog([
                'message' => 'Added new word: ' . $data['word'] . ' with id: ' . $data['id'],
                'author_id' => $_SESSION['id'] ?? 2
            ]);
        else:
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to add word: Invalid request'
            ]);
        endif;
        break;
    default:
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid request'
        ]);
        exit;
endswitch;