//meat
//vegetables
//non-meat protein
//fruit
//condiment, seasoning
//dessert
//seafood
//miscellaneous
//dairy

<?php

  include 'db_connection.php';

  $foodCategory = array("Meat", "Vegetable", "Non-Meat Protein", "Fruit", "Condiment", "Seasoning", "Dessert",
                        "Seafood", "Dairy", "Miscellaneous");

  getFoodItemsByCategory($category)
  {
    $sql = "SELECT FoodName FROM FoodItems WHERE FoodCategory = $category";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    return $rows;
  }

  getFoodItems()
  {
    $foodItemsbyCategory = array();
    foreach ($foodCategory as $group) {
      $foodItemsbyCategory[] = getFoodItemsByCategory($group);
    }
    return json_encode($foodItemsbyCategory);
  }

  getFoodItems();

  $conn->close();

?>
