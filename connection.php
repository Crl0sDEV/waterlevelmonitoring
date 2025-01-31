<?php
  // Database credentials
  $host = 'sql307.infinityfree.com';
  $username = 'if0_37733364';
  $password = '7wB3gVi5rywa';
  $database = 'if0_37733364_water_level';

  // Create a database connection
  $conn = mysqli_connect($host, $username, $password, $database);

  // Check if the connection is successful
  if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
  }
?>

