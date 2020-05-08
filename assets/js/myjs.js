//"use strict";
$(document).ready(function(){
  var url=$('#loadtabel').attr('url');
  setTimeout(function () {
    $("#loadtabel").load(url,function(){
      aksi()
      custom()           
    });
  }, 200);     
})

//FUNCTION EXTENDED
reload = function(){
  var url=$('#reloadbtn').attr('url');
  $("#loadtabel").load(url,function(){
    aksi() 
    custom()       
  });  
}   
aksi = function(){
  $('.hapus').on('click',function(){
    var id=$(this).attr('id')
    var url=$(this).attr('url')
    swal({
      title: 'Anda Yakin ?',
      text: 'Data akan dihapus secara permanen',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal('Data berhasil dihapus', {
          icon: 'success',
        });
        $.ajax({
          type:'POST',
          dataType:'json',
          url:url,
          data:{id:id},
          success:function(data){
            reload()
            toaster(data)
          }
        })        
      } else {
        swal('Data tidak jadi dihapus');
      }
    });
  });
  $('.edit').on('click',function(){
    var id=$(this).attr('id')
    var url=$(this).attr('url')
    $.ajax({
      type:'POST',
      url:url,
      data:{id:id},
      success:function(data){
        $("#loadtabel").html(data);  
        validasi()
       
      }
    })            
  });    
} 
toaster = function(data){
  if(data.status=='success'){
    iziToast.success({
      title: 'Perhatian',
      message: data.msg,
      position: 'topRight'
    });
  }else{      
    iziToast.error({
      title: 'Error !!',
      message: data.msg,
      position: 'topRight'
    });      
  }
} 
add = function(){
  var url=$('#addbtn').attr('url');
  $("#loadtabel").load(url,function(){
    validasi()
    custom()
  });   
} 
validasi = function(){
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
            reload()
            toaster(data)
           
          },
          error:function(){
            
          }
      }) 
      return false
    }
  })
}
custom = function(){
  $(".datatables").DataTable({
    pageLength:100,
    //responsive: true,
    //buttons: ["copy", "print"]
  })   
} 