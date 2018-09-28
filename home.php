<div class="hero">
	<div class="form fullwidth">
		<div class="container">
			<form id="order" method="post" action="function.php">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="title">Dari</label>
							<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Dari">
							<small id="title" class="form-text text-muted"></small>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="title">Ke</label>
							<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Ke">
							<small id="title" class="form-text text-muted"></small>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label for="title">Tanggal berangkat</label>
							<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Tanggal berangkat">
							<small id="title" class="form-text text-muted"></small>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label for="title">Penumpang</label>
							<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Penumpang">
							<small id="title" class="form-text text-muted"></small>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="form-group">
							<label>&nbsp;</label>
							<input type="submit" class="form-control" value="Cari" name="submit" >
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<img src="<?php echo BASE_URL.'/assets/images/hero.jpg'?>" class="hero-image">
</div>