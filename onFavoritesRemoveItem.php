<?php
$user = $_POST["username"];
$item = $_POST["foodname"];

include 'db_connection.php';

function onFavoritesRemoveItem($user, $item)
{
  global $conn;
  $sql = "DELETE FROM Favorites WHERE Username = '$user' AND FoodName = '$item'";
  if (mysqli_query($conn, $sql)) {
      echo "Item deleted successfully";
  } else {
      echo "Error deleting item: ";
  }
}

onFavoritesRemoveItem($user, $item);

?>
