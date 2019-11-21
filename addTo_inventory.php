<?php
  // TO DO: remove food item from grocery list when item added to inventory

  $user = $_POST["username"];
  $item = $_POST["foodname"];

  include 'db_connection.php';
  include 'deleteFrom_groceryList.php';
  //move items from grocery list to inventory

  //if item on grocery list is marked then copy entry into inventory
  function setPurchaseDate($user, $item)
  {
    $today = date("Y/m/d");
    mysqli_query($conn, "UPDATE Inventory SET PurchaseDate = $today WHERE Username = $user AND FoodName = $item");
    return $today;
  }

  function getShelfLife($user, $item)
  {
    $result = mysqli_query($conn, "SELECT ShelfLifeInDays FROM FoodItems WHERE FoodName = $item");
    $daysToExpr = mysqli_fetch_field($result);
    return $daysToExpr;
  }

  function setExpDate($user, $item, $today)
  {
    $shelfLife = getShelfLife($user, $item);

    if($shelfLife > 1)
    {
      $expiration = strtotime("+$daysToExpr days", strtotime($today));
    }
    else
    {
      $expiration = strtotime("+$daysToExpr day", strtotime($today));
    }

    $sql = "UPDATE Inventory SET ExpDate = $expiration WHERE FoodName = $item AND Username = $user";
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully";
    } else {
        echo "Error adding item: " . $conn->error;
    }
  }

  function onInventoryAddGroceryItem($user, $item)
  {
    $sql = "INSERT INTO Inventory (Username, FoodName, Quantity, ShelfLifeInDays) SELECT
        Username, FoodName, Quantity, ShelfLifeInDays FROM GroceryList WHERE Username = $user
        AND FoodName = $item";

    mysqli_query($conn, $sql);

    $today = setPurchaseDate($user, $item);

    setExpDate($user, $item, $today);

    //remove item from grocery list
    onGroceryListRemoveItem($user, $item);

  }

?>
