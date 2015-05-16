<html>
<head>
<title>Welcome to Movie Seen :: Keep track of the movies you've seen!</title>
</head>
<?php
	session_start();
	if($_SESSION['user']){
	} else {
		header("location:index.php");
	}
	$user = $_SESSION['user'];
?>
<body>
<h2>Welcome to Movie Seen</h2>
<a href="index.php">Home</a>
<a href="search.php">Search Movies</a> |
<a href="home.php">My Profile</a>
<a href="logout.php">Logout</a><br />

You are logged in as <strong><?php print($user); ?></strong><br/><br/>


</body>
</html>