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
			$ret_val = mysqli_fetch_assoc($result);
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
?>