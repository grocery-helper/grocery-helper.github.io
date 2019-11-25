<?php
$user = $_POST["username"];
$item = $_POST["foodname"];

include 'db_connection.php';

function onInventoryRemoveItem($user, $item)
{
  $sql = "DELETE FROM Inventory WHERE Username = $user AND FoodName = $item";
  if ($conn->query($sql) === TRUE) {
      echo "Item deleted successfully";
  } else {
      echo "Error deleting item: " . $conn->error;
  }
}

onInventoryRemoveItem($user, $item);

?>
