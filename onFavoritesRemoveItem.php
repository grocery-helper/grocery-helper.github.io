<?php
$user = $_POST["username"];
$item = $_POST["foodname"];

include 'db_connection.php';

function onFavoritesRemoveItem($user, $item)
{
  $sql = "DELETE FROM Favorites WHERE Username = $user AND FoodName = $item";
  if ($conn->query($sql) === TRUE) {
      echo "Item deleted successfully";
  } else {
      echo "Error deleting item: " . $conn->error;
  }
}

onFavoritesRemoveItem($user, $item);

?>
