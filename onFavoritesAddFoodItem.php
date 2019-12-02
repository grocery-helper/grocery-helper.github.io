<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];
  $quanity = $_POST["amount"];

  include 'addTo_Favorites.php';

  onFavoritesAddFoodItem($user, $item, $quantity);

  mysqli_close($conn);
 ?>
