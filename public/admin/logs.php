<?php
define('BASEPATH', true);

if (isset($_SESSION['id'])) {
    header('Location: ./');
}

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once "../../controllers/controllers.php";

$controller = new Controller();
$logs = $controller->getLogs();
?>
<!doctype html>
<html lang="en">

<head>
    <title>
        Audit Log | SATECH Page Admin
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        .form-control {
            border: 1px solid #ced4da;
        }
    </style>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <?php $page = "logs";
        include 'partials/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                        Audit Log
                        <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            class="btn btn-primary float-end add"><i class="fa fa-plus"></i> Add
                            Word</button>
                    </h2>
                </div>
                <hr style="border: 2px solid black;">
                <div class="col-lg-12">
                    <!-- responsive table -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Log Message</th>
                                <th scope="col">Log Date</th>
                                <th scope="col">Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($logs as $log):
                            ?>
                            <tr>
                                <th scope="row">
                                    <?= $no++ ?>
                                </th>
                                <td>
                                    <?= $log['message'] ?>
                                </td>
                                <td>
                                    <?= $log['audit_date'] ?>
                                </td>
                                <td>
                                    <?= $log['name'] ?>
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