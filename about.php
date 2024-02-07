<?php define('BASEPATH', 'public'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/main.css" rel="stylesheet">
    <title>About • SATECH</title>
</head>

<body class="bg-light">
    <?php
    $page = 'about';
    require_once 'partials/header.php';
    ?>

    <main>
        <div class="row vertical-center" style="min-height: 75vh;">
            <div class="col-lg-6">
                <div class="h-100 p-5">
                    <h1><b>Translator Bahasa Indonesia ke Bahasa Sunda</b></h1>
                    <p style="font-size: 1.0rem;">
                        <!-- buatkan deskripsi tentang translate ini -->
                        Selamat datang di Translator Bahasa Indonesia ke Bahasa Sunda kami. Alat ini dirancang untuk membantu Anda menerjemahkan kata, frasa, dan kalimat dari Bahasa Indonesia ke Bahasa Sunda dengan mudah dan cepat.
                        <br>
                        Kami berusaha untuk memberikan terjemahan yang akurat dan relevan untuk memudahkan komunikasi dan pembelajaran Anda. Selamat mencoba!
                    </p>

                    <!-- button terjemah sekarang-->
                    <br>
                    <a href="./" class="btn btn-primary">Terjemahkan Sekarang</a>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="px-4 py-5">
                    <img src="assets/img/thumb.png" width="100%" class="img-fluid text-center" loading="layz" alt="Responsive image">
                </div>
            </div>
        </div>

    </main>

    <!-- fixed bottom footer -->
    <footer class="text-lg-start">
        <div class="text-center p-3">
            Copyright &copy; 2023 SA<span>TECH</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>