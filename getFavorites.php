<?php

  $user = $_GET["username"];

  include 'db_connection.php';

  getFavorites($user)
  {
    $sql = "SELECT FoodName FROM Favorites WHERE Username = $user";
    $result = mysqli_query($conn, $sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    return json_encode($rows);
  }

  getFavorites($user);

  $conn->close();

?>
