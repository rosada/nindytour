<?php
include ('helper.php');
if(!empty($_GET)){
	if(!empty($_GET['email'])){
		$query = 'SELECT id_user FROM user WHERE email="'.$_GET['email'].'"';
		$result = get_data($query);
		if(count($result) == 1){
			echo $_GET['is_exist'] == 'true' ? json_encode(true) : json_encode(false);
			exit();
		}else{
			echo $_GET['is_exist'] == 'true' ? json_encode(false) :  json_encode(true);
			exit();
		}
	}
}
?>