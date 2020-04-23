
<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
</head>
<body>
	<h1>Authentification du lecteur</h1>
	<form action="process.php" method="POST">
		<table>
			<tr>
				<th align=left>Nom du lecteur:</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th align=left>Mot de passe:</th>
				<td><input type="password" name="word"></td>
			</tr>
			<tr>
				
				<td><input type="submit" name="login" value="login"></td>
			</tr>

		</table>

	</form>


</body>
</html>