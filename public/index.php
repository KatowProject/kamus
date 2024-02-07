<?php
define('BASEPATH', 'public');

require_once '../scraper.php';
require_once '../database/database.php';
require_once "../controllers/controllers.php";

$controller = new Controller();

try {
    $sentences = [];
    if (isset($_POST['submit'])) :
        $word = isset($_POST['word']) ? trim($_POST['word']) : '';
        $type = $_POST['type'];

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
        $sentence = null;
    endif;
} catch (Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <title>Translate • SATECH</title>
</head>

<body class="bg-light">
    <?php
    $page = 'kamus';
    require_once 'partials/header.php';
    ?>

    <main class="d-flex align-items-center" style="min-height: 75vh;">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6" style="float:none;margin:auto;">
                    <h2 class="text-center mb-3"><b>Kamus Sunda</b></h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="word" class="form-label">Word</label>
                            <input type="text" class="form-control" id="word" name="word" placeholder="Enter word" value="<?= $_POST['word'] ?? '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" aria-label="Default select example" name="type" id="type">
                                <option value="" selected>Open this select menu</option>
                                <option value="is">Sunda Sedang</option>
                                <option value="ish">Sunda Halus</option>
                                <option value="isk">Sunda Kasar</option>
                                <option value="sih">Indonesia</option>
                            </select>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">
                                <i class="fa fa-search"></i> Search
                            </button>

                            <!-- button help -->
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-question-circle"></i> Help
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($sentences != null) : ?>
                <div class="row py-5">
                    <div class="col-12 py-3">
                        <h2 class="text-center"><b>Result</b></h2>
                    </div>

                    <div class="col-12">
                        <div class="card mb-3" style="max-width: auto;">
                            <div class="card-header bg-secondary text-white">
                                <?= $_POST['type'] == "sih" ? "Sunda" : "Indonesia" ?>
                            </div>

                            <div class="card-body bg-white">
                                <p class="card-text">
                                    <?php
                                    echo $_POST['word'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mb-3" style="max-width: auto;">
                            <div class="card-header bg-secondary text-white">
                                <?= $_POST['type'] == "sih" ? "Indonesia" : "Sunda" ?>

                            </div>
                            <div class="card-body bg-white">
                                <p class="card-text">
                                    <?php foreach ($w as $key => $value)
                                        echo $value . " "; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Word</th>
                                    <th scope="col">Translation</th>
                                    <th scope="col">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sentences as $key => $value) : ?>
                                    <tr>
                                        <td>
                                            <?php

                                            echo $value['word'] ?? $value['name'] . " ";
                                            ?>
                                        </td>
                                        <td>
                                            <?php

                                            echo $value['translated'];

                                            ?>
                                        </td>
                                        <td>
                                            <?= $value['lang'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- fixed bottom footer -->
    <footer class="text-lg-start bg-light">
        <div class="text-center p-3">
            Copyright &copy; 2024 SA<span>TECH</span>
        </div>
    </footer>

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Help</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- about -->
                    <h5>About</h5>
                    <p>
                        Kamus Sunda adalah sebuah kamus yang berisi kata-kata dalam bahasa Sunda. Kamus ini dibuat untuk
                        memudahkan
                        pengguna dalam mencari arti kata dalam bahasa Sunda.
                    </p>

                    <!-- usage -->
                    <h5>Usage</h5>
                    <p>
                        Masukkan kata yang ingin dicari artinya, kemudian pilih tipe bahasa yang ingin dicari.
                        kemudian klik tombol submit untuk menampilkan hasil pencarian.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                var word = $('#word').val();
                var type = $('#type').val();
                if (word == '' || type == '') {
                    alert('Please fill all the fields');
                    return false;
                }
            });
        });
    </script>
</body>

</html>