<?php

  $user = $_GET["username"];

  include 'db_connection.php';

  function getGroceryList($user)
  {
    global $conn;
    $sql = "SELECT FoodName, Quantity FROM GroceryList WHERE Username = '$user'";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    return json_encode($rows);
  }

  getGroceryList($user);

  mysqli_close($conn);
?>
