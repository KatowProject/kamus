<?php
    define('BASEPATH', 'public');
    require "../controllers/controllers.php";
    $controller = new Controller();
    
    try {
        $sentence = [];
        if (isset($_POST['submit'])):
            $word = $_POST['word'];
            $type = $_POST['type'];
        
            $words = $controller::splitRemoveSpecialChars($word);
            foreach ($words as $key => $word) {
                $sentence[] = $controller->get_word($word, $type);
            }
        else :
            $sentence = null;
        endif;
    } catch (Exception $e) {
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
        <title>Home</title>
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
                                <a class="nav-link" aria-current="page" href="#">about us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">kamus</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="#">terjemah</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container py-3">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">Kamus Sunda</h2>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="word" class="form-label">Word</label>
                                <input type="text" class="form-control" id="word" name="word" placeholder="Enter word" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-select" aria-label="Default select example" name="type" id="type">
                                    <option value="" selected>Open this select menu</option>
                                    <option value="is">Sunda Sedang</option>
                                    <option value="ish">Sunda Halus</option>
                                    <option value="isk">Sunda Kasar</option>    
                                </select>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php if ($sentence != null): ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center">Result</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Word</th>
                                    <th scope="col">Translation</th>
                                    <th scope="col">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sentence as $key => $value): ?>
                                    <tr>
                                        <td><?= $value['name'] ?? $value['word']?></td>
                                        <td><?= $value['translated'] ?></td>
                                        <td><?= $value['lang'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>   

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