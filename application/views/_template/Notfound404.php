<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>404 &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
             <?=strtoupper($msg)?>
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="<?=$url?>">Kembali</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          <?= FOOTPRINT?>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?=base_url()?>/assets/modules/jquery.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/popper.js"></script>
  <script src="<?=base_url()?>/assets/modules/tooltip.js"></script>
  <script src="<?=base_url()?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/moment.min.js"></script>
  <script src="<?=base_url()?>/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/assets/js/custom.js"></script>
</body>
</html>