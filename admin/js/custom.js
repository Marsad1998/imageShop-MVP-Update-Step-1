$(document).ready(function(){
  $(document).on('click','#approveImages',function(){
    alert()
  });
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
      beforeSend:function() {
      $('#saveData').attr("disabled","disabled");
      $('#formData').css("opacity","0.5");
      },
      success:function (msge) {
        console.log(msge)
        $('#formData')[0].reset();
        $('#msge').text(msge).addClass("alert-success").fadeIn(2000).fadeOut(3000);
        $('#saveData').removeAttr("disabled");      
        $('#formData').css("opacity","");    
        $("#blah").attr("src","uploads/default.png");
        $("#Reload").load('index.php?nav='+reloadPage+' #Reload');        
        $("#saveData").text("Save").removeClass("btn-primary").addClass("btn-info");
      } // SUCCESS Function
    });//ajax call
  });// formData submit Function
  $("#formData1").on('submit',function(e){
   var reloadPage = $("#reloadPage").val();
   e.preventDefault();
    $.ajax({
      type: 'POST',
      url:'inc/code.php',
      data: new FormData(this), 
      contentType: false,
      cache: false,
      processData: false,
      success:function (msge) {
        $('#formData1')[0].reset();
        $('#saveData1').removeAttr("disabled");      
        $('#formData1').css("opacity","");    
        $("#blah").attr("src","uploads/default.png");
      } // SUCCESS Function
    });//ajax call
  });// formData submit Function

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
    if (tbl == "categories"){
      $("#cate_id").val(data.cate_id);
      $("#cate_name").val(data.cate_name);
      $('#cate_sts  option[value="'+data.cate_sts+'"]').prop("selected", true);
      $("#saveData").text("Update").removeClass("btn-primary").addClass("btn-info");
    }else if (tbl == 'brands') {
      $("#brand_id").val(data.brand_id);
      $("#brand_name").val(data.brand_name);
      $('#brand_sts  option[value="'+data.brand_sts+'"]').prop("selected", true);
      $("#saveData").text("Update").removeClass("btn-primary").addClass("btn-info");
    }else if (tbl == 'images') {
      $("#img_id").val(data.img_id);
      $("#img_title").val(data.img_title);
      $("#img_description").val(data.img_description);
      $("#img_price").val(data.img_price);
      $('#cate_id  option[value="'+data.cate_id+'"]').prop("selected", true);
      $('#uploadPic').attr('src', "uploads/"+data.img_file);
      if (data.contr_id) {
        var src = "../contributor/uploads/";
      }else{
        var src = "uploads/";
      }
      $('#blah').attr('src', src+data.img_file);
      $('#brand_id  option[value="'+data.brand_id+'"]').prop("selected", true);
      $('#img_sts  option[value="'+data.img_sts+'"]').prop("selected", true);
      $("#saveData").text("Update").removeClass("btn-primary").addClass("btn-info");
    }
    else{} // else part.
    } // success function
  }); // ajax call
});//main form fetch data form the
  $("#blah").click(function() {
 $("#uploadPic").click();
});// Select Imge
});// Ready Function

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
                        // if (this.width <= this.height) {
                            $('#blah').attr('src', reader.result);   
                        // }else{
                        //     Swal.fire({
                        //       type: 'error',
                        //       title: 'The Image Must be 2:1 Size',
                        //       showConfirmButton: true,
                        //       timer: 4000
                        //     });
                        // }
                    }
                    
                }
            }
    };
    reader.readAsDataURL(input.files[0]); 
    }
}// close image preview