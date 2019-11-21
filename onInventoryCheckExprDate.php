<?php
  $user = $_POST["username"];

  function daysTilExpr($exprDate)
  {
    // Calulating the difference in timestamps
    $diff = strtotime(date("Y/m/d")) - strtotime($exprDate);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return round($diff / 86400);
  }

  $result = mysqli_query("SELECT * FROM Inventory WHERE User = $user ORDER BY ExpDate Desc");
  $queryResultArray = mysql_fetch_array($result);
  foreach($queryResultArray as $row)
  {
    $dateDiff = daysTilExpr($row['ExpDate']);
    if($dateDiff > 3)
      break;
    if($dateDiff < 0)
      $absDateDiff = abs($dateDiff);
      echo "item has been expired for $absDateDiff days";
    if($dateDiff <= 3 && $dateDiff >= 1)
      echo "$dateDiff days until expiration";
    else
      echo "today is the expiration date";
  }
?>
