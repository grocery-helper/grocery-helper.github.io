<?php

$user = $_POST["username"];
$item = $_POST["foodname"];
$expiration = $_POST["expDate"]; //"YYYY-MM-DD"

include "config.php";

onInventoryItemChangeExprDate($user, $item, $expDate)
{
  $sql = "UPDATE Inventory SET ExpDate = $expDate WHERE Username = $user AND FoodName = $item";
  if ($conn->query($sql) === TRUE) {
      echo "Expiration date updated successfully";
  } else {
      echo "Error updating expiration date: " . $conn->error;
  }
}

onInventoryItemChangeExprDate($user, $item, $expiration);

$conn->close();

?>
