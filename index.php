<html>
<head>
<title>Welcome to Movie Seen :: Keep track of the movies you've seen!</title>
</head>
<?php
session_start();
?>
<body>
<h2>Welcome to Movie Seen</h2>
<a href="index.php">Home</a>
<a href="search.php">Search Movies</a>

<?php
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	print '| <a href="home.php">My Profile</a> ';
	print '<a href="logout.php">Logout</a><br/>';
	print 'You are currently logged in as '.$user;
} else {
	print '| <a href="login.php">Login</a> ';
	print '<a href="register.php">Register</a><br/>';
}
?>
</body>
</html>