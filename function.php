<?php
session_start();
include('connect.php');
if(!empty($_POST)){
	// if($_POST['action'] == 'add-lyric'){
	// 	$query_add = 'insert into lyrics (title,singer,lyric) value ("'.$_POST["title"].'","'.$_POST["singer"].'","'.$_POST["lyric"].'")';
	// 	if( $conn->query($query_add) ){
	// 		$query_get = 'select * from lyrics order by id desc';
	// 		$last_inserted = $conn->query($query_get);
	// 		echo json_encode($last_inserted);
	// 	}
	// }
	// if($_POST['action'] == 'edit-lyric'){
	// 	$query_edit = 'update lyrics set title="'.$_POST['title'].'", singer="'.$_POST['singer'].'", lyric="'.$_POST['lyric'].'" where id='.$_POST['id'].'';
	// 	if( $conn->query($query_edit) ){
	// 		$query_get = 'select * from lyrics order by id desc';
	// 		$last_inserted = $conn->query($query_get);
	// 		echo json_encode($last_inserted);
	// 	}
	// }

	if($_POST['action'] == 'login'){
		$query_cek = 'select * from user where username="'.$_POST['username'].'" and password="'.$_POST['password'].'"';
		$data_cek = $conn->query($query_cek);
		debug($data_cek->num_rows);
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
	}

	if(isset($_POST['register'])){
	  //  // form validation: ensure that the form is correctly filled ...
	  // by adding (array_push()) corresponding error unto $errors array
	  if (empty($nama)) { array_push($errors, "Username is required"); }
	  if (empty($email)) { array_push($errors, "Email is required"); }
	  if (empty($password_1)) { array_push($errors, "Password is required"); }
	  if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	  }

	  // first check the database to make sure 
	  // a user does not already exist with the same username and/or email
	  $user_check_query = "SELECT * FROM user WHERE username='$nama' OR email='$email' LIMIT 1";
	  $result = mysqli_query($db, $user_check_query);
	  $user = mysqli_fetch_assoc($result);
	  var_dump($user_check_query);
	  var_dump($nama);
	  var_dump($email);
	  
	  if ($user) { // if user exists
	    if ($user['nama'] === $nama) {
	      array_push($errors, "Username already exists");
	    }

	    if ($user['email'] === $email) {
	      array_push($errors, "email already exists");
	    }
	  }

	  // Finally, register user if there are no errors in the form
	  if (count($errors) == 0) {
	  	$password = md5($password_1);//encrypt the password before saving in the database

	  	$query = "INSERT INTO user (username, email, password) 
	  			  VALUES('$nama', '$email', '$password')";
	  	mysqli_query($db, $query);
	  	$_SESSION['nama'] = $nama;
	  	$_SESSION['success'] = "You are now logged in";
	  	header('location: index.php');
	  }
	  }
}

?>
<?php
function debug($var){
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}
?>