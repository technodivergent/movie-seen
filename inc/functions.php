<?php
function connectDB() {
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("movie_seen") or die(mysql_error());
}

function displayMovieData($row){
	$imdbID = mysql_real_escape_string($row['mv_imdbID']);
	$title = mysql_real_escape_string($row['mv_title']);
	$year = mysql_real_escape_string($row['mv_year']);
	$rated = mysql_real_escape_string($row['mv_rated']);
	$released = mysql_real_escape_string($row['mv_released']);
	$runtime = mysql_real_escape_string($row['mv_runtime']);
	$genre = mysql_real_escape_string($row['mv_genre']);
	$director = mysql_real_escape_string($row['mv_director']);
	$writer = mysql_real_escape_string($row['mv_writer']);
	$actors = mysql_real_escape_string($row['mv_actors']);
	$plot = mysql_real_escape_string($row['mv_plot']);
	$lang = mysql_real_escape_string($row['mv_lang']);
	$country = mysql_real_escape_string($row['mv_country']);
	$awards = mysql_real_escape_string($row['mv_awards']);
	$poster = mysql_real_escape_string($row['mv_posterURL']);
	$metascore = mysql_real_escape_string($row['mv_metascore']);
	$imdbRating = mysql_real_escape_string($row['mv_imdbRating']);
	$imdbVotes = mysql_real_escape_string($row['mv_imdbVotes']);
	$type = mysql_real_escape_string($row['mv_type']);
	
	print("
			<tr>
				<td rowspan=\"4\"><img src=\"".$poster."\"></td>
				<td><strong>".$title." (".$year.")</strong></td>
			</tr>
			<tr>
				<td><span title=\"Rating\">".$rated."</span> | <span title=\"Runtime\">".$runtime."</span> | <span title=\"Genre\">".$genre."</span> | <span title=\"Released\">".$released."</span></td>
			</tr>
			<tr>
				<td>".$plot."</td>
			</tr>
			<tr>
				<td><a href=\"http://imdb.com/title/".$imdbID."\">View on IMDb</a></td>
			</tr>
	");
}

function insertMovie($obj) {
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
}

?>