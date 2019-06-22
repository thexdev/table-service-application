<?php

	require_once '../config/database.php';

	$query = "SELECT * FROM user WHERE level = 'admin'";
	$sql   = mysqli_query($db, $query);
	$admin = mysqli_fetch_assoc($sql);

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Profil</h1>
			<div class="panel">
				<div class="panel-body">
					<form action="../process/edit_profil.php?id=<?php echo $admin['id_user']; ?>" method="post" class="col-md-6">
						<div class="form-group">
							<label for="nama_lengkap">Nama Lengkap</label>
							<input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?php echo $admin['username']; ?>">
						</div>
						<div class="form-group">
							<label for="email">E-Mail</label>
							<input class="form-control" type="email" name="email" id="email" autocomplete="off" required value="<?php echo $admin['email']; ?>">
						</div>
						<div class="form-group">
							<label for="passsword">Password Baru</label>
							<input class="form-control" type="password" name="password" id="password" autocomplete="off">
						</div>
						<div class="panel-footer">
							<button class="btn btn-success btn-md" name="edit_profil"><span class="glyphicon glyphicon-ok-sign"></span> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>