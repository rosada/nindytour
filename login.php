<div class="form-outer-box row">
	<div class="form-middle-box">
		<div class="form-box">
			<form method="post" id="form-login" action="<?php echo BASE_URL?>/function.php">
				<input type="hidden" class="form-control" name="action" value="login">
				<div class="form-group">
					<label>Username / alamat email</label>
					<input type="text" class="form-control" name="username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group text-center">
					<a href="?dest=forget-password" >Lupa Kata Sandi ?</a>
				</div>
				<div class="form-group text-center">
					<button class="btn btn-tosca" name="login" value="login">Log in</button>
				</div>
				<div class="form-group text-center">
					Belum punya akun ? <a href="?dest=register" >Daftar </a>
				</div>
			</form>
		</div>
	</div>
</div>