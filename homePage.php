<html>
<head>
  <title>Grocery Helper</title>
  <style>
  * {
    box-sizing: border-box;
  }
  .column {
    float: left;
    width: 50%;
    padding: 10px;
  }
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
</style>
</head>

<body>
  <h1>Welcome to Grocery Helper</h1>
  <br>
  <br>


  <form action = "/homePage.php">
    Add item to list:
    <input type="text" name="$itemToAdd" size="80" value="<?php echo $thepassedurl; ?>" >
    <br>
    <input type="submit" value="Add item to list" >
  </form>

  <?php
  //Create a variable with a hard-wired value/url.

  // If there is a passed variable, we will run the following:
  $list = array()
  if(isset($itemToAdd)) {
    echo '<br>';
    echo "We have added an item to the list";
    echo '<br>';
    array_push($list, $itemToAdd);
  }


  ?>



  <div class="row">
    <div class="column" style="background-color:#C4EBFF;">
      <h3>Add a Checkbox to each term within a FORM: </h3>

      <?php
      foreach ($list as $item) {
        echo '<form action = "/homePage.php" method = "get" >';
        echo  '<input type="checkbox" name="checkbox_word[]" value="+'.$item.'" > '.$item.'<br>';
      }
      echo '<input type="submit" name="submit_checked" value="Done" />';
      echo '</form>';
      ?>

    </div>
    <div class="column" style="background-color:#C4FAFF;">

      <h3>Now we have our purchased items!</h3>


    </div>
  </div>

  <h3>189) end of page </h3>


</body>
</html>
