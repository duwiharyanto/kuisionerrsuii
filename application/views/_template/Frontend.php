<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=ucwords($this->uri->segment(1)? $this->uri->segment(0):'Home')?> &mdash; <?=$setting[
    'sistem']?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/izitoast/css/iziToast.min.css">
  
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/components.css">
  <!-- General JS Scripts -->
  <script src="<?=base_url()?>/assets/modules/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/popper.js"></script>
  <script src="<?=base_url()?>/assets/modules/tooltip.js"></script>
  <script src="<?=base_url()?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?=base_url()?>/assets/modules/moment.min.js"></script>
  <script src="<?=base_url()?>/assets/js/stisla.js"></script>
  <script src="<?=base_url()?>assets/modules/izitoast/js/iziToast.min.js"></script>
  
  <script src="<?=base_url()?>assets/js/myjs.js"></script>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="<?=base_url()?>/dist/index" class="navbar-brand sidebar-gone-hide"><?=$setting['sistem']?></a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <ul class="navbar-nav navbar-right ml-auto">
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="<?=site_url('Login')?>" class="nav-link"><span class="fa fa-lock"></span> Login</a></li>
          </ul>
        </ul>
      </nav>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="<?=base_url()?>" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="<?=base_url()?>" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=ucwords($setting['menu'])?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Home</a></div>
              <?php if($this->uri->total_segments()>=1):?>
              <div class="breadcrumb-item"><a href="<?=site_url($this->uri->segment(1))?>"><?=ucwords($this->uri->segment(1))?></a></div>
                <?php if($this->uri->total_segments()>=2):?>
                  <div class="breadcrumb-item"><?=ucwords($this->uri->segment(2))?></div>
                <?php endif;?>
              <?php endif;?>
            </div>
          </div>

          <div class="section-body">
            <?php if($msg=$this->session->flashdata('success')):?>
              <div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <?=ucwords($msg)?>
                </div>
              </div>
            <?php endif;?>
            <?php print_r($konten) ?>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <?=FOOTPRINT?>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>


  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/assets/js/custom.js"></script>
</body>
</html>