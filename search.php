<?php
include("inc/header.php");
include("inc/functions.php");
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
	$term = rawurlencode($_GET["search"]);
	echo $term."<br/>";
	$obj = fetchJSON("s", $term);
	
	if(isset($obj['Response'])) {
		print 'Results not found!';
	} else {
		$search = $obj['Search'];
		
		foreach($search as $movie) {
			print '<a href="movie.php?id='.$movie['imdbID'].'"</a>'.$movie['Title']." (".$movie['Year'].')</a><br/>';
		}
	}
}
?>