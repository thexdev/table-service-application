<?php session_start();

// delete user session
session_destroy();

// redirect to `index.php`
header('location: http://localhost/restosaya/');
