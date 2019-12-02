
<?php

  include 'db_connection.php';

  $foodCategory = array("Meat", "Vegetable", "Non-Meat Protein", "Fruit", "Condiment", "Seasoning", "Dessert",
                        "Seafood", "Dairy", "Miscellaneous");

  function getFoodItemsByCategory($category){
    $result = mysqli_query($conn, "SELECT FoodName FROM FoodItems WHERE FoodCategory = $category");
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){
        $rows[] = $r;
    }
    return $rows;
  }

  function getFoodItems($conn){
    $foodItemsbyCategory = array();
    /*
    foreach ($foodCategory as $group) {
      print "$group\n";
      $foodItemsbyCategory[] = getFoodItemsByCategory($group);
    }*/
    $result = mysqli_query($conn, 'SELECT FoodName FROM FoodItems ORDER BY FoodCategory');
    while($r = mysqli_fetch_assoc($result)){
        $foodItemsbyCategory[] = $r;
    }
    print json_encode($foodItemsbyCategory, JSON_PRETTY_PRINT);

    //print json_encode($foodItemsbyCategory);
  }

  getFoodItems($conn);

  mysqli_close($conn);

?>
