<div id="view">
  <div class="row">
    <div class="col-12">
      <div class="card card-danger">
        <div class="card-header">
          <h4 id="headline"><?=ucwords($headline)?></h4>
          <div class="card-header-action">
            <?php if($aksi['add']):?>
              <button id="addbtn" class="btn  btn-outline-primary" onclick="add()" url="<?= base_url($url.'/add')?>"><i class="fas fa-plus"></i> Tambah</button>
            <?php endif;?>
            <button id="exportbtn" class="btn  btn-outline-primary" onclick="cetak(this)" url="<?= base_url($url.'/cetak')?>"><i class="fas fa-print"></i> PDF</button>
            <div class="dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
              <div class="dropdown-menu">
                <a href="javascript:void(0)" id="reloadbtn" onclick="reload(this)" url="<?= base_url($url.'/tabel')?>" class="dropdown-item has-icon text-primary"><i class="fa fa-sync-alt"></i> Reload</a>
                <a href="javascript:void(0)" class="dropdown-item has-icon text-primary"><i class="far fa-trash-alt"></i> Trash</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <p style="display:none" class="text-center" id="generatepdf">Mengambil data... <span class="fas fa-spinner fa-spin"></span> </p>
          <div id="loadtabel" url="<?=base_url($url.'/tabel')?>">
            <p class="text-center">Mengambil data... <span class="fas fa-spinner fa-spin"></span> </p>
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
function cetak(btn){
  var url=$(btn).attr('url');
  var view='<iframe src="'+url+'" width="100%" height="700" style="border:0px solid black;">'
  $("#loadtabel").html(view)
}
</script>
