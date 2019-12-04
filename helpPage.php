<?php

session_start();

$db_host = 'remotemysql.com';
$db_user = 'PVhTrKWdPv';
$db_pass = 'FaPy0Vt6oB';
$db_name = 'PVhTrKWdPv';
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connected successfully";
}
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
	<link rel="stylesheet" type="text/css" href="helpPageStyle.css">

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
					<?php
					if ( isset( $_SESSION['user'] ) ) {
						?>
						<a class="nav-link"href="logout.php">Logout</a>
						<?php
					} else {
						?>
						<a class="nav-link"href="loginPage.php">Login</a>
						<?php
					}
					?>
				</li>
			</ul>
		</div>
	</nav>


	<div class="container-fluid">
		<img src="logo.png" class="centerSmall">

		<div class="containerSmall">
			<h3>Welcome to Grocery Helper.</h3>
			<p>Making lists with Grocery Helper is easy!</p>
			<p>Press on any help button to learn more about that feature.</p>
		</div>

		<div class="row">
			<!-- grocery list -->
			<div class="column" style="background-color:rgb(211, 236, 232)">
				<h2><center>Your List<br>
					<a href="#" data-toggle="popover" title="Making your lists"
					data-content="This is where you can add items to your list!
					Select the items you want to purchase.
					When you purchase your item, it will be saved in your inventory.">
					<button type="button" class="btn btn-info">Help me make a list!</button></a>

				</center></h2>

				<p>Here are items you can add</p>

				<?php
				include 'db_connection.php';

				$foodCategory = array('Meat', 'Vegetable', 'Non-Meat Protein', 'Fruit', 'Condiment', 'Seasoning', 'Dessert',
				'Seafood', 'Dairy', 'Miscellaneous','Beverage');

				$message = "";

				if(isset($_POST['submit']))
				{
					if(isset($_POST['items']))
					{
						foreach($_POST['items'] as $item)
						{
							$message .= "$item ";
						}
					}
					else
					{
						$message .= "Select an option first!";
					}
				}

				$messages = "";
				$messages .= $message;
				echo "<form action='' method='POST'>";
				foreach($foodCategory as $group)
				{
					$result = mysqli_query($conn, "SELECT FoodName FROM FoodItems WHERE FoodCategory = '$group'");
					echo "<h5>";
					echo "$group: ";
					echo "</h5>";
					//echo "<br>";
					echo "<select name='items[]' multiple size = 13>";
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<option value ='" . $row['FoodName'] . "'>" . $row['FoodName']. "</option>";
					}

					echo "</select>";
					echo "<br>";
					echo "<br>";
				}

				echo "<input type='submit' name='submit'/>";
				echo "</form>";
				//mysqli_close($conn);
				?>

			</div>
			<!-- inventory -->
			<div class="column" style="background-color:rgb(188, 237, 228);">
				<h2><center>Inventory<br>
					<a href="#" data-toggle="popover" title="Your Inventory"
					data-content="This is where you can view items that you currently have.
					starring items (⭐) adds them to your favorites list.
					When you run out of an item, remove it from your list (🗑️).">
					<button type="button" class="btn btn-info">What's in my inventory?</button></a></center></h2>
					<p>Items you already have.</p>

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

						<?php

						if(isset($_POST['submit']))
						{
							if(isset($_POST['items']))
							{
								foreach($_POST['items'] as $item)
								{

									// $sql = "INSERT INTO GroceryList (Username, FoodName) VALUES '$user', '$item'";
    							// mysqli_query($conn, $sql);

									echo "<tr>";
									echo "<td>";
									print "$item";
									echo "</td>";
									echo "<td>";

									//$result = mysqli_query("SELECT ExpDate FROM FoodItems WHERE User = $user AND FoodName= '$item'");
									$result = mysqli_query($conn, "SELECT * FROM FoodItems WHERE FoodName= '$item'");
									$row = mysqli_fetch_assoc($result);

									print $row['ShelfLifeInDays'];
									echo " days";
									echo "</td>";
									echo "<td><input type=\"checkbox\" class = \"use-address\"></td>";
									echo "<td><input type=\"checkbox\" onclick=\"deleteRow(this)\"/></td>";
									echo "</tr>";

									//add to db
									$sql = "INSERT INTO Inventory (Username, FoodName, Quantity, ShelfLifeInDays) SELECT
							        Username, FoodName, Quantity, ShelfLifeInDays FROM GroceryList WHERE FoodName = '$item'";
							    mysqli_query($conn, $sql);
							    //$today = setPurchaseDate($user, $item);
							    //setExpDate($user, $item, $today);

								}
							}
							else
							{
								echo "alert('Select an option first!')";
							}
						}

						?>
					</table>
					<script>

					$('.use-address').click(function () {
						var id = $(this).closest("tr").find('td:eq(0)').text();
						addToFav(id);
					});

					function addToFav(id){
						// Add to favorites table
						var table = document.getElementById("favoritesList");
						var row = table.insertRow(1);
						var starBullet = row.insertCell(0);
						var itemName = row.insertCell(1);
						var addTrash = row.insertCell(2);
						starBullet.innerHTML = "⭐";
						itemName.innerHTML = id;
						console.log(id);
						addTrash.innerHTML = "<input type=\"checkbox\" onclick=\"deleteRow(this)\"/>"
						//also add to grocery list
						var ul = document.getElementById("listUL");
						var li = document.createElement("li");
						$("#listUL").append('<li>'+String(id)+'<span class="quantity"><span class="close">×</span><input id="numberOfItem" type="number" value="1"></li>');

					}
					</script>

				</div>

				<!-- favorites -->
				<div class="column" style="background-color:rgb(157, 236, 222);">
					<h2><center>Favorites<center>
						<a href="#" data-toggle="popover" title="Your Favorites"
						data-content="These items will always be added to your grocery list.
						You can add items to your by starring them and remove them at any time.">
						<button type="button" class="btn btn-info">What are your favorites?</button></a></center></h2>
						<p>Your favorte items</p>

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

							<script>
							function deleteRow(btn) {
								var row = btn.parentNode.parentNode;
								row.parentNode.removeChild(row);
							}
							</script>

						</div>

						<script>
						$(document).ready(function(){
							$('[data-toggle="popover"]').popover();
						});
						</script>

					</div>

				</div>

			</body>
			</html>
