<?php session_start();
  // check the user is `kasir` or not
  if ($_SESSION['logged_user']['level'] !== 'kasir') {
    // if user isn't `kasir`
    header('location: http://localhost/restosaya/');
  } else {
    // if user is `kasir`
    // call database connection
    require_once '../config/database.php';
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once '../_includes/head.php'; ?>
    <link rel="stylesheet" href="http://localhost/restosaya/assets/custom/css/resto-kasir.css">
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

          case 'menu':
              include_once $page.'.php';
            break;

          case 'pesanan':
              include_once $page.'.php';
            break;

          case 'transaksi':
              include_once $page.'.php';
            break;

          case 'process_order' :
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
        var hargaMenu = parseInt($('#harga_menu').attr('value'));
        var qtt = parseInt($('#qtt').attr('value'));
        var diskon = parseFloat($('#diskon option:selected').attr('value'));
        var totalBayar = (hargaMenu * qtt) - ((hargaMenu * qtt) * (diskon / 100));

        $('#total-bayar').text(totalBayar);
        $('#bayar').val(totalBayar);

        $('#diskon').on('change', function() {
          var diskon = parseFloat($('#diskon option:selected').attr('value'));
          var totalBayar = (hargaMenu * qtt) - ((hargaMenu * qtt) * (diskon / 100));

          $('#total-bayar').text(totalBayar);
          $('#bayar').val(totalBayar);
        });
      });

      $(function () {
          $('#pesananSukses, #main, #pesanan, #listMenu').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
          })
        });
    </script>
  </body>
</html>
