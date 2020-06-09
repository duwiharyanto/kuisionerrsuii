<div class="row">
  <div class="col-sm-12">
    <div class="table-responsive">
      <form class="needs-validation" novalidate="" url="<?= base_url($setting['url'].'/add')?>">
        <div class="form-group">
          <h5 class="text-center"><?=ucwords($kategori->kategori_kategori)?></h5>
          <h6 class="text-center"><?=ucwords($kategori->kategori_periode)?></h6>
          <input required type="text" readonly class="form-control d-none" name="kuisioner_kategoriid" value="<?=$kategori->kategori_id?>">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input required type="text" class="form-control" name="kuisioner_nama">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Unit Kerja</label>
          <input required type="text" class="form-control" name="kuisioner_unitkerja">
          <?=validationmsg('required')?>
        </div>
        <div class="form-group">
          <label>Departemen</label>
      	  <select class="form-control select2" required name="kuisioner_departemen">
      		<?php foreach($departemen AS $row):?>
      			<option value="<?=$row->departemen_id?>"><?= $row->departemen_nama?></option>
      		<?php endforeach;?>
      	  </select>
          <?=validationmsg('required')?>
	      </div>
        <div class="form-group">
          <label>Alamat Domisili</label>
          <textarea required type="text" class="form-control" name="kuisioner_alamatdomisili"></textarea>
          <?=validationmsg('required')?>
        </div>
        <hr>
        <?php $i=1;?>
        <?php foreach($data AS $row):?>
          <?php
            $param_j1=explode(';', $row->pertanyaan_j1);
            $param_j2=explode(';', $row->pertanyaan_j2);
            $param_j3=explode(';', $row->pertanyaan_j3);
            $param_j4=explode(';', $row->pertanyaan_j4);
          ?>
          <div class="form-group">
            <div class="control-label"><?=$i.'. '.ucwords($row->pertanyaan_pertanyaan)?></div>
            <div class="custom-switches-stacked mt-2">
            <?php if($row->pertanyaan_id==1 || $row->pertanyaan_id==2):?>
              <label class="custom-switch">
                <input type="radio" name="<?= 'j'.$row->pertanyaan_id?>" value="<?=$param_j1[1]?>" class="custom-switch-input" checked>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"><?=ucwords($param_j1[0])?></span>
              </label>
              <label class="custom-switch">
                <input type="radio" name="<?= 'j'.$row->pertanyaan_id?>" value="<?=$param_j2[1]?>" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"><?=ucwords($param_j2[0])?></span>
              </label>
              <label class="custom-switch">
                <input type="radio" name="<?= 'j'.$row->pertanyaan_id?>" value="<?=$param_j3[1]?>" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"><?=ucwords($param_j3[0])?></span>
              </label>
              <p class="text-muted"><i><?=ucwords($row->pertanyaan_catatan)?></i></p>
            <?php else:?>
              <label class="custom-switch">
                <input type="radio" name="<?= 'j'.$row->pertanyaan_id?>" value="<?=$param_j1[1]?>" class="custom-switch-input" checked>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"><?=ucwords($param_j1[0])?></span>
              </label>
              <label class="custom-switch">
                <input type="radio" name="<?= 'j'.$row->pertanyaan_id?>" value="<?=$param_j2[1]?>" class="custom-switch-input">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description"><?=ucwords($param_j2[0])?></span>
              </label>              
            <?php endif;?>  
            </div>
          </div>
        <?php $i++;endforeach;?>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input required type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
            <label class="custom-control-label text-danger" for="remember-me">Data saya isi dengan sebenar-benarnya</label>
          </div>
          <?=validationmsg('required')?>
        </div>        
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit">Simpan</button>
        </div>                  
      </form>     
    </div>
  </div>
</div>
