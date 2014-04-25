<?php
function connect(){
  $conn=mysqli_connect("127.0.0.1","root","","test");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  $conn->set_charset("utf8");
  return $conn;
}
?>