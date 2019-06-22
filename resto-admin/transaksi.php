<?php
  $query = "SELECT * FROM pesanan, menu, transaksi WHERE id_pesanan = pesanan AND id_menu = menu";
  $sql = mysqli_query($db, $query);
  $no = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Transaksi Berhasil</h1>
      <div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover datatables">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Pemesan</th>
                  <th>Order</th>
                  <th>Qtt.</th>
                  <th>@</th>
                  <th>Diskon</th>
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                </tr>
              </thead>
              <tbody>
              <?php while ($transaksi = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $transaksi['nama_pemesan']; ?></td>
                  <td><?php echo $transaksi['nama_menu']; ?></td>
                  <td><?php echo $transaksi['qtt']; ?></td>
                  <td><?php echo $transaksi['harga_menu']; ?></td>
                  <td><?php echo $transaksi['diskon']; ?></td>
                  <td><?php echo $transaksi['tanggal']; ?></td>
                  <td><?php echo $transaksi['total_bayar']; ?></td>
                </tr>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
