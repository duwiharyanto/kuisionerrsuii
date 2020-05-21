<!DOCTYPE html>
<html>
<head>
  <title><?=ucwords($setting['headline'])?></title>
</head>
<body>
  <table width="100%" style="margin-bottom: 20px" >
    <tr>
      <td width="10%">
        <img src="<?=base_url()?>/assets/img/logohead.png" width="60px" height="60px" style="display:block;margin: auto">
      </td>
      <td width="40%"><h2 align="left"><?=ucwords($setting['headline'])?></h2><h5>Dicetak : <?=date('d-m-Y')?></h5>
      </td>
      <td align="center" width="60%">
      <barcode code="<?=$this->session->userdata('user_nama')?>" type="C128B"/>
      </td>
    </tr>
  </table>
  <div id="konten">
    <?php print_r($konten) ?>
  </div>
</body>
</html>
