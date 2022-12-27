<?php
define('BASEPATH', true);

if (isset($_SESSION['id'])) {
    header('Location: ./');
}

require_once '../scraper.php';
require_once '../database/database.php';
require_once "../controllers/controllers.php";

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
    <?php
    switch ($type):
        case 1:
            $title = "Indonesia";
            break;
        case 2:
            $title = "Sunda Umum";
            break;
        case 3:
            $title = "Sunda Halus";
            break;
        case 4:
            $title = "Sunda Kasar";
            break;
    endswitch;
    ?>
    <title>
        <?= $title ?> | SATECH Page Admin
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .form-control {
            border: 1px solid #ced4da;
        }
    </style>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <?php $page = "translate-{$type}";
        include 'partials/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2>
                        <?= $title ?>
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
                                    <button data-id="<?= $word['id'] ?>" class="btn btn-primary edit"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                            class="fa fa-edit"></i>Edit</button>
                                    <button data-id="<?= $word['id'] ?>" class="btn btn-danger delete"
                                        onclick="confirm('Apakah kamu yakin?')"> <i class="fa fa-trash"></i>
                                        Delete</button>
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
    <script src="../assets/js/main.js"></script>

    <script>
        $(".edit").on("click", async function () {
            $(".modal-title").html("Edit Word");
            $(".modal-body").html("Loading...");
            $(".modal-footer").html("");

            var id = $(this).data("id");
            const response = await $.ajax({
                url: "../api/action.php",
                type: "GET",
                data: {
                    id: id,
                    type: "get"
                },
                headers: {
                    "Content-Type": "application/json"
                },
            });

            const data = response.data;
            $(".modal-body").html(`
                <form method="POST" id="edit-form">
                    <input type="hidden" name="id" value="${data.id}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Indonesia</label>
                        <input type="text" class="form-control" id="name" name="name" value="${data.name}">
                    </div>
                    <div class="mb-3">
                        <label for="translated" class="form-label">Sunda</label>
                        <input type="text" class="form-control" id="translated" name="translated" value="${data.translated}">
                    </div>
                    <div class="mb-3">
                        <label for="lang" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="lang" id="lang" disabled>
                            <option value="1" ${data.type_id == 1 ? "selected" : ""}>Indonesia</option>
                            <option value="2" ${data.type_id == 2 ? "selected" : ""}>Sunda Sedang</option>
                            <option value="3" ${data.type_id == 3 ? "selected" : ""}>Sunda Halus</option>
                            <option value="4" ${data.type_id == 4 ? "selected" : ""}>Sunda Kasar</option>
                        </select>
                    </div>
                </form>
            `);

            $(".modal-footer").html(`
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save" data-id="${data.id}">Save changes</button>
            `);

            $(".save").on("click", async function () {
                const form = new FormData($("#edit-form")[0]);
                const response = await $.ajax({
                    url: "../api/action.php?type=edit&id=" + id,
                    type: "POST",
                    data: form,
                    processData: false,
                    contentType: false,
                });

                if (response.status == "success") {
                    alert("Berhasil diubah");
                    location.reload();
                } else {
                    alert("Gagal diubah");
                }
            });
        });

        $(".delete").on("click", async function () {
            var id = $(this).data("id");
            const response = await $.ajax({
                url: "../api/action.php?type=delete&id=" + id,
                type: "DELETE",
                headers: {
                    "Content-Type": "application/json"
                },
            });

            if (response.status == "success") {
                alert("Berhasil dihapus");
                location.reload();
            } else {
                alert("Gagal dihapus");
            }
        });

        $(".add").on("click", async function () {
            $(".modal-title").html("Add Word");
            $(".modal-body").html("Loading...");
            $(".modal-footer").html("");

            $(".modal-body").html(`
                <form method="POST" id="add-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Indonesia</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="translated" class="form-label">Sunda</label>
                        <input type="text" class="form-control" id="translated" name="translated">
                    </div>
                    <div class="mb-3">
                        <label for="lang" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                            <option value="1">Indonesia</option>
                            <option value="2">Sunda Sedang</option>
                            <option value="3">Sunda Halus</option>
                            <option value="4">Sunda Kasar</option>
                        </select>
                    </div>
                </form>
            `);

            $(".modal-footer").html(`
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save">Save changes</button>
            `);

            $(".save").on("click", async function () {
                const form = new FormData($("#add-form")[0]);
                const response = await $.ajax({
                    url: "../api/action.php?type=add&id=dummy",
                    type: "POST",
                    data: form,
                    processData: false,
                    contentType: false,
                });

                if (response.status == "success") {
                    alert("Berhasil ditambahkan");
                    location.reload();
                } else {
                    alert("Gagal ditambahkan");
                }
            });
        });
    </script>
</body>

</html>