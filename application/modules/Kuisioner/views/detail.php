<div class="row">
  <div class="col-sm-12">
    <div class="table-responsive">
      <table class="table table-striped" width="100%">
        <tr>
          <th colspan="2"  id="warna">
            <h3 style="color:white" align="center" id="status"></h3>
          </th>
        </tr>        
        <?php foreach($responden AS $row):?>
        <tr>
          <th width="20%">Nama</th>
          <td>: <?=ucwords($row->kuisioner_nama)?></td>
        </tr>
        <tr>
          <th width="20%">Unit Kerja</th>
          <td>: <?=ucwords($row->kuisioner_unitkerja)?></td>
        </tr>
        <tr>
          <th width="20%">Departemen</th>
          <td>: <?=ucwords($row->kuisioner_departemenid)?></td>
        </tr>        
        <tr>
          <th width="20%">Domisili</th>
          <td>: <?=ucwords($row->kuisioner_alamatdomisili)?></td>
        </tr> 
        <tr>
          <th width="20%">Tersimpan</th>
          <td>: <?=date('d-m-Y H:i:s',strtotime($row->created_at))?></td>
        </tr> 
        <?php $idresponden=md5($row->kuisioner_id);?>               
        <?php endforeach;?>
      </table> 
      <hr>
      <h5>Kuisioner</h5>
      <table class="table table-striped" width="100%">
        <?php $jumlahnilai=0;?>
        <?php foreach($data AS $row):?>
        <?php
          $jwb1=explode(';', $row->pertanyaan_j1);
          $jwb2=explode(';', $row->pertanyaan_j2);
          if($jwb1[1]==$row->jawaban){
            $jawaban=$jwb1[0].'('.$row->jawaban.')';
          }elseif($jwb2[1]==$row->jawaban){
            $jawaban=$jwb2[0].'('.$row->jawaban.')';
          }else{
            $jawaban='tidak dijawab';
          }
          $jumlahnilai+=$row->jawaban;
        ?>
        <tr>
          <th width="20%">Pertanyaan</th>
          <td>: <?=ucwords($row->pertanyaan_pertanyaan)?></td>
        </tr>  
        <tr>
          <th width="20%">Jawab</th>
          <td>: <?=$jawaban?></td>
        </tr>                        
        <?php endforeach;?>
        <tr>
          <th class="bg-danger" style="color:white">Total Nilai</th>
          <td>: <?=$jumlahnilai?> </td>
        </tr>
        <?php
          if($jumlahnilai==0 || $jumlahnilai <= 6){
            $status="Risiko Rendah Paparan Covid-19";
            $warna='bg-success';
          }elseif($jumlahnilai==7 || $jumlahnilai <= 13){
            $status="Risiko Sedang Paparan Covid-19";
            $warna='bg-warning';
          }elseif($jumlahnilai>=14){
            $status="Risiko Tinggi Paparan Covid-19";
            $warna='bg-danger';
          }else{
            $status="unkown";
            $warna='bg-secondary';
          }
        ?>
      </table>
      <form method="POST" action="<?=base_url($setting['url'].'/cetakdetail')?>">
       
        <div class="form-group">
          <input class="form-control d-none" readonly type="text" name="id" value="<?=$idresponden?>">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Cetak</button>
        </div>         
      </form>

    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var status='<?=ucwords($status)?>';
    var warna='<?=$warna?>';
    $('#status').html(status);
    $('#warna').addClass(warna);

  })
</script>