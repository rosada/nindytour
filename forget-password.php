<div class="form-outer-box row">
	<div class="form-middle-box">
		<div class="form-box">
			<form method="post" action="<?php echo BASE_URL?>/function.php" id="form-forget-password">
				<input type="hidden" class="form-control" name="action" value="forget-password">
				<div class="form-group">
					 <label>Alamat email</label>
					 <input class="form-control" name="email" type="email">
				</div>
				<div class="form-group">
					<small>Masukkan alamat email anda</small>
				</div>
				<div class="form-group text-center">
					<button class="btn btn-tosca">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>