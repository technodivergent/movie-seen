<?php
include("inc/header.php");
?>
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
<?php
include("inc/footer.php");
?>