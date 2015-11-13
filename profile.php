<?php
include("inc/header.php");
include("inc/functions.php");

if(!isset($_SESSION['user'])) {
	header("location:index.php");
}
?>

<div class="row">
	<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Seen</h3>
		</div>
		<div class="panel-body">
<?php
connectDB();
$query = mysql_query("SELECT * FROM users");

while($row = mysql_fetch_array($query))
{
	$tbl_user = $row['username'];
	$tbl_seen = $row['seen'];
	$tbl_unseen = $row['watchlist'];
	
	// Find record with user's lists then store it in an array
	// or, if user has no records, set variable to NULL
	if($tbl_user == $user){
		if(isset($tbl_seen) && !empty($tbl_seen)){
			$seen = explode(',',$tbl_seen);
		} else {
			$seen = NULL;
		}
		
		if(isset($tbl_unseen) && !empty($tbl_unseen)) {
			$watchlist = explode(',',$tbl_unseen);
		} else {
			$watchlist = NULL;
		}
	}
}	
	// If user has seen something, show it;
	// otherwise, there is nothing to display
	if(isset($seen)){
		foreach($seen as $movie) {
			$obj = fetchJSON("i", $movie);
			$title = $obj['Title'];
			$year = $obj['Year'];
			$id = $obj['imdbID'];
			$obj = fetchJSON("i", $movie);
			print ('<a href="movie.php?id='.$id.'">'.$title.' ('.$year.')</a><br/>');
		}
	} else {
		print ('There\'s nothing here yet! Search for movies!');
	}
?>
		</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Watchlist</h3>
		</div>
		<div class="panel-body">
<?php
	// If user wants to see something, show it;
	// otherwise, there is nothing to display
	if(isset($watchlist)){
		foreach($watchlist as $movie) {
			$obj = fetchJSON("i", $movie);
			$title = $obj['Title'];
			$year = $obj['Year'];
			$id = $obj['imdbID'];
			print ('<a href="movie.php?id='.$id.'">'.$title.' ('.$year.')</a><br/>');
			//print $obj['Title'] ." (".$obj['Year'].")<br/>";
		}
	} else {
		print ('There\'s nothing here yet! Search for movies!');
	}
?>
		</div>
	</div>
	</div>
</div>
<?php
include("inc/footer.php");
?>