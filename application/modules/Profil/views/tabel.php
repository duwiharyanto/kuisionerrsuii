<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<form  method="post" class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/tabel')?>">
				<div class="form-group d-none">
					<label>Id</label>
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
					<label>Logo</label>
					<input type="file" class="form-control" value="<?=$data->user_foto?>" name="user_foto">
					<?=validationmsg('required')?>
					<img class="mt-2 rounded-circle" src="<?= base_url('upload/sistem/foto/'.$data->user_foto)?>" alt="foto" width="84px" height="84px">
				</div>
				<div class="form-group">
					<button  type="submit" class="btn btn-primary btn-block">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
