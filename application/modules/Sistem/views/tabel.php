<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<form  method="post" class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/tabel')?>">
				<div class="form-group d-none">
					<label>Id</label>
					<input required readonly type="text" class="form-control" value="<?=$data->setting_id?>" name="id">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Sistem</label>
					<input required type="text" class="form-control" value="<?=$data->setting_namasistem?>" name="setting_namasistem">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Tagline</label>
					<input required type="text" class="form-control" value="<?=$data->setting_tagline?>" name="setting_tagline">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Programer</label>
					<input type="text" class="form-control" value="<?=$data->setting_namapemilik?>" name="setting_namapemilik">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Tempat</label>
					<input type="text" class="form-control" value="<?=$data->setting_namatempat?>" name="setting_namatempat">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" class="form-control" value="<?=$data->setting_alamat?>" name="setting_alamat">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" value="<?=$data->setting_email?>" name="setting_email">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>No.Telepon</label>
					<input type="text" class="form-control" value="<?=$data->setting_notlp?>" name="setting_notlp">
					<?=validationmsg('required')?>
				</div>
				<div class="form-group">
					<label>Logo</label>
					<input type="file" class="form-control" value="<?=$data->setting_logo?>" name="setting_logo">
					<?=validationmsg('required')?>
					<img src="<?= base_url('upload/sistem/'.$data->setting_logo)?>" alt="preview logo" width="64px" height="64px">
				</div>
				<div class="form-group">
					<button  type="submit" class="btn btn-outline-primary btn-block">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
