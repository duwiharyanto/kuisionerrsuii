<div id="view">
  <div class="row">
    <div class="col-12">
      <div class="card card-danger">
        <div class="card-header">
          <h4 id="headline"><?=ucwords($headline)?></h4>
        </div>
        <div class="card-body">
          <div id="loadtabel" url="<?=base_url($url.'/add')?>">
            <p class="text-center">Mengambil data... <span class="fas fa-fire"></span> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    var url=$('#loadtabel').attr('url');
    setTimeout(function () {
      $("#loadtabel").load(url,function(){
        simpankuisioner()
        aksi()
        //custom()   
        atributform()      
      });
    }, 200);
  })
  simpankuisioner = function(){
    $(".needs-validation").submit(function(e) {
      var form = $(this);
      if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        form.addClass('was-validated');
      }else if(form[0].checkValidity() === true){
        var url=form.attr('url');
        //alert(url);
        $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            //data:form[0].serialize(),
            data:new FormData(form[0]),
            processData:false,
            contentType:false,
            encode:true,
            cache:false,
            secureuri:false,
            cache:false,
            mimeType:'multipart/form-data',
            success:function(data){
              //console.log(data);
              // reload()
              toaster(data)
              $('.reset').val('')
              $('#pesanberhasil').html('<strong>**Pesan disimpan</strong>')
            },
            error:function(){
            }
        })
        return false
      }
    })
  }  
  atributform=function(){
    $(".select2").select2();    
  }
</script>
