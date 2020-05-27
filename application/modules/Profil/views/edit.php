<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <?= dumpdata($data)?>
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->log_id?>" name="id">
          <?=validationmsg('required')?>
        </div>          
        <div class="form-group">
          <label>Aksi</label>
          <input required type="text" class="form-control" value="<?=$data->log_aksi?>" name="log_aksi">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>   
    </div>  
  </div>  
</div>
