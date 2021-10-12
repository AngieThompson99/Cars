<?php require_once 'config.php'; ?>

<?php 
$cars = Car::findAll();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Auto-mobiles</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
        <div>
          <h1>Our cars</h1>
          <div class="row">
          <?php foreach ($cars as $car) { ?>
            <div class="col mb-4">
              <div class="card" style="width:15rem;">

              <?php
              $car_image = Image::findById($car->image_id);
              if ($car_image !== null) {
                ?>
                <img src="<?= APP_URL ."/" . $car_image->filename ?>"" class="card-img-top" alt="...">
                <?php
              }
              ?>
                <div class="card-body">
                  <h5 class="card-title"><?= $car->make ?></h5>
                  <p class="card-text"><?= get_words($car->model, 20) ?></p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Price: <?= $car->price ?></li>
                  <li class="list-group-item">Engine size: <?= $car->engine_size ?></li>
                  
                </ul>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>