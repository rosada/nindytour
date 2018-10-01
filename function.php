<?php
session_start();
include('connect.php');
include('helper.php');
if(!empty($_POST)){
	switch ($_POST['action']) {
		case 'login':
			$query_cek = 'select * from user where username="'.$_POST['username'].'" and password="'.$_POST['password'].'"';
			$data_cek = $conn->query($query_cek);
			if($data_cek->num_rows == 1){
				echo "data benar ada single";
				$row = mysqli_fetch_assoc($data_cek);
				$_SESSION["user"] = $row ["user"];
				$_SESSION["nama_lengkap"] = $row ["level"];
				// $_SESSION["akses"] = $row ["akses"];
				$_SESSION["login"] = true;
				header ("Location: index.php");
				exit();
			}else {
				echo "data tidak ada atau dobel";
				exit();
			}
		break;
		case 'forget-password':
			$query_cek = 'select * from user where email="'.$_POST['email'].'"';
			$result = get_data($query_cek);
			// debug(count($result));exit();
			if(count($result) > 0){
				$new_pwd = rand_alphanum();
				$query_update = 'update user set password = "'.$new_pwd.'" where id_user="'.$result['id_user'].'"';
				$update_pwd = $conn->query($query_update);
				$email_to = $_POST['email'];
				$subject = 'Password reset';
				$message = "You are request to reset your password\n";
				$message .= "Here is your new password : ".$new_pwd;
				$headers = get_email_header();

				// Send
				if(!mail($email_to, $subject, $message, $headers)){
				    var_dump(error_get_last()['message']);
				}else{
					header ("Location: index.php?dest=login");
				}

			}else {
				// echo "data tidak ada atau dobel";
				header ("Location: index.php?dest=forget-password");
				exit();
			}
		break;
		default:
			# code...
			break;
	}
}

?>