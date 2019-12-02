<?php
  //USER INPUTS
  $name = $_POST["username"];
  $pass = $_POST["pwd"];

  include 'db_connection.php';

  function isUserExists($username)
  {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM User WHERE Username = $username");
    return mysqli_num_rows($result);
  }

  function isSQLCommandSuccessful($sql)
  {
    global $conn;
    return mysqli_query($conn, $sql) == TRUE;
  }

  if(isUserExists($name) == 0) //need to get $name from somewhere?
  {
    global $conn;
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
  mysqli_close($conn);
?>
