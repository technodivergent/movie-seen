<?php
include("inc/header.php");
include("inc/functions.php");

if(!isset($_SESSION['user'])) {
	header("location:index.php");
}
?>
<p><strong>Seen</strong></p>
<?php
connectDB();
$query = mysql_query("SELECT * FROM users");

while($row = mysql_fetch_array($query))
{
	$tbl_user = $row['username'];
	$tbl_seen = $row['seen'];
	$tbl_unseen = $row['watchlist'];
	
	// Find logged in user's record
	if($tbl_user == $user){
		if(isset($tbl_seen)){
			$seen = explode(',',$tbl_seen);
			$watchlist = explode(',',$tbl_unseen);
		} else {
			$seen = NULL;
			$watchlist = NULL;
		}
		
		//echo $tbl_user." has seen: ".$seen[0]."<br/>";
		//cho $tbl_user." wants to see: ".$unseen[0]."<br/>";
	}
}	
	if(isset($seen)){
		foreach($seen as $movie) {
			$obj = fetchJSON("i", $movie);
			$title = $obj['Title'];
			$year = $obj['Year'];
			$id = $obj['imdbID'];
			$obj = fetchJSON("i", $movie);
			print '<a href="movie.php?id='.$id.'">'.$title.' ('.$year.')</a><br/>';
		}
	} else {
		print 'There\'s nothing here yet! Search for movies!';
	}
?>
<p><strong>Watchlist</strong></p>	
<?php
	if(isset($seen)){
		foreach($watchlist as $movie) {
			$obj = fetchJSON("i", $movie);
			$title = $obj['Title'];
			$year = $obj['Year'];
			$id = $obj['imdbID'];
			print '<a href="movie.php?id='.$id.'">'.$title.' ('.$year.')</a><br/>';
			//print $obj['Title'] ." (".$obj['Year'].")<br/>";
		}
	} else {
		print 'There\'s nothing here yet! Search for movies!';
	}
include("inc/footer.php");
?>