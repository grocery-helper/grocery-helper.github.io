<?php
include 'config.php';
include 'db_connection.php';
// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
<html>
console.log("Connected successfully");
</html>

?>

<!DOCTYPE html>
<html>
<head>

  <title>Grocery Helper</title>
  <!-- SEO -->
  <meta charset="utf-8" http-equiv="content-type" content="text/html">
  <meta name="keywords"  content="grocery, helper, grocery helper, grocery app, Santa Clara University, SCU, Santa Clara">
  <meta name="description" content="Grocery Helper enhances your grocery shopping experience by keeping track of when items will expire so, you don't have to!">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="bootstrap-social.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="customPageStyle.css">

  <!-- JQuery -->
  <script type="text/javascript" src='main.js'></script>

  <!-- FONT AWESOME -->
  <!-- <script src="https://kit.fontawesome.com/504d9a3113.js"></script> -->
</head>



<body>

  <!-- NAVBAR -->
  <!-- expands on small; dark theme; stays on top -->
  <!-- bg-dark navbar-dark -->
  <nav class="navbar navbar-expand-sm  fixed-top">
    <a class="navbar-brand" href="#">Grocery Helper</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- links to collapse; justify-content-end aligns to right -->
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">

      <ul class="navbar-nav stroke">
        <li class="navbar-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="helpPage.html">Help</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewLists.html">My Lists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"href="login.html">Login</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container-fluid">
    <img src="logo.png" class="centerSmall">

    <div class="containerSmall">
    </div>

    <div class="row">
      <!-- grocery list -->
      <div class="column" style="background-color:rgb(211, 236, 232)">
        <h2><center>Your List</center></h2>
        <p>

          <div id="myDIV" class="header">
            <input type="text" id="myInput" placeholder="Enter item">
            <input type="text" id="numItem" placeholder="Enter quantity">
            <br>
            <span onclick="newElement()" class="addBtn">Add Item</span>
            <!-- <input onclick="newElement()" class="addBtn" value="Add Item" type = "submit"> -->
          </div>

          <ul id="listUL" >
            <li>eggs<span class="quantity"> </span> <span class="close">×</span></li>
            <li class="checked">bread<span class="close">×</span></li>
            <li>apples<span class="quantity"><span class="close">×</span></li>
          </ul>


          <script type="text/javascript">
          // Create a "close" button and append it to each list item
          var myNodelist = [document.getElementById("listUL")]; // document.getElementsByTagName("LI");
          var i;
          for (i = 0; i < myNodelist.length; i++) {
            var span = document.createElement("SPAN");
            var txt = document.createTextNode("\u00D7");
            span.className = "close";
            span.appendChild(txt);
            myNodelist[i].appendChild(span);
          }

          // Click on a close button to hide the current list item
          var close = document.getElementsByClassName("close");
          var i;
          for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
              var div = this.parentElement;
              div.style.display = "none";
            }

          }

          // Add a "checked" symbol when clicking on a list item
          var list = document.querySelector("#listUL");
          list.addEventListener('click', function(ev) {
            if (ev.target.tagName === 'LI') {
              ev.target.classList.toggle('checked');
            }
            // Add to inventory table
            var table = document.getElementById("inventoryList");
            var row = table.insertRow(1);
            var newItem = row.insertCell(0);
            var expDate = row.insertCell(1);
            var addStar = row.insertCell(2);
            var addTrash = row.insertCell(3);

            //newItem.innerHTML = ev.target.innerHTML;

            //get item name
            var getItem = ev.target.innerHTML.toString();
            var i = 0;
            var addItem ="";
            while (getItem[i] != '<') {
              addItem = addItem.concat(getItem[i]);
              i++;
            }

            //get item expiration date
            <?php
              include 'addTo_groceryList.php';

              if(isItemExists($user, addItem))

             ?>

            newItem.innerHTML = String(addItem);
            //newItem.innerHTML = "newItem";
            expDate.innerHTML = "  days left";
            addStar.innerHTML = "<input type=\"checkbox\" class =\"use-address\">";
            addTrash.innerHTML = "<input type=\"checkbox\" onclick=\"deleteRow(this)\">";
            console.log(row);
          }, false);



          // Create a new list item when clicking on the "Add" button
          function newElement() {
            var li = document.createElement("li");
            var inputValue = document.getElementById("myInput").value;
            var numValue = document.getElementById("numItem").value;
            var t = document.createTextNode(inputValue);

            //console.log(t);
            //li.appendChild(t);
            // $("#listUL").append('<li>'+inputValue+'<span class="quantity"><input id="numberOfItem" type="number" value="1"> </span><span class="close">×</span></li>');
            if (inputValue === '') {
              alert("You must write something!");
            } else {
              //document.getElementById("listUL").appendChild(li);
              if (numItem === '') {
                $("#listUL").append('<li>'+inputValue+ '<span class="close">×</span></li>');
              } else {
                $("#listUL").append('<li>'+inputValue+ " (" + numValue + ")" + '<span class="close">×</span></li>');
              }
            }
            document.getElementById("myInput").value = "";
            document.getElementById("numItem").value = "";

            for (i = 0; i < close.length; i++) {
              close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
              }
            }
          }
        </script>

      </p>
    </div>
    <!-- inventory -->
    <div class="column" style="background-color:rgb(188, 237, 228);">

      <h2><center>Inventory</center></h2>

      <table id="inventoryList">
        <tr>
          <th>Item</th>

          <th>Days until expiration</th>
          <th>⭐</th>
          <th>🗑️</th>
        </tr>
        <tr>
          <td>bananas</td>
          <td>3 days</td>
          <td><input type="checkbox" class = "use-address"></td>
          <td><input type="checkbox" onclick="deleteRow(this)"/></td>
        </tr>
        <tr>
          <td>cheddar cheese</td>
          <td>21 days</td>
          <td><input type="checkbox" class = "use-address"></td>
          <td><input type="checkbox" onclick="deleteRow(this)"/></td>
        </tr>
      </table>

      <script type="text/javascript">
      function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
      }


      $('.use-address').click(function () {
        var id = $(this).closest("tr").find('td:eq(0)').text();
        addToFav(id);
      });


      function addToFav(id){
        // Add to favorites table
        var table = document.getElementById("favoritesList");
	
<?php
	$sql = "INSERT INTO Favorites (FoodName) VALUES ('$id')";
	mysqli_query($conn, $sql);
	
	$sql = "SELECT FoodName FROM Favorites";
	$result = $conn->query($sql);
	if ($result->num_rows == 0){	// look for duplicates in favorites before adding new item

        	var row = table.insertRow(1);
        	var starBullet = row.insertCell(0);
        	var itemName = row.insertCell(1);
        	var addTrash = row.insertCell(2);
        	starBullet.innerHTML = "⭐";
        	console.log(id);
        	itemName.innerHTML = id;
        	addTrash.innerHTML = "<input type=\"checkbox\" onclick=\"deleteRow(this)\"/>";
        	//also add to grocery list
        	var ul = document.getElementById("listUL");
        	var li = document.createElement("li");
        	$("#listUL").append('<li>'+String(id)+'<span class="close">×</span></li>');
	}
?>

      }
      </script>

    </div>

    <!-- favorites -->
    <div class="column" style="background-color:rgb(157, 236, 222);">

      <h2><center>Favorites</center></h2>

      <table id="favoritesList">
        <col width="5">
        <col width="200" style="text-align:left">
        <col width="30" style="text-align:right">
        <tr>
          <th></th>
          <th></th>
          <th>🗑️</th>
        </tr>
        <tr>
          <td>⭐</td>
          <td>eggs</td>
          <td><input type="checkbox" onclick="deleteRow(this)"/></td>
        </tr>
        <tr>
          <td>⭐</td>
          <td>apples</td>
          <td><input type="checkbox" onclick="deleteRow(this)"/></td>


        </tr>

        <script type="text/javascript">
        function deleteRow(btn) {
          var row = btn.parentNode.parentNode;
          row.parentNode.removeChild(row);
        }
        </script>

      </div>

    </div>

  </div>

  <!-- <div class="middle"></div> -->


  <!-- FOOTER OR CONTACT-->

</body>
</html>
