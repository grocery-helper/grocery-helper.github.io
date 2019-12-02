<?php

  include 'db_connection.php';

  //inputs: food item name
  //usage: check if food item is in favorites list
  function isItemExistsinFavorites($user, $item)
  {
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM Favorites WHERE Username = '$user' AND
        FoodName = '$item'");
    return mysqli_num_rows($result);
  }

  //inputs: username, food item name
  //usage: to add items from inventory list to favorites list
  function onFavoritesAddInventoryItem($conn, $user, $item)
  {
    global $conn;
    if(isItemExistsinFavorites($user, $item) > 0)
    {
      echo "This item is already in your favorites";
    }
    else
    {
      $sql = "INSERT INTO Favorites (Username, FoodName, Quantity, ShelfLifeInDays) SELECT
          Username, FoodName, Quantity, ShelfLifeInDays FROM Inventory WHERE Username = '$user'
          AND FoodName = '$item'";
      mysqli_query($conn, $sql);
    }
  }

  //inputs: username, food item name
  //usage: to add items from grocery list to favorites list
  function onFavoritesAddGroceryListItem($user, $item)
  {
    global $conn;
    if(isItemExistsinFavorites($user, $item) > 0)
    {
      echo "This item is already in your favorites";
    }
    else
    {
      $sql = "INSERT INTO Favorites (Username, FoodName, Quantity, ShelfLifeInDays) SELECT
          Username, FoodName, Quantity, ShelfLifeInDays FROM GroceryList WHERE Username = '$user'
          AND FoodName = '$item'";
      mysqli_query($conn, $sql);
    }
  }

  //inputs: username, food item name, $quantity
  //usage: to add item from food items list to favorites list
  function onFavoritesAddFoodItem($user, $item, $quantity)
  {
    global $conn;
    if(isItemExistsinFavorites($user, $item) > 0)
    {
      echo "This item is already in your favorites";
    }
    else
    {
      mysqli_query($conn, "INSERT INTO Favorites (Username, FoodName) VALUES '$user', '$item'");
      mysqli_query($conn, "UPDATE Favorites SET Quanity = '$quanity' WHERE Username = '$user'
          AND FoodName = '$item'");
      $result = mysqli_query($conn, "SELECT ShelfLifeInDays FROM FoodItems WHERE FoodName = '$item'");
      $daysToExpr = mysqli_fetch_field($result);
      mysqli_query($conn, "UPDATE Favorites SET ShelfLifeInDays = '$daysToExpr' WHERE Username = '$user'
          AND FoodName = '$item'");
    }
  }
?>
