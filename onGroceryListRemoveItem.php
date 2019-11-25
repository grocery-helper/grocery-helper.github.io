<?php
  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'db_connection.php';

  function onGroceryListRemoveItem($user, $item)
  {
    $sql = "DELETE FROM GroceryList WHERE Username = $user AND FoodName = $item";
    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }
  }

  onGroceryListRemoveItem($user, $item);

?>
