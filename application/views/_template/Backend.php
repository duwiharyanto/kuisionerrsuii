<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=ucwords($this->uri->segment(1))?> &mdash; <?=$setting[
    'sistem']?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/fontawesome/css/all.min.css">
	
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>

          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url()?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="<?= base_url()?>/dist/features_profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= base_url()?>/dist/features_activities" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="<?= base_url()?>/dist/features_settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url()?>/dist/index"><?= $setting['sistem']?> </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url()?>/dist/index">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown ">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class=""><a class="nav-link" href="<?= base_url()?>/dist/index_0">General Dashboard</a></li>
                <li class=""><a class="nav-link" href="<?= base_url()?>/dist/index">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            <li class="menu-header">Menu</li>
            <?php foreach ($menu as $menu):?>
              <?php if($menu->submenu!=0):?>
                <li class="dropdown ">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span><?=ucwords($menu->menu_label)?></span></a>
                  <ul class="dropdown-menu">
                    <?php foreach($menu->submenu AS $submenu):?>
                      <li class="<?=$submenu->menu_nama==$setting['menu'] ? 'active':''?>"><a class="nav-link" href="<?= site_url($submenu->menu_link)?>"><?=ucwords($submenu->menu_label)?></a></li>
                    <?php endforeach;?>                    
                  </ul>
                </li>
              <?php else:?>
                <li class="<?=$menu->menu_nama==$setting['menu'] ? 'active':''?>"><a class="nav-link" href="<?= site_url($menu->menu_link)?>"><i class="<?=$menu->menu_ikon?>"></i> <span><?=ucwords($menu->menu_label)?></span></a></li>
              <?php endif;?>
            <?php endforeach;?>  
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?=ucwords($setting['menu'])?></h1>
          </div>
          <div class="section-body">
            <?php print_r($konten) ?>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <?= FOOTPRINT ?>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url()?>/assets/modules/jquery.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/popper.js"></script>
  <script src="<?= base_url()?>/assets/modules/tooltip.js"></script>
  <script src="<?= base_url()?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/moment.min.js"></script>
  <script src="<?= base_url()?>/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?= base_url()?>/assets/js/scripts.js"></script>
  <script src="<?= base_url()?>/assets/js/custom.js"></script>
</body>
</html>