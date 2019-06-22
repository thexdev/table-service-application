<?php
  if (isset($_GET['id'])) {
    $id_user    = $_GET['id'];
    $query_edit = "SELECT * FROM `user` WHERE id_user = '$id_user'";
    $sql_edit   = mysqli_query($db, $query_edit);
    $user_edit  = mysqli_fetch_assoc($sql_edit);
  }
  else {
    $user_edit = NULL;
  }

	// take data `user` from database
  $query = "SELECT * FROM `user` WHERE level = 'kasir' ORDER BY username ASC";
  $sql   = mysqli_query($db, $query);

  // index number
  $no = 1;
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>Daftar Petugas</h1>
			<div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Lengkap</th>
                  <th>E-Mail</th>
                  <th>Level</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($petugas = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $petugas['username']; ?></td>
                  <td><?php echo $petugas['email']; ?></td>
                  <td>
                  	<span class="badge">
                  		<?php echo $petugas['level']; ?>
                  	</span>
                  </td>
                  <td>
                    <a href="?page=petugas&id=<?php echo $petugas['id_user'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="http://localhost/restosaya/process/delete_petugas.php?id=<?php echo $petugas['id_user']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
		</div>
		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-plus-sign"></span> Tambah Petugas</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/add_petugas.php" method="post">
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input class="form-control" id="nama_lengkap" type="text" name="nama_lengkap" placeholder="(Contoh) M. Akbar Nugroho" autocomplete="off" required>
            </div>
            <div class="form-group">
            	<label for="email">E-Mail</label>
              <input class="form-control" id="email" type="email" name="email" placeholder="(Contoh) username@domain.com" autocomplete="off" required>
            </div>
            <div class="form-group">
            	<label for="password">Password</label>
              <input class="form-control" id="password" type="password" name="password" autocomplete="off" required>
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="tambah_petugas"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
            </div>
          </form>
        </div>
			</div>
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-edit"></span> Edit Petugas</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/edit_petugas.php?id=<?php echo $user_edit['id_user'];?>" method="post">
            <div class="form-group">
              <label for="edit_nama_lengkap">Nama Lengkap</label>
              <input class="form-control" id="edit_nama_lengkap" type="text" name="nama_lengkap" autocomplete="off" required value="<?php echo $user_edit['username']; ?>">
            </div>
            <div class="form-group">
              <label for="edit_email">E-Mail</label>
              <input class="form-control" id="edit_email" type="email" name="email" autocomplete="off" required value="<?php echo $user_edit['email']; ?>">
            </div>
            <div class="form-group">
              <label for="edit_password">New Password</label>
              <input class="form-control" id="edit_password" type="password" name="password" autocomplete="off">
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="edit_user"><span class="glyphicon glyphicon-ok-sign"></span> Simpan</button>
            </div>
          </form>
        </div>
      </div>
		</div>
	</div>
</div>