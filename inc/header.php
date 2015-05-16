<?php
session_start();
print '<html>';
print '<head>';
print '<title>Welcome to Movie Seen :: Keep track of the movies you\'ve seen!</title>';
print '</head>';
print '<body>';

print '<h2>Welcome to Movie Seen</h2>';
print '<a href="index.php">Home</a> ';
print '<a href="search.php">Search Movies</a> ';

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	print '| <a href="home.php">My Profile</a> ';
	print '<a href="logout.php">Logout</a><br/>';
	print 'You are currently logged in as <strong>'.$user.'</strong>';
} else {
	print '| <a href="login.php">Login</a> ';
	print '<a href="register.php">Register</a><br/>';
}
?>