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
}

?>
<?php
function debug($var){
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}
?>