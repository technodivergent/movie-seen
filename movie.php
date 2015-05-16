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
	print 'You are currently logged in as '.$user.'<br/>';
} else {
	print '| <a href="login.php">Login</a> ';
	print '<a href="register.php">Register</a><br/>';
}

if(empty($_GET['id'])) {
	echo "No movie selected";
} elseif(isset($_GET['id'])) {
	$id = $_GET['id'];
	$url = "http://www.omdbapi.com/?i=";
	$json = file_get_contents($url.$id);
	$obj = json_decode($json, true);
	
	$cached = false;
	
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("movie_seen") or die(mysql_error());
	$query = mysql_query("SELECT * FROM movies");
	while($row = mysql_fetch_array($query))
	{
		$tbl_movies = $row['mv_imdbID'];
		if($obj['imdbID'] == $tbl_movies)
		{
			$cached = true;
			echo $row['mv_title'];
			echo "<br/>";
			echo $row['mv_year'];
			echo "<br/>";
			echo $row['mv_runtime'];
			echo "<br/>";
			echo $row['mv_rated'];
			echo "<br/>";
			echo $row['mv_released'];
			echo "<br/>";
			echo $row['mv_genre'];
			echo "<br/>";
			echo $row['mv_plot'];
			echo "<br/>";
			echo $row['mv_posterURL'];
			echo "<br/>";
			echo $row['mv_type'];
			echo "<br/>";
			echo $row['mv_imdbID'];
		}
	}

	if(!$cached) {
		$imdbID = mysql_real_escape_string($obj['imdbID']);
		$title = mysql_real_escape_string($obj['Title']);
		$year = mysql_real_escape_string($obj['Year']);
		$rated = mysql_real_escape_string($obj['Rated']);
		$released = mysql_real_escape_string($obj['Released']);
		$runtime = mysql_real_escape_string($obj['Runtime']);
		$genre = mysql_real_escape_string($obj['Genre']);
		$director = mysql_real_escape_string($obj['Director']);
		$writer = mysql_real_escape_string($obj['Writer']);
		$actors = mysql_real_escape_string($obj['Actors']);
		$plot = mysql_real_escape_string($obj['Plot']);
		$lang = mysql_real_escape_string($obj['Language']);
		$country = mysql_real_escape_string($obj['Country']);
		$awards = mysql_real_escape_string($obj['Awards']);
		$poster = mysql_real_escape_string($obj['Poster']);
		$metascore = mysql_real_escape_string($obj['Metascore']);
		$imdbRating = mysql_real_escape_string($obj['imdbRating']);
		$imdbVotes = mysql_real_escape_string($obj['imdbVotes']);
		$type = mysql_real_escape_string($obj['Type']);
		
		mysql_query("INSERT INTO movies (mv_id, mv_imdbID, mv_title, mv_year, mv_rated, mv_released, mv_runtime, mv_genre, mv_director, mv_writer, mv_actors, mv_plot, mv_lang, mv_country, mv_awards, mv_posterURL, mv_metascore, mv_imdbRating, mv_imdbVotes, mv_type) VALUES (NULL, '$imdbID', '$title', '$year', '$rated', '$released', '$runtime', '$genre', '$director', '$writer', '$actors', '$plot', '$lang', '$country', '$awards', '$poster', '$metascore', '$imdbRating', '$imdbVotes', '$type')") or die(mysql_error());
		header("location:movie.php?id=".$imdbID);
		
	}
	
}
?>
</body>
</html>
