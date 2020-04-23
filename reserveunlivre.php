<?php
session_start();
$db_name="librairie";
try
{
  $con = mysqli_connect("localhost","root","",$db_name);
  
}catch(Exception $e){
    echo"erreur survenue!";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>reserver un livre</title>
</head>
<body>
	<h1>Reserver un livre</h1>
	<h3>vous déserez réserver le livre suivant</h3>
<form method="POST" action="confirm.php">
	<table border=1>
		<?php
		if(isset($_SESSION['id'])){
			if(!empty($_SESSION['id'])){
				 $resp=mysqli_query($con,"SELECT livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN from livres where livcode='".$_SESSION['id']."'");
              while($db=mysqli_fetch_array($resp)){
			     echo"<tr>";
			     echo"<th align=left>Code du livre</th>";
			     echo"<td>".$db['livcode']."</td>";
		         echo"</tr>";

		         echo"<tr>";
			     echo"<th align=left>Nom de l'auteur</th>";
			     echo"<td>".$db['livnomaut']."</td>";
		         echo"</tr>";

                 echo"<tr>";
			     echo"<th align=left>Prenom de l'auteur</th>";
			     echo"<td>".$db['livprenomaut']."</td>";
		         echo"</tr>";

		         echo"<tr>";
			     echo"<th align=left>Titre</th>";
			     echo"<td>".$db['livtitre']."</td>";
		         echo"</tr>";

		         echo"<tr>";
			     echo"<th align=left>Categorie</th>";
			     echo"<td>".$db['livcategorie']."</td>";
		         echo"</tr>";

		         echo"<tr>";
			     echo"<th align=left>ISBN</th>";
			     echo"<td>".$db['livISBN']."</td>";
		         echo"</tr>";
				}
			}else{
				echo"remplir";
			}
		}else{
			echo"erreur";
		}
		?>            
	</table>

           <input type="submit" name="confirm"  value="confirmer">
        

</form>	

</body>
</html>