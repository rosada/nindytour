<?php

function get_data($query){
	$ret_val = array();
	include ('connect.php');
	$result = mysqli_query($conn,$query);
	if (!$result) {
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}else {
		if($result->num_rows != 0){
			while($data = mysqli_fetch_assoc($result)) {
				array_push($ret_val, $data);
			}
		}
	}
	return $ret_val;
}

function debug($var){
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

function rand_alphanum($strlen = 8){
	$characters = 'abcdefghijklmnpqrstuvwxyz23456789';
	$string = '';
	$max = strlen($characters) - 1;
	for ($i = 0; $i < $strlen; $i++) {
		$string .= $characters[mt_rand(0, $max)];
	}
	return $string;
}

function get_email_header(){
	$headers = array("From: ".FROM_EMAIL,
			    "Reply-To: ".FROM_EMAIL,
			    "X-Mailer: PHP/" . PHP_VERSION
			);
	$headers = implode("\r\n", $headers);
	return $headers;
}

function check_get_username($username){
	$ret_val = '';
	$query = 'SELECT username from user where username like "'.$username.'%" order by id_user desc';
	$result = get_data($query);
	if(count($result) == 0){
		$ret_val = $username;
	}else{
		$increment = 1;
		if(preg_match('/\d$/', $result[0]['username'], $matches, PREG_OFFSET_CAPTURE)){
			$ret_val = $matches[0];
			$increment = (int) $matches[0] + 1;
		}
		$ret_val = $username.$increment;
	}
	return $ret_val;
}
?>