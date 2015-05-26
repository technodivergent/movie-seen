<?php
include("inc/functions.php");
session_start();
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string($_POST["password"]);

connectDB();
$query = mysql_query("SELECT * FROM users WHERE username='$username'");
$records = mysql_num_rows($query);
$table_users = "";
$table_password = "";
if($records == 0)
{
	print('<script>alert("Username does not exist!");</script>');
	print('<script>window.location.assign("login.php");</script>');
}
else
{
	while($row = mysql_fetch_assoc($query))
	{
		$table_users = $row['username'];
		$table_password = $row['password'];
	}
	if( ($username == $table_users) && (password_verify($password, $table_password)) )
	{
		if(password_verify($password, $table_password))
		{
			$_SESSION['user'] = $username;
			header("location: home.php");
		}
	}
	else
	{
		print('<script>alert("Incorrect password!");</script>');
		print('<script>window.location.assign("login.php");</script>');
	}
}
?>