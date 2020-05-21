<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->menu_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Menu</label>
            <input required type="text" class="form-control" name="menu_label" value="<?=$data->menu_label?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Path</label>
            <input required type="text" class="form-control" name="menu_link" value="<?=$data->menu_link?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Akses Level</label>
            <input required type="text" class="form-control" name="menu_akses_level" value="<?=$data->menu_akses_level?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <div class="control-label">Status level</div>
          <label class="custom-switch mt-2">
            <input  type="checkbox" name="menu_status" class="custom-switch-input" <?=$data->menu_status==1? 'checked':''?> value="1">
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
