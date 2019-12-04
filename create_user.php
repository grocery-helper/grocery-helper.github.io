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
  echo "Connected successfully";

  function isUserExists($username, $conn)
  {
    $result = mysqli_query($conn, "SELECT * FROM User WHERE Username = $username");
    return mysqli_num_rows($result);
  }

  function isSQLCommandSuccessful($sql, $conn)
  {
    return $conn->query($sql);
  }

  if(isUserExists($name, $conn) == 0) //need to get $name from somewhere?
  {
    $timestamp = date("Y/m/d");
    $sql = "INSERT INTO User (Username, Password, CreationDate)
    VALUES ('$name', '$pass', '$timestamp')";
    if (isSQLCommandSuccessful($sql, $conn)) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else
  {
    echo "This username has already been taken";
  }
mysqli_close($conn);
?>
