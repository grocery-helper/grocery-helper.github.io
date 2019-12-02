<?php

  $user = $_GET["username"];

  include 'db_connection.php';

  function getInventory($user)
  {
    global $conn;
    $sql = "SELECT FoodName, Quantity, ExpDate FROM Inventory WHERE Username = '$user'";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    return json_encode($rows);
  }

  getInventory($user);

  mysqli_close($conn);
?>
