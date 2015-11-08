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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="inc/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#">Movie Seen</a>
	</div>
	<?php
		if(isset($_SESSION['user'])) {
			$user = $_SESSION['user'];
	?>
			<div id="navbar" class="navbar-collapse collapse">
				<nav>
				  <ul class="nav navbar-nav pull-right">
					<li role="presentation"><a class="navbar-brand" href="profile.php"><?php print($user); ?>'s profile</a></li>
					<li role="presentation"><a class="navbar-brand" href="logout.php">Logout</a></li>
				  </ul>
				</nav>
			</div>
	<?php
		} else {
	?>
			<div id="navbar" class="navbar-collapse collapse">
			  <form class="navbar-form navbar-right" action="checklogin.php" method="POST">
				<div class="form-group">
				  <input type="text" placeholder="Username" name="username" class="form-control">
				</div>
				<div class="form-group">
				  <input type="password" placeholder="Password" name="password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Sign in</button>
			  </form>
			</div><!--/.navbar-collapse -->
		  </div>
	<?php
		}
	?>
</nav>

<h2>Welcome to Movie Seen</h2>
