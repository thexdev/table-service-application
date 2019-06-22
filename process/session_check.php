<?php

// check if user already exist
if (isset($_SESSION['logged_user'])) {
  // if yes, redirect user to its page (admin / kasir)
  if ($_SESSION['logged_user']['level'] === 'admin') {
    // if user as `admin`
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=main');
  }
  else {
    // if user as `kasir`
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=main');
  }
}
else {
  // if not, redirect to login page
  header('location: http://localhost/restosaya/resto-login.php');
}
