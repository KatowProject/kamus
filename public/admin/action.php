<?php
define("BASEPATH", true);

if (isset($_SESSION['id'])):
    header('Location: ./');
endif;

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once "../../controllers/controllers.php";

$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if (!$id || !$action):
    echo "<script>history.back()</script>";
    exit;
endif;

$controller = new Controller();
switch ($action):
    case 'delete':
        $controller->delete_word($id);
        echo "<script>alert('Word deleted')</script>";
        break;
    case 'edit':
        $controller->update($id, $_POST);
        echo "<script>alert('Success update word'); history.back()</script>";
        break;
    default:
        echo "<script>history.back()</script>";
        exit;
endswitch;