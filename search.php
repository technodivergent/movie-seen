<?php
include("inc/header.php");
include("inc/functions.php");
?>
<div class="row">
	<div class="col-sm-7">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Search</h3>
			</div>
			<div class="panel-body">
				<?php
				if(empty($_GET['s']) || !isset($_GET['s'])) {
					include("pages/search.php");
				} elseif(isset($_GET['s'])) {
					$term = rawurlencode($_GET["s"]);
					$obj = fetchJSON("s", $term);
					
					if($obj['Response'] == "False") {
						print ('Results not found!');
					} else {
						$search = $obj['Search'];
						
						foreach($search as $movie) {
							print ('<a href="movie.php?id='.$movie['imdbID'].'"</a>'.$movie['Title']." (".$movie['Year'].')</a><br/>');
						}
						print('<a class="btn btn-success pull-right" role="button" href="search.php">New search</a>');
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
include("inc/footer.php");
?>