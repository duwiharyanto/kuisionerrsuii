<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id</label>
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
          <label>Icon</label>
            <input required type="text" class="form-control" name="menu_ikon" value="<?=$data->menu_ikon?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Akses Level</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="" aria-label="" name="menu_akses_level" value="<?=$data->menu_akses_level?>">
            <div class="input-group-append">
              <button class="btn btn-primary edit" onclick="edit(this)"  url="<?= base_url($setting['url'].'/modalleveluser')?>" type="button">Level</button>
            </div>
          </div>
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
<script>
  function edit(btn){
    var url=$(btn).attr('url');
    $.ajax({
      type:'POST',
      url:url,
      success:function(data){
        $("#modal").html(data);
        $("#modal").modal('show');
      }
    })
    //alert(url)
  }
</script>
