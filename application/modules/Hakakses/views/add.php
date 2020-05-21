<div class="row">
  <div class="col-sm-12">
    <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/add')?>" >
      <?=dumpdata($dump)?>>
      <div class="form-group">
        <label>Level</label>
          <input required type="text" class="form-control" name="level_nama">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Dashboard</label>
          <input required type="text" class="form-control" name="level_dashboard">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <div class="control-label">Status level</div>
        <label class="custom-switch mt-2">
          <input  type="checkbox" name="level_status" class="custom-switch-input">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Aktikan level</span>
        </label>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </form>
  </div>
</div>
