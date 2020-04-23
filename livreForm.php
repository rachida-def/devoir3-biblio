<!DOCTYPE html>
<html>
<head>
	<title>lecteur</title>
</head>
<body>
	<h1>Enregistrement d'un livre</h1>
	<form action="validelivre.php" method="POST">
	  <table>
	   <tr>	
		<th><label for="nom">Nom de l'auteur:</label></th>
		<td><input type="text" name="nom"></td>
       </tr>
       <tr>
		<th><label for="prenom">Prénom de l'auteur:</label></th>
		<td><input type="text" name="prenom"></td>
       </tr>
       <tr>
		<th><label for="titre">Titre:</label></th>
		<td><input type="text" name="titre"></td>
       </tr>
       <tr>
		<th><label for="genre">Catégorie:</label></th>
		<td>
			<select name="genre">
				<option value="Roman">Roman</option>
				<option value="science">Science-fiction</option>
				<option value="policier">Policier</option>
			    <option value="jumior">Junior</option>	
		    </select>
	   </td>
       </tr>
       <tr>
		<th><label for="codeISBN">Numero ISBN:</label></th>
		<td><input type="text" name="codeISBN"></td>
       </tr>
       <tr>
		<td><input type="submit" name="envoi" value="Enregistrer"></td>
       </tr>
      </table>
	</form>

</body>
</html>