

<?php

  include 'db_connection.php';

  $foodCategory = array('Meat', 'Vegetable', 'Non-Meat Protein', 'Fruit', 'Condiment', 'Seasoning', 'Dessert',
                        'Seafood', 'Dairy', 'Miscellaneous','Beverage');

  function getFoodItemsByCategory($conn, $category){
    $result = mysqli_query($conn, "SELECT FoodName FROM FoodItems WHERE FoodCategory = '$category'");
    $rows = array();
    while($r = mysqli_fetch_assoc($result)){
        $rows[] = $r;
    }
    return $rows;
  }

  function getFoodItems($conn, $foodCategory){
    $foodItemsbyCategory = array();

    foreach($foodCategory as $group) {
      $foodItemsbyCategory[] = getFoodItemsByCategory($conn, $group);
    }
    print json_encode($foodItemsbyCategory, JSON_PRETTY_PRINT);
  }

  getFoodItems($conn, $foodCategory);

  mysqli_close($conn);

?>
