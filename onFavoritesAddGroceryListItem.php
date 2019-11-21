<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'addTo_Favorites.php';

  onFavoritesAddGroceryListItem($user, $item);

  $conn->close();
 ?>
