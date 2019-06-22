<?php
  // sidebar for user `admin`
  if($_SESSION['logged_user']['level'] === 'admin') :
?>

  <nav class="navbar bg-primary">
    <div class="navbar-header">
      <a href="http://localhost/restosaya/" class="navbar-brand"><span class="glyphicon glyphicon-cutlery"></span> Restosaya</a>
    </div>
  </nav>
  <ul class="nav nav-pills nav-stacked">
    <li class="<?php echo ($_GET['page'] == 'main') ? 'pills-active' : ''; ?>">
      <a href="?page=main"><span class="glyphicon glyphicon-dashboard"></span> Dasboard</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'petugas') ? 'pills-active' : ''; ?>">
      <a href="?page=petugas"><span class="glyphicon glyphicon-user"></span> Petugas</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'transaksi') ? 'pills-active' : ''; ?>">
      <a href="?page=transaksi"><span class="glyphicon glyphicon-stats"></span> Trasnsaksi</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'menu') ? 'pills-active' : ''; ?>">
      <a href="?page=menu"><span class="glyphicon glyphicon-list-alt"></span> Menu</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'diskon') ? 'pills-active' : ''; ?>">
      <a href="?page=diskon"><span class="glyphicon glyphicon-tag"></span> Diskon</a>
    </li><hr>
    <li class="<?php echo ($_GET['page'] == 'profil') ? 'pills-active' : ''; ?>">
      <a href="?page=profil"><span class="glyphicon glyphicon-king"></span> Profil</a>
    </li>
  </ul><hr>
  <div class="logout text-center">
    <a href="http://localhost/restosaya/process/auth-logout.php" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </div>

<?php
  // sidebar for user `kasir`
  else :
?>

  <nav class="navbar bg-primary">
    <div class="navbar-header">
      <a href="http://localhost/restosaya/" class="navbar-brand"><span class="glyphicon glyphicon-cutlery"></span> Restosaya</a>
    </div>
  </nav>
  <ul class="nav nav-pills nav-stacked">
    <li class="<?php echo ($_GET['page'] == 'main') ? 'pills-active' : ''; ?>">
      <a href="?page=main"><span class="glyphicon glyphicon-dashboard"></span> Dasboard</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'menu') ? 'pills-active' : ''; ?>">
      <a href="?page=menu"><span class="glyphicon glyphicon-list-alt"></span> Menu</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'pesanan') ? 'pills-active' : ''; ?>">
      <a href="?page=pesanan"><span class="glyphicon glyphicon-inbox"></span> Pesanan</a>
    </li>
    <li class="<?php echo ($_GET['page'] == 'transaksi') ? 'pills-active' : ''; ?>">
      <a href="?page=transaksi"><span class="glyphicon glyphicon-stats"></span> Trasnsaksi</a>
    </li>
  </ul><hr>
  <div class="logout text-center">
    <a href="http://localhost/restosaya/process/auth-logout.php" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
  </div>

<?php endif; ?>
