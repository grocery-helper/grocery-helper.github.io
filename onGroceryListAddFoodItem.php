<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];
  $quanity = $_POST["amount"];

  include 'addTo_GroceryList.php';

  if(isItemExists($user, $item) > 0)
  {
    onGroceryListInsertFoodItem($user, $item, $quantity);
  }
  else
  {
    onGroceryListUpdateFoodItem($user, $item, $quantity);
  }

  $conn->close();

?>
