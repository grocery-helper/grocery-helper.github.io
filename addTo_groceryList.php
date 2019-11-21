<?php
  //TO DO: add feature to add items from favorites to grocery list

  //INPUTS
  $user = $_POST["username"];
  $item = $_POST["foodname"];
  $quantity = $_POST["amount"];

  include 'db_connection.php';

  //return: BOOL
  //        True - food item already exists in Grocery List
  //        False - food item does not exist in Grocery List
  function isItemExists($user, $item)
  {
    $result = mysqli_query($conn, "SELECT * FROM GroceryList WHERE Username = $user AND
        FoodName = $item");
    return mysqli_num_rows($result);
  }


  function onGroceryListInsertFoodItem($user, $item, $quantity)
  {
    $sql = "INSERT INTO GroceryList (Username, FoodName) VALUES $user, $item ";
    mysqli_query($conn, $sql);

    $sql = "SELECT ShelfLifeInDays FROM FoodItems WHERE FoodName = $item";

    if ($result = mysqli_query($conn, $sql)) {
        $shelfLife = mysqli_fetch_field($result);
        mysqli_query($conn, "UPDATE GroceryList SET Quantity = $quantity, ShelfLifeInDays = $shelfLife
            WHERE Username = $user AND FoodName = $item");
        echo "Item added successfully";
    } else {
        echo "Error adding item: " . $conn->error;
    }
  }


  function onGroceryListUpdateFoodItem($user, $item, $quantity)
  {
    $sql = "SELECT Quantity FROM GroceryList WHERE Username = $user AND
        FoodName = $item";
    $result = mysqli_query($conn, $sql);
    $curQuanity = mysqli_fetch_field($result);
    $newQuantity = $quanity + $curquantity;
    $sql = "UPDATE GroceryList SET Quantity = $newQuantity WHERE Username = $user AND
        FoodName = $item";

    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully";
    } else {
        echo "Error updating item: " . $conn->error;
    }
  }

  //ADDING ITEM TO GROCERY LIST FROM FAVORITES LIST
  function onGroceryListInsertFavoritesItem($user, $item, $quantity)
  {
    if(isItemExists($user, $item) == 0)
    {
      $sql = "INSERT INTO GroceryList (Username, FoodName, Quantity, ShelfLifeInDays)
          SELECT Username, FoodName, Quantity, ShelfLifeInDays FROM Favorites WHERE
          Username = $user and FoodName = $item";

      if ($conn->query($sql) === TRUE) {
          echo "Item added successfully";
      } else {
          echo "Error adding item: " . $conn->error;
      }
    }
  }


?>
