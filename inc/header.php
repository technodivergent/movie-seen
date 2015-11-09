<?php
session_start();
?>
<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Movie Seen :: Keep track of the movies you\'ve seen!</title>
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">Movie Seen</a>
		</div>
		<div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
			  <li><a href="search.php">Search</a></li>
              <li><a href="index.php?page=about">About</a></li>
              <li><a href="index.php?page=contact">Contact</a></li>
              
	<?php
		if(isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
	?>
					<li role="presentation"><a href="profile.php"><?php print($user); ?>'s profile</a></li>
					<li role="presentation"><a href="logout.php">Logout</a></li>
	<?php
		} else {
	?>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login/Register <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
				</ul>
            </li>
		  
	<?php
		}
	?>
            </ul>
          </div><!--/.nav-collapse -->
	</div>
</nav>
<div class="container">
<h2>Welcome to Movie Seen</h2>
