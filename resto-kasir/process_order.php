<?php
  if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];
    $query = "SELECT id_pesanan, nama_pemesan, qtt, nama_menu, harga_menu FROM pesanan, menu WHERE id_pesanan = '$id_pesanan' AND id_menu = menu";
    $sql = mysqli_query($db, $query);

    $query_diskon = "SELECT * FROM diskon WHERE status = 'aktif'";
    $sql_diskon = mysqli_query($db, $query_diskon);

    $order = mysqli_fetch_assoc($sql);
  } else {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-credit-card"></span> Pembayaran</h4>
        </div>
        <div class="panel-body">
          <form role="form" action="http://localhost/restosaya/process/create_transaksi.php" method="post">
            <div class="form-group">
              <label for="id_pesanan">ID Pesanan</label>
              <input class="form-control" id="id_pesanan"  type="text" name="id_pesanan" value="<?php echo $order['id_pesanan']; ?>">
            </div>
            <div class="form-group">
              <label for="nama_pemesan">Nama Pemesan</label>
              <input class="form-control" id="id_pemesana"  type="text" name="nama_pemesan" value="<?php echo $order['nama_pemesan']; ?>">
            </div>
            <div class="form-group">
              <label for="order">Order</label>
              <input class="form-control" id="order"  type="text" name="order" value="<?php echo $order['nama_menu']; ?>">
            </div>
            <div class="form-group">
              <label for="harga_menu">Harga / Porsi</label>
              <input class="form-control" id="harga_menu" type="number" name="harga_menu" value="<?php echo $order['harga_menu']; ?>">
            </div>
            <div class="form-group">
              <label for="qtt">Qtt.</label>
              <input class="form-control" id="qtt" type="number" name="qtt" value="<?php echo $order['qtt']; ?>">
            </div>
            <div class="form-group">
              <label for="diskon">Diskon</label>
              <select id="diskon" class="form-control" name="diskon">
              <?php while ($diskon = mysqli_fetch_assoc($sql_diskon)) : ?>
                <option value="<?php echo $diskon['jumlah_diskon']; ?>"><?php echo $diskon['nama_diskon']; ?></option>
              <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="bayar">Total Bayar</label>
              <input class="form-control" id="bayar" readonly type="number" name="total_bayar">
            </div>
            <div class="panel-footer">
              <button class="btn btn-success btn-md" type="submit" name="selesai_pembayaran"><span class="glyphicon glyphicon-ok-sign"></span> Selesai</button>
              <strong class="pull-right">RP. <span id="total-bayar"></span></strong>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
