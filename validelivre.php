



<!DOCTYPE html>
<html>
<head>
	<title>valide livre</title>
</head>
<body>
	<h1>Validation d'un livre</h1>
 <?php
  function testISBN($code){
  	if(preg_match("#(^[a-zA-Z0-9]{10})#",$code)){
  		return true;
  	}else{
  		return false;
  	}
  }




     if(isset($_POST['envoi'])){
     	if(!empty($_POST['nom'])&&!empty($_POST['prenom'])&&!empty($_POST['titre'])&&!empty($_POST['genre'])&&!empty($_POST['codeISBN'])){

	        $codeISBN=preg_replace('/\s+/', '', $_POST["codeISBN"]);
	         if(testISBN($codeISBN)==true){
	         	 echo"<table>";
                 echo"<tr>";
                 echo"<th align=left>Nom de l'auteur:</th><td>".$_POST['nom']."</td>";
                 echo"</tr>";   

                echo"<tr>";
                echo"<th>Prénom de l'auteur:</th><td>".$_POST['prenom']."</td>";
                echo"</tr>";

                echo"<tr>";
                echo"<th align=left>Titre:</th><td>".$_POST['titre']."</td>";
                echo"</tr>";

                echo"<tr>";
                echo"<th align=left>Catégorie:</th><td>".$_POST['genre']."</td>";
                echo"</tr>";

                echo"<tr>";
                echo"<th align=left>Numéro ISBN:</th><td>".$_POST['codeISBN']."</td>";
                echo"</tr>";
              
                 
	         }else{
	         	echo"le code incorrect";
	         }

        }else{
        	echo"il faut remplir tous les champs";
        }

     }else{
     	echo"erreur";
     }


  ?>	

</body>
</html>