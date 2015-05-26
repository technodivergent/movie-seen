<?php
include("inc/header.php");
include("inc/functions.php");
?>
		<h2>Register</h2>
		<a href="index.php">Go back</a>
		<form action="register.php" method="POST">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" required="required"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" required="required"/></td>
				</tr>
				<tr>
					<td>E-Mail:</td>
					<td><input type="text" name="email" required="required"/></td>
				</tr>
				<tr><td colspan="2" align="right"><input type="submit" value="Register"/></td></tr>
			</table>
		</form>
<?php
include("inc/footer.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = mysql_real_escape_string($_POST["username"]);
	$password = mysql_real_escape_string($_POST["password"]);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$email = mysql_real_escape_string($_POST["email"]);
	
	$registered = false;
		
	connectDB();
	$query = mysql_query("SELECT * FROM users");
	while($row = mysql_fetch_array($query))
	{
		$tbl_users = $row['username'];
		if($username == $tbl_users)
		{
			$registered = true;
			print('<script>alert("Username is already registered!");</script>');
			print('<script>window.location.assign("register.php");</script>');
		}
	}
	
	if(!$registered)
	{
		mysql_query("INSERT INTO users (username, password, email) VALUES ('$username', '$hash', '$email')");
		print('<script>alert("Successfully registered!");</script>');
		print('<script>window.location.assign("login.php");</script>');
	}
}
?>