<?php 
include '../connect/db.php';
if(isset($_POST['check_contr']) == "contr"){
	$q = get($dbc,"contributors WHERE contr_sts =  1");
	while($r=mysqli_fetch_assoc($q)){
	$response[] = $r;
	$abc[] = countWhen($dbc,"images","contr_id",$r['contr_id']);
	}
	echo json_encode(['data'=> $response, 'count'=> $abc]);
}
if(isset($_POST['check_imge'])== "img"){
	$cate_id = $_POST['cate_id'];
	$contr_id = $_POST['contr_id'];
   if($cate_id && $contr_id !=""){
   	$q=mysqli_query($dbc,"SELECT * FROM  images WHERE  contr_id = '$contr_id' AND cate_id = '$cate_id'");
	$response = array();
	while($r=mysqli_fetch_assoc($q)){
		$response[] = $r;
    }
	echo json_encode(array('data' => $response));
	}
}
?>