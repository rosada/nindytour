<?php
include ('helper.php');

$query = 'SELECT id_user FROM user WHERE email="'.$_GET['email'].'"';
$result = get_data($query);
if(count($result) == 1){
	echo json_encode(true);
	exit();
}else{
	echo json_encode(false);
	exit();
}
?>