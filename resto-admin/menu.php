<?php
  if (isset($_GET['id'])) {
    $id_menu    = $_GET['id'];
    $query_edit = "SELECT * FROM `menu` WHERE id_menu = '$id_menu'";
    $sql_edit   = mysqli_query($db, $query_edit);
    $menu_edit  = mysqli_fetch_assoc($sql_edit);
  }
  else {
    $menu_edit = NULL;
  }

  // take data `menu` from database
  $query = "SELECT * FROM `menu` WHERE 1 ORDER BY nama_menu ASC";
  $sql   = mysqli_query($db, $query);

  // index number
  $no = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Daftar Menu</h1>
      <div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Menu</th>
                  <th>Harga (Rp.*)</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              <?php while($menu = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $menu['nama_menu']; ?></td>
                  <td><?php echo $menu['harga_menu']; ?></td>
                  <td>
                    <a href="?page=menu&id=<?php echo $menu['id_menu'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="http://localhost/restosaya/process/delete_menu.php?id=<?php echo $menu['id_menu']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
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
          <h4><span class="glyphicon glyphicon-list-alt"></span> Buat Menu</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/add_menu.php" method="post">
            <div class="form-group">
              <label for="nama_menu">Nama Menu</label>
              <input class="form-control" id="nama_menu" type="text" name="nama_menu" placeholder="(Contoh) Ayam Goreng" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="harga">Harga (Rp.*)</label>
              <input class="form-control" id="harga" type="number" name="harga" placeholder="(Contoh) 15000" autocomplete="off" required>
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="tambah_menu"><span class="glyphicon glyphicon-plus-sign"></span> Tambah</button>
            </div>
          </form>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-edit"></span> Edit Menu</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="../process/edit_menu.php?id=<?php echo $menu_edit['id_menu'];?>" method="post">
            <div class="form-group">
              <label for="edit_nama_menu">Nama Menu</label>
              <input class="form-control" id="edit_nama_menu" type="text" name="nama_menu" autocomplete="off" required value="<?php echo $menu_edit['nama_menu']; ?>">
            </div>
            <div class="form-group">
              <label for="edit_harga">Harga (Rp.*)</label>
              <input class="form-control" id="edit_harga" type="number" name="harga" autocomplete="off" required value="<?php echo $menu_edit['harga_menu']; ?>">
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="edit_menu"><span class="glyphicon glyphicon-ok-sign"></span> Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
