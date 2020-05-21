<div id="view">
  <div class="row">
    <div class="col-12">
      <div class="card card-danger">
        <div class="card-header">
          <h4 id="headline"><?=ucwords($headline)?></h4>
          <div class="card-header-action">
            <button id="addbtn" class="btn  btn-outline-primary" onclick="location.reload()" ><i class="fas fa-spinner fa-spin"></i> Refrash</button>
            <?php if($aksi['tambah']):?>
              <button id="addbtn" class="btn  btn-outline-primary" onclick="add()" url="<?= base_url($url.'/add')?>"><i class="fas fa-plus"></i> Tambah</button>
            <?php endif;?>
            <?php if($aksi['cetak']):?>
              <button id="exportbtn" class="btn  btn-outline-primary" onclick="cetak()" url="<?= base_url($url.'/exportpdf')?>"><i class="fas fa-print"></i> PDF</button>
            <?php endif;?>
            <div class="dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
              <div class="dropdown-menu">
                <a href="javascript:void(0)" id="reloadbtn" onclick="reload(this)" url="<?= base_url($url.'/tabel')?>" class="dropdown-item has-icon text-primary"><i class="fa fa-sync-alt fa-spin"></i> Reload</a>
                <a href="javascript:void(0)" class="dropdown-item has-icon text-primary"><i class="far fa-trash-alt"></i> Trash</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div id="loadtabel" url="<?=base_url($url.'/tabel')?>">
            <p class="text-center">Mengambil data... <span class="fas fa-fire"></span> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    var url=$('#loadtabel').attr('url');
    setTimeout(function () {
      $("#loadtabel").load(url,function(){
        aksi()
        custom()
      });
    }, 200);
  })
</script>
