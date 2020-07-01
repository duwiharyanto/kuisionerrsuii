<div id="view">
  <div class="row">
    <div class="col-12">
      <div class="card card-danger">
        <div class="card-header">
          <h4 id="headline"><?=ucwords($headline)?> 
            <?php if($this->session->userdata('user_level')==1):?>
            <span class="badge badge-danger <?=!$update ? 'd-none':''?>">update</span>
            <?php endif;?>
          </h4>
          <div class="card-header-action">
            <?php if($aksi['tambah']):?>
              <button id="addbtn" class="btn  btn-outline-primary" onclick="add()" url="<?= base_url($url.'/add')?>"><i class="fas fa-plus"></i> Tambah</button>
            <?php endif;?>
            <?php if($aksi['cetak']):?>
              <button id="exportbtn" class="btn  btn-outline-primary" onclick="cetak()" url="<?= base_url($url.'/exportpdf')?>"><i class="fas fa-print"></i> PDF</button>
            <?php endif;?>
            <div class="dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
              <div class="dropdown-menu">
                <a href="javascript:void(0)" id="reloadbtn" onclick="reload(this)" url="<?= base_url($url.'/tabel')?>" class="dropdown-item has-icon text-primary"><i class="fa fa-sync-alt"></i> Reload</a>
                <a href="javascript:void(0)"  onclick="hapusall(this)" url="<?= base_url($url.'/hapusall')?>" class="dropdown-item has-icon text-primary"><i class="far fa-trash-alt"></i> Hapus Semua</a>                
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
        //validasi()
      });
    }, 200);
    hapusall=function(btn){
      var url=$(btn).attr('url')
      swal({
        title: 'Anda Yakin ?',
        text: 'Data akan dihapus secara permanen',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal('Data berhasil dihapus', {
            icon: 'success',
          });
          $.ajax({
            type:'POST',
            dataType:'json',
            url:url,
            success:function(data){
              reload()
              toaster(data)
            }
          })
        } else {
          swal('Data tidak jadi dihapus');
        }
      });      
    }
  })
</script>
