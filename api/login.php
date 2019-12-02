<?php
  header('Access-Control-Allow-Origin: *');
  //USER INPUTS
  $name = $_POST["username"];
  $pass = $_POST["pwd"];

  include 'config.php';

  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  // // Check connection
  if ($conn->connect_errno) {
      die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";

  function isUserExists($username, $conn)
  {
    $result =  $conn->query("SELECT * FROM User WHERE Username = '$username'");
    if ($result) {
      $numRows = mysqli_num_rows($result);
      if ($numRows > 0) {
        return true;
      } else {
        return false;
      }

    } else {
      echo("doesn't, work");
      return false;
    }
  }

function getPassword($result) {
  $password = "";
  while($row = $result->fetch_assoc()) {
      $password = $row["Password"];
      return $password;
  }
}

function doPasswordsMatch($password, $pass){
  if ($password == $pass) {
    return true;
  } else {
    return false;
  }
}
  if(isUserExists($name, $conn) == 1)
  {
    $sql = "SELECT Password from User WHERE Username = '$name'";
    $result = $conn->query($sql);
    $password =  getPassword($result);

    if (doPasswordsMatch($password, $pass)) {
      echo("ok");
    } else {
      echo("error");
    }
  } else {
    echo('error');
  }
?>
