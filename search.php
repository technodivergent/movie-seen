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
}
?>
<form action="search.php" method="GET">
			<table>
				<tr>
					<td>Search:</td>
					<td><input type="text" name="search" required="required"/><input type="submit" value="Search"/></td>
				</tr>
			</table>
		</form>
</body>
</html>
<?php
if(empty($_GET['search'])) {
} elseif(isset($_GET['search'])) {
	$term = rawurlencode(mysql_real_escape_string($_GET["search"]));
	$url = "http://www.omdbapi.com/?s=";
	$json = file_get_contents($url.$term);
	$obj = json_decode($json, true);
	$search = $obj['Search'];
	
	foreach($search as $movie) {
		print '<a href="movie.php?id='.$movie['imdbID'].'"</a>'.$movie['Title']." (".$movie['Year'].')</a>';
		print '<br/>';
	}
}
?>