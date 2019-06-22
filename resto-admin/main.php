<?php
  // list order
  $query_order = "SELECT nama_pemesan, nama_menu, qtt, tanggal, total_bayar FROM pesanan, menu, transaksi WHERE id_pesanan = pesanan AND id_menu = menu";
  $sql_order = mysqli_query($db, $query_order);

  // total order
  $query_order = "SELECT * FROM transaksi WHERE 1";
  $total_order = mysqli_num_rows($sql_order);

  // total menu
  $query_menu = "SELECT * FROM menu WHERE 1";
  $sql_menu = mysqli_query($db, $query_menu);
  $total_menu = mysqli_num_rows($sql_menu);

  // total diskon
  $query_diskon = "SELECT * FROM diskon WHERE 1";
  $sql_diskon = mysqli_query($db, $query_diskon);
  $total_diskon = mysqli_num_rows($sql_diskon);
?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-stats"></span> Transaksi</h4>
        </div>
        <div class="panel-body">
          <p><span style="font-size:25px; margin-right:10px;"><?php echo $total_order; ?></span> <strong>items(s)</strong></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-list-alt"></span> Menu</h4>
        </div>
        <div class="panel-body">
          <p><span style="font-size:25px; margin-right:10px;"><?php echo $total_menu; ?></span> <strong>items(s)</strong></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel">
        <div class="panel-heading bg-primary">
          <h4><span class="glyphicon glyphicon-tag"></span> Diskon</h4>
        </div>
        <div class="panel-body">
          <p><span style="font-size:25px; margin-right:10px;"><?php echo $total_diskon; ?></span> <strong>items(s)</strong></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
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
                  <th>Tanggal</th>
                  <th>Total Bayar</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
              <?php while ($order = mysqli_fetch_assoc($sql_order)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $order['nama_pemesan']; ?></td>
                  <td><?php echo $order['nama_menu']; ?></td>
                  <td><?php echo $order['qtt']; ?></td>
                  <td><?php echo $order['tanggal']; ?></td>
                  <td><?php echo $order['total_bayar']; ?></td>
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
