<div class="form-outer-box row">
	<div class="form-middle-box">
		<div class="form-box">
			<form method="post" id="form-register" action="<?php echo BASE_URL?>/function.php">
				<input type="hidden" class="form-control" name="action" value="register">
				<div class="form-group">
					 <label>Nama lengkap</label>
					 <input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					 <label>Email</label>
					 <input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					 <label>Kata Sandi</label>
					 <input type="password" class="form-control" name="password" id="password">
				</div>
				<div class="form-group">
					 <label>Konfirmasi Kata Sandi</label>
					 <input type="password" class="form-control" name="repassword">
				</div>
				<div class="form-group text-center">
					 <small>Dengan meng-klik tombol Daftar di bawah ini, saya setuju dengan Kebijakan Privasi serta Syarat dan Ketentuan dari website ini.</small>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-tosca">Daftar</button>
				</div>
				<div class="form-group text-center">
					Sudah punya akun ? <a href="?dest=login" >Log in </a>
				</div>
			</form>
		</div>
	</div>
</div>