<?php
  // take data `menu` from database
  $query = "SELECT * FROM `menu` WHERE 1 ORDER BY nama_menu ASC";
  $sql = mysqli_query($db, $query);

  // index number
  $no = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Daftar Menu</h1>
      <div class="panel">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover" id="listMenu">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Menu</th>
                  <th>Harga (Rp.*)</th>
                </tr>
              </thead>
              <tbody>
              <?php while($menu = mysqli_fetch_assoc($sql)) : ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $menu['nama_menu']; ?></td>
                  <td><?php echo $menu['harga_menu']; ?></td>
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
