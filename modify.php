<?php
include("inc/header.php");
include("inc/functions.php");
if(isset($_SESSION['user'])){
	if(isset($_GET['id']) && isset($_GET['list'])){
		$action = $_GET['action'];
		$id = $_GET['id'];
		$list = $_GET['list'];
		
		modifyList($action, $id, $list);
	} else {
		echo "Invalid arguments";
	}
} else {

}
?>



<?php
include("inc/footer.php");
?>