<html>
	<head>
		<title>Welcome to Movie Seen :: Keep track of the movies you've seen!</title>
	</head>
	<body>
		<h2>Login</h2>
		<a href="index.php">Go back</a>
		<form action="checklogin.php" method="POST">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" required="required"/></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" required="required"/></td>
				</tr>
				<tr><td colspan="2" align="right"><input type="submit" value="Login"/></td></tr>
			</table>
		</form>
	</body>
</html>