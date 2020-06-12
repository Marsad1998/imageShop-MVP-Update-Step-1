$(document).ready(function(){
	fetchContributor();
});

function fetchContributor(){
  var check_contr = 'contr';
	$.ajax({
		url: 'inc/code.php',
		type: 'POST',
		data:{check_contr:check_contr},
	    dataType: 'json',
	    success:function(response){
	     response.data.forEach(function(index,value){
	    	// console.log(index.contr_img);
	    	if (index.contr_img == "") {
	    		var abc = "default.png";
	    	}else{
	    		var abc = index.contr_img;
	    	}
	     var addccontr = `<div class="col-sm-3 main-div"><a href="index.php?nav=view_contributor&contr_id=`+index.contr_id+`" >
	     <div class="card">
	     	      <div class="card-body">
					<p class="card-text">
					<form action="" method="POST">
					  <img src="contributor/uploads/`+abc+`" class="img-responsive" style="width: 100%;height:200px" alt="Invalid Image Type Click To Change">
					</p>
				</div>
				<div class="card-footer">
					<label class="name">Name:` +index.contr_name+`</label><br>	
					<label for="">Email: `+index.contr_email+`</label><br>	
					<label class="location">Location: `+index.contr_country+`</label><br>
					  <label for="">Total Collection : `+response.count[value]+` 
					  <button class="btn btn-success" name="upload_contr" type="submit" id="saveData">View Profile</button>
					</form>
				</div>
			   </div></a></div>`;
			$(`#cardappend`).append(addccontr);
		});
	   }	
	});
}//fetchContributor

 function ShowImg(id,contr_id){
 	var cate_id = id;
 	var contr_id = contr_id;
 	var check_imge = 'imge';
 	$(".custom").hide();
 	$("#addimg").empty();
 	$.ajax({
 		url:'inc/code.php',
 		type:'POST',
 		data:{check_imge:check_imge,cate_id:cate_id,contr_id:contr_id},
 		dataType:'json',
 		success:function(response){
 			console.log(response.data)
 		// console.log(response.data);
 	     var category = "";
 	 	response.data.forEach(function(index,value){
 	 		if (index.img_file == "") {
	    		var abc = "default.png";
	    	}else{
	    		var abc = index.img_file;
	    	}
 	 		category +=`<div class="col-sm-3">
 	 		<div class="content">
			<img src="contributor/uploads/`+abc+`" alt="Car" style="width:100%"><br><br>
			<button type="submit" class="btn btn-info">Add To Card</button>
		   </div></div>`;
 		});
		   $("#addimg").empty().append(category);
 		 }
 	}); 	
 }

$("#paypalcheckout").hide();   

//Save Data into Database
$("#proceedForm").on('submit',function(e) {
    e.preventDefault();
    var form = $('#proceedForm');
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function() {
            $('#proceed').attr("disabled","disabled");
            $('#proceed').text("Loading...");
        },
        success:function (msg) {
            $('#proceed').text("Save");
            $('#proceedForm').each(function(){
                this.reset();
            });
            $('#proceed').removeAttr("disabled");
            $('.proceedForm').hide();
            $("#paypalcheckout").show();   
        }
    });//ajax call
});//main

//  document.getElementById("box").oninput=function(){
//     for (var i=0;i<document.getElementsByClassName("name").length;i++) {
//         if (document.getElementsByClassName("name")[i].innerHTML.match(new RegExp(document.getElementById("box").value, "gi"))) {
//             document.getElementsByClassName("name")[i].parentElement.parentElement.parentElement.style.display="inline-block";
//         } else {       document.getElementsByClassName("name")[i].parentElement.parentElement.parentElement.style.display="none";
//         }
//     }
// }

$("#box").on('keyup', function(){
  var matcher = new RegExp($(this).val(), 'gi');
  $('.main-div').show().not(function(){
      return matcher.test($(this).find('.name, .location').text())
  }).hide();
});

// document.getElementById("box").oninput=function(){
//     for (var i=0;i<document.getElementsByClassName("name").length;i++) {
//         if (document.getElementsByClassName("name")[i].innerHTML.match(new RegExp(document.getElementById("box").value, "gi"))) {
//             document.getElementsByClassName("name")[i].parentElement.parentElement.parentElement.style.display="inline-block";
//         } else {       
//         	document.getElementsByClassName("name")[i].parentElement.parentElement.parentElement.style.display="none";
//         }
//     }
// }