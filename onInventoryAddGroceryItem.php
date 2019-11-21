<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'addTo_inventory.php';

  onInventoryAddGroceryItem($user, $item);

  $conn->close();

?>
