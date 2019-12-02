<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'addTo_GroceryList.php';

  if(isItemExists($user, $item) > 0)
  {
    onGroceryListInsertFavoritesItem($user, $item, $quantity);
  }
  else
  {
    onGroceryListUpdateFoodItem($user, $item, $quantity);
  }


  mysqli_close($conn);

?>
