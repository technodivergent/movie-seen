<?php
include("inc/header.php");

if(!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] == "home") {
	include("pages/index.php");
} elseif($_GET['page'] == "about") {
	include("pages/about.php");
} elseif($_GET['page'] == "contact") {
	include("pages/contact.php");
}

include("inc/footer.php");
?>