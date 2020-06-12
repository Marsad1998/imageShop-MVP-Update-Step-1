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

if (isset($_POST['username'])) {
	$cart_item = $_POST['cart_item'];
	// print_r($cart_item);
	$data = [
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'user_city' => $_POST['user_city'],
		'user_state' => $_POST['user_state'],
		'user_country' => $_POST['user_country'],
		'user_address' => $_POST['user_address'],
	];
	if (insert_data($dbc, "users", $data)) {
		$_SESSION['last_id'] = $last_id = mysqli_insert_id($dbc);
		$data2 = [
			'order_sts' => '2',
			'user_order' => $_SESSION['last_id']
		];
		if (insert_data($dbc, "orders", $data2)) {
			$_SESSION['last_id1'] = $last_id1 = mysqli_insert_id($dbc);
			foreach ($cart_item as $x => $value) {
				$fetch_prodcut = fetchRecord($dbc, "images", "img_id", $value);
				$q = mysqli_query($dbc,"INSERT INTO order_detail (order_id , img_id, img_price) VALUES ('".$_SESSION['last_id1']."' , '".$value."', '".$fetch_prodcut['img_price']."')");
			}
		}
	}
	exit();
}

?>