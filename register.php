<?php 
include('connect.php');
if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO user (username, email, password) 
            VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<div class="form-outer-box row">
	<div class="form-middle-box">
		<div class="form-box">
			<form method="POST" action="">
				<div class="form-group">
					 <label>Nama lengkap</label>
					 <input class="form-control" name="nama">
				</div>
				<div class="form-group">
					 <label>Email</label>
					 <input class="form-control" name="email">
				</div>
				<div class="form-group">
					 <label>Kata Sandi</label>
					 <input class="form-control" name="password">
				</div>
				<div class="form-group">
					 <label>Konfirmasi Kata Sandi</label>
					 <input class="form-control" name="repassword">
				</div>
				<div class="form-group text-center">
					 <small>Dengan meng-klik tombol Daftar di bawah ini, saya setuju dengan Kebijakan Privasi serta Syarat dan Ketentuan dari website ini.</small>
				</div>
				<div class="form-group text-center">
					<button class="btn btn-tosca" type="submit" name="register" value="daftar">Daftar</button>
				</div>
				<div class="form-group text-center">
					Sudah punya akun ? <a href="?dest=login" >Log in </a>
				</div>
			</form>
		</div>
	</div>
</div>