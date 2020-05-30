<div class="row">
  <div class="col-sm-12">
    <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/add')?>" >
      <div class="form-group">
        <label>Nama</label>
          <input required type="text" class="form-control" name="user_nama">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Username</label>
          <input required type="text" class="form-control" name="user_username">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Password</label>
          <input required type="password" class="form-control" name="user_password">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Email</label>
          <input required type="text" class="form-control" name="user_email">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <label>Level</label>
        <select class="form-control select2" name="user_level">
          <?php foreach($level AS $row):?>
            <option value="<?=$row->level_id?>"><?=ucwords($row->level_nama)?></option>
          <?php endforeach;?>
        </select>
      </div>
      <div class="form-group">
        <label>Home</label>
          <input required type="text" class="form-control" name="user_dashboard">
          <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <div class="control-label">Status user</div>
        <label class="custom-switch mt-2">
          <input  type="checkbox" name="user_status" class="custom-switch-input" value="1">
          <span class="custom-switch-indicator"></span>
          <span class="custom-switch-description">Aktikan user</span>
        </label>
        <?=validationmsg('required')?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </div>
    </form>
  </div>
</div>
