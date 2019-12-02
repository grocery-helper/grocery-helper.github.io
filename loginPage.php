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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="loginStyle.css">

	<!-- JQuery -->
	<script type="text/javascript" src='login.js'></script>


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
				<a class="nav-link" href="index.php">Home</a>
			</li>
			<li class="navbar-item">
				<a class="nav-link" href="helpPage.html">Help</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="viewLists.html">My Lists</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"href="#">Login</a>
			</li>
		</ul>
	</div>
</nav>


<!-- CONTAINER: Description + Button -->
<div class="container-fluid">
	<img src="logo.png" class="center">

	<div class="container">
        <div class="login-background">
            <form class="login-form">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="login-text">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="login-text">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            </form>
        </div>

        <button type="submit" class="btn btn-primary">Log In</button>
        <a href="signupPage.php">Don't have an account? Sign Up!</a>
	</div>
</div>


</body>
</html>