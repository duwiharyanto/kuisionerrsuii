<div id="view">
    <div class="row">
        <div class="col-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h4 id="headline"><?=ucwords($headline)?></h4>
                    <div class="card-header-action">
                        <?php if($aksi['add']):?>
                            <button id="addbtn" class="btn  btn-outline-primary" onclick="add()" url="<?= base_url($url.'/add')?>"><i class="fas fa-plus"></i> Tambah</button>
                            <button id="exportbtn" class="btn  btn-outline-primary" onclick="cetak(this)" url="<?= base_url($url.'/cetak')?>"><i class="fas fa-print"></i> PDF</button>
                        <?php endif;?>
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
                    <form action="<?=base_url($url.'/cetak')?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Nama</label>
                                <select class="form-control select2" name="nama">   
                                <option value="">Semua</option>  
                                <?php foreach($kuisioner AS $row):?>
                                    <option value="<?=$row->kuisioner_nama?>"><?=ucwords($row->kuisioner_nama)?></option>
                                <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">&nbsp</label>
                                <button onclick="cari(this)" url="<?=base_url($url.'/tabel')?>" type="button" id="btncari" class="btn btn-primary btn-block">Cari</button>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputPassword4">&nbsp</label>
                                <button type="submit"   class="btn btn-warning btn-block">Cetak PDF</button>
                            </div>                            
                        </div>
                    </form>
                    <div id="pencarian"></div>
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
function cari(btn){
    var url=$(btn).attr('url')
    var id=$('[name=nama]').val()    
    $.ajax({
      type:'POST',
      url:url,
      data:{id:id},
      success:function(data){
        $("#loadtabel").html(data)
        custom()
        console.log(data)
      }
    })   
}
</script>
