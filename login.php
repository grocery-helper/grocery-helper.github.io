<?php
  header('Access-Control-Allow-Origin: *');
  //USER INPUTS
  $name = $_POST["username"];
  $pass = $_POST["pwd"];

  include 'config.php';
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  // // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  function isUserExists($username, $conn)
  {
    $result = mysqli_query($conn, "SELECT * FROM User WHERE Username = $username");
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
      return true;
    } else {
      return false;
    }
  }


  if(isUserExists($name, $conn) == 0)
  {
    $sql = "SELECT Password from User WHERE Username = '$name'";
    $result = $conn->query($sql);
    $password = "";
    while($row = $result->fetch_assoc()) {
        $password = $row['Password'];
    }
    if ($password = "") {
      echo("error");
    }
    else if ($password == $pass) {
      echo("ok");
    } else {
      echo("error");
    }
  }
?>
