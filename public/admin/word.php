<?php
define('BASEPATH', true);

if (isset($_SESSION['id'])) {
    header('Location: ./');
}

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once "../../controllers/controllers.php";

$controller = new Controller();
if (isset($_GET['type'])):
    switch ($_GET['type']):
        case 'is':
            $type = 2;
            break;
        case 'ish':
            $type = 3;
            break;
        case 'isk':
            $type = 4;
            break;
        case 'sih':
            $type = 1;
            break;
        default:
            $type = 2;
            break;
    endswitch;
    $words = $controller->get_wordlist_with_type($type);
else:
    echo "<script>history.back()</script>";
endif;
?>
<!doctype html>
<html lang="en">

<head>
    <title>Sunda Sedang | SATECH Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <?php include 'partials/sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Dashboard
                        <a href="add.php" class="btn btn-primary float-end"><i class="fa fa-plus"></i> Add Word</a>
                    </h2>
                </div>
                <hr style="border: 2px solid black;">
                <div class="col-lg-12">
                    <!-- responsive table -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Indonesia</th>
                                <th scope="col">Sunda</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($words as $word):
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $no++ ?>
                                </th>
                                <td>
                                    <?= $word['name'] ?>
                                </td>
                                <td>
                                    <?= $word['translated'] ?>
                                </td>
                                <td>
                                    <?= $word['lang'] ?>
                                </td>

                                <td>
                                    <button data-id="<?= $word['id'] ?>" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Edit</button>
                                    <a href="action.php?id=<?= $word['id'] ?>&action=delete" class="btn btn-danger"
                                        onclick="confirm('Apakah kamu yakin?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>