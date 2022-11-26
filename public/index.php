<?php
define('BASEPATH', 'public');

require_once '../scraper.php';
require_once '../database/database.php';
require_once "../controllers/controllers.php";

$controller = new Controller();

try {
    $sentences = [];
    if (isset($_POST['submit'])):
        $word = isset($_POST['word']) ? trim($_POST['word']) : '';
        $type = $_POST['type'];

        $words = $controller::splitRemoveSpecialChars($word);
        foreach ($words as $key => $word):
            $get_word = $controller->get_word($word, $type);
            $w[] = $get_word['translated'];

            if (in_array($get_word, $sentences)):
                continue;
            else:
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
    <link href="assets/css/main.css" rel="stylesheet">
    <title>Translate • SATECH</title>
</head>

<body class="bg-light">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">SA<span>TECH</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/about">about</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">kamus</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">Translate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="d-flex align-items-center" style="min-height: 75vh;">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6" style="float:none;margin:auto;">
                    <h2 class="text-center mb-3"><b>Kamus Sunda</b></h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="word" class="form-label">Word</label>
                            <input type="text" class="form-control" id="word" name="word" placeholder="Enter word"
                                value="<?= $_POST['word'] ?? '' ?>" required>
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
                            <button type="submit" class="btn btn-primary" name="submit" id="submit"
                                value="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($sentences != null): ?>
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
                            <?php foreach ($sentences as $key => $value): ?>
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
            Copyright &copy; 2022 - IF21B SA<span>TECH</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#submit').click(function () {
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