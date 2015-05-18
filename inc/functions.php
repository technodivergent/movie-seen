<?php
function connectDB() {
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("movie_seen") or die(mysql_error());
}

function eyeball($chkSeen) {
	if($chkSeen) {
		return "imgs/seen_k.png";
	}
	elseif(!$chkSeen) {
		return "imgs/unseen_k.png";
	} else {
		return "imgs/unseen_k.png";
	}
}

function watchlist($chkList) {
	if($chkList) {
		return "imgs/list.png";
	}
	elseif(!$chkList) {
		return "imgs/notlist.png";
	} else {
		return "imgs/notlist.png";
	}
}

function seenOrNot($id) {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		$query = mysql_query("SELECT * FROM users WHERE username='$user' AND FIND_IN_SET('$id',seen)");
		while($row = mysql_fetch_array($query))
		{
		$tbl_user = $row['username'];
		$arr_seen = explode(",", $row['seen']);
		
			foreach($arr_seen as $seen){
				if($seen == $id) {
					return true;
				}
			}
		}	
	} else {
		return false;
	}
}

function listOrNot($id) {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		$query = mysql_query("SELECT * FROM users WHERE username='$user' AND FIND_IN_SET('$id',watchlist)");
		while($row = mysql_fetch_array($query))
		{
		$tbl_user = $row['username'];
		$arr_list = explode(",", $row['watchlist']);
		
			foreach($arr_list as $list){
				if($list == $id) {
					return true;
				}
			}
		}	
	} else {
		return false;
	}
}

function getSeen() {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		$query = mysql_query("SELECT * FROM users WHERE username='$user'");
		while($row = mysql_fetch_array($query))
		{
		$tbl_user = $row['username'];
		$tbl_seen = $row['seen'];
		return $tbl_seen;
		}	
	} else {
		return false;
	}
}

function putSeen($seen) {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		
		mysql_query("UPDATE users SET seen = '$seen' WHERE username='$user'") or die(mysql_error());	
	} else {
		return false;
	}
}

function getList() {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		$query = mysql_query("SELECT * FROM users WHERE username='$user'");
		while($row = mysql_fetch_array($query))
		{
		$tbl_user = $row['username'];
		$tbl_list = $row['watchlist'];
		return $tbl_list;
		}	
	} else {
		return false;
	}
}

function putList($list) {
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		connectDB();
		
		mysql_query("UPDATE users SET watchlist = '$list' WHERE username='$user'") or die(mysql_error());	
	} else {
		return false;
	}
}

function modifyList($action, $id, $list) {
	if($action == "add") {
		if($list == "seen") {
			$chkSeen = seenOrNot($id);
			if(!$chkSeen) {
				echo "Adding ".$id." to ".$list."<br/>";
				$seen = getSeen().",".$id;
				putSeen($seen);
				header("location:home.php");
			}
		} elseif($list == "watchlist") {
			$chkList == listOrNot($id);
			if(!$chkList) {
				echo "Adding ".$id." to ".$list."<br/>";
				$list = getList().",".$id;
				putList($list);
				header("location:home.php");
			}
		}
	} elseif($action == "remove") {
		if($list == "seen") {
			echo "Removing ".$id." from Seen";
		} elseif($list == "watchlist") {
			echo "Removing ".$id." from Watchlist";
		}
	}
}

function fetchJSON($parameter, $term) {
	if($parameter == "i") {
		$url = "http://www.omdbapi.com/?i=";
	} 
	
	if ($parameter == "s") {
		$url = "http://www.omdbapi.com/?s=";
	}
	
	if ($parameter == "h") {
		$url = "http://www.omdbapi.com/?i=";
	}
	
	$json = file_get_contents($url.$term);
	$obj = json_decode($json, true);
	return $obj;
}

function displayMovieData($row){
	$imdbID = $row['mv_imdbID'];
	$title = $row['mv_title'];
	$year = $row['mv_year'];
	$rated = $row['mv_rated'];
	$released = $row['mv_released'];
	$runtime = $row['mv_runtime'];
	$genre = $row['mv_genre'];
	$director = $row['mv_director'];
	$writer = $row['mv_writer'];
	$actors = $row['mv_actors'];
	$plot = $row['mv_plot'];
	$lang = $row['mv_lang'];
	$country = $row['mv_country'];
	$awards = $row['mv_awards'];
	$poster = $row['mv_posterURL'];
	$metascore = $row['mv_metascore'];
	$imdbRating = $row['mv_imdbRating'];
	$imdbVotes = $row['mv_imdbVotes'];
	$type = $row['mv_type'];
	
	$chkSeen = seenOrNot($imdbID);
	$chkList = listOrNot($imdbID);
	
	$eyeball = eyeball($chkSeen);
	$watchlist = watchlist($chkList);
	
	if(isset($_SESSION['user'])){
		if($chkSeen){
			$eyeCon = "<a href=\"modify.php?action=remove&list=seen&id=".$imdbID."\"><img src=\"".$eyeball."\"></a> ";
		} 
		
		if(!$chkSeen) {
			$eyeCon = "<a href=\"modify.php?action=add&list=seen&id=".$imdbID."\"><img src=\"".$eyeball."\"></a> ";
		}
		
		if($chkList) {
			$listIcon = " <a href=\"modify.php?action=remove&list=watchlist&id=".$imdbID."\"><img src=\"".$watchlist."\"></a>";
		}
		
		if(!$chkList) {
			$listIcon = " <a href=\"modify.php?action=add&list=watchlist&id=".$imdbID."\"><img src=\"".$watchlist."\"></a>";
		}
		$icons = $eyeCon.$listIcon;
	} else {
		$icons = "<a href=\"register.php\"><img src=\"".$eyeball."\"></a> <a href=\"register.php\"><img src=\"".$watchlist."\"></a>";
	}
	
	print("
			<tr>
				<td rowspan=\"4\"><img src=\"".$poster."\"></td>
				<td><strong>".$title." (".$year.")</strong> ".$icons."</td>
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