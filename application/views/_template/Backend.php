<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?=ucwords($this->uri->segment(1))?> &mdash; <?=$setting[
    'sistem']?></title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/img/favicon.ico">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/fontawesome/css/all.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/css/components.css">
  <!-- General JS Scripts -->
  <script src="<?= base_url()?>/assets/modules/jquery.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/popper.js"></script>
  <script src="<?= base_url()?>/assets/modules/tooltip.js"></script>
  <script src="<?= base_url()?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url()?>/assets/modules/moment.min.js"></script>
  <script src="<?= base_url()?>/assets/js/stisla.js"></script>
  <script src="<?= base_url()?>/assets/js/jquery.validate.js"></script>
  <script src="<?= base_url()?>/assets/js/page/bootstrap-modal.js"></script>
  <?php if(strtolower($this->uri->segment(1))=='dashboard'):?>
    <script src="<?= base_url()?>assets/modules/chart.min.js"></script>
  <?php endif;?>
  <script src="<?=base_url()?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?=base_url()?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url()?>assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="<?=base_url()?>assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="<?=base_url()?>assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?=base_url()?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?=base_url()?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?=base_url()?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?=base_url()?>assets/js/myjs.js"></script>
</head>
<style>
  .navbar-bg{
    background-color:#6372E6
  }
</style>
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
            <img alt="profil" src="<?= base_url('upload/sistem/foto/'.$this->session->userdata('user_foto'))?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hallo, <?=ucwords($this->session->userdata('user_nama'))?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Option</div>
              <a href="<?= base_url('Profil')?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <!--
              <a href="<?= base_url()?>/dist/features_activities" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="<?= base_url()?>/dist/features_settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              -->
              <div class="dropdown-divider"></div>

              <a href="<?=site_url('Login/logout')?>" class="dropdown-item has-icon text-danger">
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
           <li class="menu-header"><?=ucwords('menu')?></li>
            <?php foreach ($menu as $menu):?>
              <?php if($menu->submenu!=0):?>
                <li class="dropdown <?=$menu->menu_nama==$setting['menu'] ? 'active':''?>">
                  <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="<?=$menu->menu_ikon?>"></i> <span><?=ucwords($menu->menu_label)?></span></a>
                  <ul class="dropdown-menu">
                    <?php foreach($menu->submenu AS $submenu):?>
                      <li class="<?=$submenu->menu_nama==$setting['submenu'] ? 'active':''?>"><a class="nav-link" href="<?= site_url($submenu->menu_link)?>"><?=ucwords($submenu->menu_label)?></a></li>
                    <?php endforeach;?>
                  </ul>
                </li>
              <?php else:?>
                <li class="<?=$menu->menu_nama==$setting['menu'] ? 'active':''?>"><a class="nav-link" href="<?= site_url($menu->menu_link)?>"><i class="<?=$menu->menu_ikon?>"></i> <span><?=ucwords($menu->menu_label)?></span></a></li>
              <?php endif;?>
            <?php endforeach;?>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="javascript:void(0)" class="btn btn-primary btn-lg btn-block btn-icon-split">
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
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?= site_url($this->uri->segment(0).'/Dashboard') ?>">Dashboard</a></div>
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
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true"></div>
      <footer class="main-footer">
        <div class="footer-left">
          <?= FOOTPRINT ?>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>
  <!-- Template JS File -->
  <script src="<?= base_url()?>/assets/js/scripts.js"></script>
  <script src="<?= base_url()?>/assets/js/custom.js"></script>
</body>
</html>
