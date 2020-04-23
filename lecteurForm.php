<!DOCTYPE html>
<html>
<head>
	<title>lecteur</title>
</head>
<body>
	<h1>Enregistrement d'un lecteur</h1>
	<form action="gestionlecteur.php" method="POST">
	  <table>
	   <tr>	
		<th align=left><label for="nom">Nom:</label></th>
		<td><input type="text" name="nom"></td>
       </tr>
       <tr>
		<th  align=left><label for="prenom">Prénom:</label></th>
		<td><input type="text" name="prenom"></td>
       </tr>
        <tr>
		<th  align=left><label for="pass">Mot de passe:</label></th>
		<td><input type="password" name="pass"></td>
       </tr>
       <tr>
		<th  align=left><label for="adresse">Adresse:</label></th>
		<td><input type="text" name="adresse"></td>
       </tr>
       <tr>
		<th align=left><label for="ville">Ville:</label></th>
		<td><input type="text" name="ville"></td>
       </tr>
       <tr>
		<th align=left><label for="code">Code Postal:</label></th>
		<td><input type="text" name="code"></td>
       </tr>
       <tr>
		<td><input type="submit" name="envoi" value="Enregistrer"></td>
       </tr>
      </table>
	</form>

</body>
</html>