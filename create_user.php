<?php
  //USER INPUTS
  $name = $_POST["username"];
  $pass = $_POST["pwd"];
  header('Access-Control-Allow-Origin: *');
  include 'db_connection.php';

  function plsWork() {
      echo "hi :)";
  }
  function isUserExists($username)
  {
    $result = mysqli_query($conn, "SELECT * FROM User WHERE Username = $username");
    return mysqli_num_rows($result);
  }

  function isSQLCommandSuccessful($sql)
  {
    return $conn->query($sql);
  }

  if(isUserExists($name) == 0) //need to get $name from somewhere?
  {
    $timestamp = date("Y/m/d");
    $sql = "INSERT INTO User (Username, Password, CreationDate)
    VALUES ($name, $pass, $timestamp)";

    if (isSQLCommandSuccessful($sql)) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else
  {
    echo "This username has already been taken";
  }
  $conn->close();
?>
