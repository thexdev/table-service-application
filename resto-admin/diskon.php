<?php
  if (isset($_GET['id'])) {
    $id_diskon = $_GET['id'];
    $query_edit = "SELECT * FROM `diskon` WHERE id_diskon = '$id_diskon'";
    $sql_edit = mysqli_query($db, $query_edit);
    $diskon_edit = mysqli_fetch_assoc($sql_edit);
  } else {
    $diskon_edit = NULL;
  }

  // take data `diskon` from database
  $query = "SELECT * FROM `diskon` WHERE 1 ORDER BY nama_diskon ASC";
  $sql = mysqli_query($db, $query);

  // index number
  $no = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Daftar Diskon</h1>
      <div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama diskon</th>
                  <th>Jumlah (%)</th>
                  <th>Ststus</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              <?php while($diskon = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $diskon['nama_diskon']; ?></td>
                  <td><?php echo $diskon['jumlah_diskon']; ?></td>
                  <td><?php echo $diskon['status']; ?></td>
                  <td>
                    <a href="?page=diskon&id=<?php echo $diskon['id_diskon'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="http://localhost/restosaya/process/delete_diskon.php?id=<?php echo $diskon['id_diskon']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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
          <h4><span class="glyphicon glyphicon-list-alt"></span> Buat Diskon</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/add_diskon.php" method="post">
            <div class="form-group">
              <label for="nama_diskon">Nama Diskon</label>
              <input class="form-control" id="nama_diskon" type="text" name="nama_diskon" placeholder="(Contoh) Kemerdekaan" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="jumlah_diskon">Jumlah (%)</label>
              <input class="form-control" id="jumlah_diskon" type="number" step="5" name="jumlah_diskon" placeholder="(Contoh) 10" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label><input type="radio" name="status" value="aktif">Aktif</label>
              <label><input type="radio" name="status" value="nonaktif">Nonaktif</label>
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="tambah_diskon"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
            </div>
          </form>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-edit"></span> Edit Diskon</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/edit_diskon.php?id=<?php echo $diskon_edit['id_diskon'];?>" method="post">
            <div class="form-group">
              <label for="edit_nama_diskon">Nama Diskon</label>
              <input class="form-control" id="edit_nama_diskon" type="text" name="nama_diskon" autocomplete="off" required value="<?php echo $diskon_edit['nama_diskon']; ?>">
            </div>
            <div class="form-group">
              <label for="edit_jumlah">Jumlah (%)</label>
              <input class="form-control" id="edit_jumlah" type="number" name="edit_jumlah" step="0.1" autocomplete="off" required value="<?php echo $diskon_edit['jumlah_diskon']; ?>">
            </div>
            <div class="form-group">
              <label><input type="radio" name="status" value="aktif" <?php echo ($diskon_edit['status'] === 'aktif') ? 'checked' : '';?>>Aktif</label>
              <label><input type="radio" name="status" value="nonaktif" <?php echo ($diskon_edit['status'] === 'nonaktif') ? 'checked' : '';?>>Nonaktif</label>
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="edit_diskon"><span class="glyphicon glyphicon-ok-sign"></span> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
