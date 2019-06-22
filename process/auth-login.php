<?php session_start();

// check the data was submitted or not
if (isset($_POST['login'])) {
  // if yes, do these...
  // call database connection
  require_once '../config/database.php';

  // retrive data from `login` form
  $email    = mysqli_real_escape_string($db, $_POST['email']);
  $pasword  = mysqli_real_escape_string($db, md5($_POST['password']));
  $remember = (isset($_POST['remember_me'])) ? 'yes' : 'no';

  // matching data from database
  $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$pasword'";
  $sql   = mysqli_query($db, $query);
  $user  = mysqli_fetch_assoc($sql);

  // create user session
  if (mysqli_num_rows($sql) > 0) {
    $_SESSION['logged_user'] = array(
      'auth'     => uniqid(),
      'username' => $user['username'],
      'level'    => $user['level']
    );

    header('location: http://localhost/restosaya/');
  } else {
    // if `user` data not found, redirect to `login` page
    header('location: http://localhost/restosaya/resto-login.php?status=0');
  }
} else {
  // if not, redirect to `login` page
  header('location: http://localhost/restosaya/');
}
