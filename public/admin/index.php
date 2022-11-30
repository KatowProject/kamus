<?php
define('BASEPATH', true);

session_start();
if (!isset($_SESSION['id'])) {
  header('Location: login');
}

require_once '../../scraper.php';
require_once '../../database/database.php';
require_once "../../controllers/controllers.php";

$controller = new Controller();
$count = $controller->get_count_words();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Dashboard | SATECH Page Admin</title>
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
        <h2>Dashboard</h2>
        <hr style="border: 2px solid black;">
        <div class="col-lg-6">
          <h3>Sundanese Words</h3>
          <ol class="list-group list-group-numbered" style="border-bottom: 1px;">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Sunda Umum</div>
              </div>
              <span class="badge bg-primary rounded-pill">
                <?= $count['is'] ?> Words
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Sunda Halus</div>
              </div>
              <span class="badge bg-primary rounded-pill">
                <?= $count['ish'] ?> Words
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Sunda Kasar</div>
              </div>
              <span class="badge bg-primary rounded-pill">
                <?= $count['isk'] ?> Words
              </span>
            </li>
          </ol>
        </div>

        <div class="col-12">
          <img src="/assets/img/thumb.png" alt="" class="img-fluid">
        </div>
      </div>

    </div>
  </div>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/popper.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/main.js"></script>
</body>

</html>