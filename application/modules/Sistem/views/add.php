<div class="row">
  <div class="col-sm-12">
    <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/add')?>" >
      <div class="form-group">
        <label>Id User</label>
        <input required type="text" class="form-control" name="log_iduser">
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Aksi</label>
          <input required type="text" class="form-control" name="log_aksi">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group"> 
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </form>   
  </div>  
</div>