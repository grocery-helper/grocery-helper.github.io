<?php
echo $_POST["myInput"];
$user = $_POST["username"];
$item = $_POST["foodname"];
$quanity = $_POST["amount"];

include 'addTo_groceryList.php';


if(isItemExists($user, $_POST["myInput"]) > 0)
{
  onGroceryListInsertFoodItem($user, $_POST["myInput"], $_POST["numItem"]);
}
else
{
  echo "checking if "+ $_POST["myInput"]+"is in db";
  onGroceryListUpdateFoodItem($user, $_POST["myInput"], $_POST["numItem"]);
}

$conn->close();

?>
