<?php
session_start();
print('<html>
<head>
<title>Welcome to Movie Seen :: Keep track of the movies you\'ve seen!</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
');

print ('<h2>Welcome to Movie Seen</h2>
<a href="index.php">Home</a> <a href="search.php">Search Movies</a> ');

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	print ('| <a href="home.php">My Profile</a> <a href="logout.php">Logout</a><br/>');
	print ('
		You are currently logged in as <strong>'.$user.'</strong><br/>
		
	');
} else {
	print ('
		| <a href="login.php">Login</a> <a href="register.php">Register</a><br/>
		
	');
}
?>