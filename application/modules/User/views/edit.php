<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->user_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Nama</label>
            <input required type="text" class="form-control" name="user_nama" value="<?=$data->user_nama?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Username</label>
            <input required type="text" class="form-control" name="user_username" value="<?=$data->user_username?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Password</label>
            <input type="password" class="form-control" name="user_password">
            <p class="text-danger">
              Biarkan kosong jika tidak dirubah
            </p>
        </div>
        <div class="form-group">
          <label>Email</label>
            <input required type="text" class="form-control" name="user_email" value="<?=$data->user_email?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Level</label>
          <select class="form-control select2" name="user_level">
            <?php foreach($level AS $row):?>
              <option value="<?=$row->level_id?>" <?=$data->user_level==$row->level_id ? 'selected':''?>><?=ucwords($row->level_nama)?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label>Home</label>
            <input required type="text" class="form-control" name="user_dashboard" value="<?=$data->user_dashboard?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <div class="control-label">Status user</div>
          <label class="custom-switches  mt-2">
            <input  type="checkbox" name="user_status" class="custom-switch-input" value="1"<?=$data->user_status==1 ? 'checked':''?> >
            <span class="custom-switch-indicator"></span>
            <span class="custom-switch-description">Aktikan user</span>
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
