<?php
include("inc/header.php");
?>
	<form action="search.php" method="GET">
		<table>
			<tr>
				<td>Search:</td>
				<td><input type="text" name="search" required="required"/><input type="submit" value="Search"/></td>
			</tr>
		</table>
	</form>
<?php
include("inc/footer.php");
?>
<?php
if(empty($_GET['search'])) {
} elseif(isset($_GET['search'])) {
	$url = "http://www.omdbapi.com/?s=";
	$term = rawurlencode(mysql_real_escape_string($_GET["search"]));
	
	$json = file_get_contents($url.$term);
	$obj = json_decode($json, true);
	$search = $obj['Search'];
	
	foreach($search as $movie) {
		print '<a href="movie.php?id='.$movie['imdbID'].'"</a>'.$movie['Title']." (".$movie['Year'].')</a><br/>';
	}
}
?>