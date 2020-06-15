$(document).ready(function(){
  //Save Data into Database
  $("#formData").on('submit',function(e){
  var reloadPage = $("#reloadPage").val();
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url:'inc/code.php',
      data: new FormData(this), 
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'json',
      beforeSend:function() {
      $('#saveData').attr("disabled","disabled");
      $('#formData').css("opacity","0.5");
      },
      success:function (msg) {
      $('#formData')[0].reset();
      $('.msg').text(msg.msg).addClass("alert alert-"+msg.sts).fadeIn(6000).fadeOut(6000);
      // $('#msg').text(msg.msg).addClass("alert alert-"+msg.sts).fadeIn(6000).fadeOut(6000);
      $('#saveData').removeAttr("disabled");      
      $('#formData').css("opacity","");    
      $("#blah").attr("src","uploads/default.png");
      $("#Reload").load('index.php?nav='+reloadPage+' #Reload');      
      $("#saveData").text("Save").removeClass("btn-primary").addClass("btn-info");
     } // SUCCESS Function
   });//ajax call
  });// formData submit Function
  $("#blah").click(function() {
    $("#uploadPic").click();
  });// Select Imge
   //Fetech Data From Database For Editing Purpose
  $(document).on('click','.update',function () {
      var edit_id = $(this).attr("id");
      var tbl = $("#table_name").val(); 
      var col = $("#col_name").val();
      $.ajax({
        url:"inc/code.php",
        type:"POST",
        data:{edit_id:edit_id, tbl1:tbl, col1:col},
        dataType:"json",
        success:function(data){
          console.log(data);
          if (tbl == "images"){
            $("#img_id").val(data.img_id);
            $("#img_title").val(data.img_title);
            $("#img_description").val(data.img_description);
            $("#img_price").val(data.img_price);
            $('#cate_id  option[value="'+data.cate_id+'"]').prop("selected", true);
            $('#brand_id  option[value="'+data.brand_id+'"]').prop("selected", true);
            $('#img_sts  option[value="'+data.img_sts+'"]').prop("selected", true);
            $("#blah").attr("src","uploads/"+data.img_file);
            $("#saveData").text("Update").removeClass("btn-primary").addClass("btn-info");
          }else if (tbl == 'categorys') {
            $("#category_id").val(data.category_id);
            $("#category_name").val(data.category_name);
            $('#category_sts  option[value="'+data.category_sts+'"]').prop("selected", true);
            $("#saveData").text("Update").removeClass("btn-primary").addClass("btn-info");
            $(".modal-title").text("Update Data");
            $(".modal-header").css("height","50px").removeClass("bg-primary").addClass("bg-info");   
            $('#modalData').modal("show");           
          }else{
          } // else part.
        } // success function
      }); // ajax call
  });//main form fetch data form the data basr

  //Save Data into Database
  $("#formData1").on('submit',function(e){
  e.preventDefault();
  $.ajax({
      type: 'POST',
      url:'inc/code.php',
      data: new FormData(this), 
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function() {
        $('#saveData1').attr("disabled","disabled");
        $('#formData1').css("opacity","0.5");
      },
      success:function (msge) {
      console.log(msge)
      $('#formData1')[0].reset();
      Swal.fire({
        type: 'success',
        title: 'Profile Image Saved Successfully',
        showConfirmButton: true,
        timer: 4000
      });
      $('#saveData1').removeAttr("disabled");      
      $('#formData1').css("opacity","");
     } // SUCCESS Function
    });//ajax call
  });// formData submit Function

});// Ready Function
//File Input With Preview and Validation
function readURL(input) {
    if (input.files && input.files[0]) {
        var fileExtension = ['jpeg', 'jpg', 'png'];
        var fileSize = (input.files[0].size);
        var reader = new FileReader;
        reader.onload = function () { //file is loaded
            //check image Extentions
            if ($.inArray($(input).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                Swal.fire({
                    type: 'error',
                    title: 'Only formats are allowed :' + fileExtension.join(', '),
                    showConfirmButton: true,
                    timer: 4000
                });
            }else{
                //check image size
                if (fileSize > 2000000) {
                   Swal.fire({
                        type: 'error',
                        title: 'You can upload More Than 2MB of Image',
                        showConfirmButton: true,
                        timer: 4000
                    });
                }else{
                    var img = new Image;
                    img.src = reader.result;
                    img.onload = function() {
                      $('#blah').attr('src', reader.result);   
                    }
                    
                }
            }
    };
    reader.readAsDataURL(input.files[0]); 
    }
}// close image preview
// Delete Data frorm table
// Delete Data From the Table
function DeleteData(deleteid){
  // alert(deleteid);
  var reloadPage = $("#reloadPage").val();
  var tbl=$("#table_name").val();
  var col=$("#col_name").val();
  Swal.fire({
    title: 'Are you sure You Want to Delete?',
    text: "Delete Data permanently!",
    // type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Delete it!',
    showLoaderOnConfirm: true,
    preConfirm:function(data){
    console.log(data);
    $.ajax({
     url:'inc/code.php',
     method:'POST',
     data:{deleteid:deleteid,tbl2:tbl,col2:col},
     succes:function(deleteid){
        console.log(deleteid);  
       }// success function
       });// ajax cal
     $("#Reload").load('index.php?nav='+reloadPage+' #Reload');     
     }// preconfrom function
   });// swal file
}// Delete Data Form Table