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
	     var addccontr = `<div class="col-sm-3">
	     <div class="card">
	     	      <div class="card-body">
					<p class="card-text">
					<form action="" method="POST">
					  <input type='file' name="uploadPic" id="uploadPic" onchange="readURL(this);" style="display: none;">
	                  <img src="contributor/uploads/`+abc+`" class="img-responsive" style="width: 100%;height:200px" alt="Invalid Image Type Click To Change">
					</p>
				</div>
				<div class="card-footer">
					<label for="">Name:` +index.contr_name+`</label><br>	
					<label for="">Email: `+index.contr_email+`</label><br>	
					<label for="">Location: `+index.contr_country+`</label><br>
					  <label for="">Total Collection : `+response.count[value]+` 
					  <a href="index.php?nav=view_contributor&contr_id=`+index.contr_id+`" class="btn 
					  btn-success" name="upload_contr" type="submit" id="saveData">View Profile</a>
					</form>
				</div>
			   </div></div>`;
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