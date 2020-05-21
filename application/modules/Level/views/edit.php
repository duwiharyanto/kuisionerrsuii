<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->level_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Level</label>
            <input required type="text" class="form-control" name="level_nama" value="<?=$data->level_nama?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Dashboard</label>
            <input required type="text" class="form-control" name="level_dashboard" value="<?=$data->level_dashboard?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <div class="control-label">Status level</div>
          <label class="custom-switch mt-2">
            <input  type="checkbox" name="level_status" class="custom-switch-input" <?=$data->level_status==1? 'checked':''?>>
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description">Aktikan level</span>
          </label>
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
