<?php
  if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    $query_pesanan_edit = "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'";
    $sql_pesanan_edit = mysqli_query($db, $query_pesanan_edit);

    $query_edit_menu = "SELECT * FROM menu WHERE 1 ORDER BY nama_menu ASC";
    $sql_edit_menu = mysqli_query($db, $query_edit_menu);

    $edit_pesanan = mysqli_fetch_assoc($sql_pesanan_edit);
  } else {
    $edit_pesanan = NULL;
  }

  $query_menu = "SELECT * FROM menu WHERE 1 ORDER BY nama_menu ASC";
  $sql_menu = mysqli_query($db, $query_menu);

  $query_pesanan = "SELECT id_pesanan, nama_pemesan, qtt, status, nama_menu FROM pesanan, menu WHERE id_menu = menu";
  $sql_pesanan = mysqli_query($db, $query_pesanan);

  $no = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Daftar Pesanan</h1>
      <div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="pesanan">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pemesan</th>
                  <th>Order</th>
                  <th>Qtt.</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              <?php while($pesanan = mysqli_fetch_assoc($sql_pesanan)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $pesanan['nama_pemesan']; ?></td>
                  <td><?php echo $pesanan['nama_menu']; ?></td>
                  <td><?php echo $pesanan['qtt']; ?></td>
                  <td><?php echo $pesanan['status']; ?></td>
                  <td>
                    <a href="http://localhost/restosaya/resto-kasir/dashboard.php?page=process_order&id=<?php echo $pesanan['id_pesanan']; ?>" class="btn btn-success btn-xs" title="Proses Pesanan"><span class="glyphicon glyphicon-ok-sign"></span></a>
                    <a href="http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan&id=<?php echo $pesanan['id_pesanan']; ?>" class="btn btn-warning btn-xs" title="Edit Pesanan"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="http://localhost/restosaya/process/delete_order.php?id=<?php echo $pesanan['id_pesanan']; ?>" class="btn btn-danger btn-xs" title="Hapus Pesanan"><span class="glyphicon glyphicon-remove-sign"></span></a>
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
          <h4><span class="glyphicon glyphicon-plus-sign"></span> Buat Pesanan</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="http://localhost/restosaya/process/create_order.php" method="post">
            <div class="form-group">
              <label for="nama_pemesan">Nama Pemesan</label>
              <input class="form-control" id="nama_pemesan" type="text" name="nama_pemesan" placeholder="(Contoh) M. Akbar Nugroho" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="order">Order</label>
              <select class="form-control" id="order" name="order">
                <?php while($menu = mysqli_fetch_assoc($sql_menu)) : ?>
                  <option value="<?php echo $menu['id_menu']; ?>"><?php echo $menu['nama_menu']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qtt">Qtt.</label>
              <input class="form-control" id="qtt" type="number" name="qtt" placeholder="(Contoh) 5">
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="buat_pesanan"><span class="glyphicon glyphicon-ok-sign"></span> Buat Pesanan</button>
            </div>
          </form>
        </div>
      </div>
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-edit"></span> Edit Pesanan</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="http://localhost/restosaya/process/edit_order.php?id=<?php echo $edit_pesanan['id_pesanan']; ?>" method="post">
            <div class="form-group">
              <label for="nama_pemesan">Nama Pemesan</label>
              <input class="form-control" id="nama_pemesan" type="text" name="nama_pemesan" value="<?php echo $edit_pesanan['nama_pemesan']; ?>" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="order">Order</label>
              <select class="form-control" id="order" name="order">
                <?php while($edit_menu = mysqli_fetch_assoc($sql_edit_menu)) : ?>
                  <option value="<?php echo $edit_menu['id_menu']; ?>"><?php echo $edit_menu['nama_menu']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="qtt">Qtt.</label>
              <input class="form-control" id="qtt" type="number" name="qtt" value="<?php echo $edit_pesanan['qtt']; ?>">
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="edit_pesanan"><span class="glyphicon glyphicon-ok-sign"></span> Edit Pesanan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
