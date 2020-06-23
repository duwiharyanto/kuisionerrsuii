<div id="loadtabels">
  <div class="row">
    <div class="col-sm-12">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/edit')?>">
        <div class="form-group d-none">
          <label>Id User</label>
          <input required readonly type="text" class="form-control" value="<?=$data->kategori_id?>" name="id">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Headline</label>
            <input required type="text" class="form-control" name="kategori_kategori" value="<?=$data->kategori_kategori?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Periode</label>
            <input required type="text" class="form-control" name="kategori_periode" value="<?=$data->kategori_periode?>">
            <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-warning btn-block">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
