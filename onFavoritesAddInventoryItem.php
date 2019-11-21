<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'addTo_Favorites.php';

  onFavoritesAddInventoryItem($user, $item);

  $conn->close();
 ?>
