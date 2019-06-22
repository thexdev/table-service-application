<?php session_start();
// check if user has already login or not
if (isset($_SESSION['logged_user'])) {
  // if yes, redirect to its page (admin / kasir)
  header('location: http://localhost/restosaya');
} ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once '_includes/head.php'; ?>
    <link rel="stylesheet" href="http://localhost/restosaya/assets/custom/css/resto-login.css">
    <style type="text/css">
      .alert {
        cursor: pointer;
      }
    </style>
    <title>Restosaya | login</title>
  </head>
  <body class="bg-primary">
    <div class="container">
    <?php if (isset($_GET['status'])) : ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-danger text-center">
          <strong>Username</strong> atau <strong>Password</strong> salah!
        </div>
      </div>
    <?php endif; ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel">
            <div class="panel-body">
              <form role="form" action="process/auth-login.php" method="post">
                <div class="form-group text-center">
                  <h2><span class="glyphicon glyphicon-cutlery"></span> Restosaya</h2><hr>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Your email" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" id="password" type="password" name="password" placeholder="Your password" autocomplete="off" required>
                </div>
                <div class="form-group text-center">
                  <label id="remember_me"><input id="remember_me" type="checkbox" name="remember_me" value="yes"> Remember Me</label>
                </div>
                <div class="form-footer text-center">
                  <button class="btn btn-md btn-success" type="submit" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once '_includes/jslibrary.php'; ?>
    <script type="text/javascript">
      let alert = $('.alert');

      setTimeout(function () {
          alert.fadeOut('medium');
        }, 4000);

      alert.on('click', function () {
        alert.fadeOut('medium');
      });
    </script>
  </body>
</html>
