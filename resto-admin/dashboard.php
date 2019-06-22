<?php session_start();
  // check the user is `admin` or not
  if ($_SESSION['logged_user']['level'] !== 'admin') {
    // if user isn't `admin`
    header('location: http://localhost/restosaya/');
  }
  else {
    // if user is `admin`
    // call database connection
    require_once '../config/database.php';
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once '../_includes/head.php'; ?>
    <link rel="stylesheet" href="http://localhost/restosaya/assets/custom/css/resto-admin.css">
    <title>Restosaya | Dashboard</title>
  </head>
  <body>
    <div id="container">
      <div id="sidebar">
        <?php include_once '../_includes/sidebar.php'; ?>
      </div>
      <div id="page-content-container">
      <?php
        switch ($page = $_GET['page']) {
          case 'main':
              include_once $page.'.php';
            break;

          case 'petugas':
              include_once $page.'.php';
            break;

          case 'transaksi':
              include_once $page.'.php';
            break;

          case 'menu':
              include_once $page.'.php';
            break;

          case 'diskon':
              include_once $page.'.php';
            break;

          case 'profil':
              include_once $page.'.php';
            break;

          default:
              include_once 'main.php';
            break;
        }
      ?>
      </div>
    </div>

    <?php include_once '../_includes/jslibrary.php'; ?>
    <script type="text/javascript">
        $(function () {
          $('.datatables').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          })
        })
    </script>
  </body>
</html>
