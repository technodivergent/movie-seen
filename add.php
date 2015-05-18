<?php
include("inc/header.php");
include("inc/functions.php");
if(isset($_SESSION['user'])){
	if(isset($_GET['id']) && isset($_GET['list'])){
		$id = $_GET['id'];
		$list = $_GET['list'];
		addToList($id, $list);
	} else {
		echo "Invalid arguments";
	}
} else {

}
?>



<?php
include("inc/footer.php");
?>