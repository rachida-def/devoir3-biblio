<?php
session_start();
$db_user="root";
$db_pass="";
$db_name="librairie";
try{
   $db=new PDO('mysql:host=localhost;dbname='.$db_name.';charset-utf8',$db_user,$db_pass);
   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException  $e){
	die("check your connection");
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>validation</title>
</head>
<body>
	<h1>Validation d'un lecteur</h1>
  <?php	
  function testadresse($adr){
  	if(preg_match("#(^[0-9]{2,}\,(rue|passage|avenue)[a-zA-Z]+$)#", $adr)){
  		return true;
  	}else{
  		return false;
  	}
  }

  function testcodePostal($code){
  	if ( preg_match ( " #(^[0-9]{5,5}$)# " , $code ) ){
  		return true;
  	}else{
  		return false;
  	}

  }

 if(isset($_POST)){
 	
 	if(!empty($_SESSION['name'])&&!empty($_SESSION['pre'])&&!empty($_SESSION['local'])&&!empty($_SESSION['city'])&&!empty($_SESSION['codepos'])&&!empty($_SESSION['password'])){
 		$adresse=preg_replace('/\s+/', '', $_SESSION["local"]);
 		$code=preg_replace('/\s+/', '', $_SESSION["codepos"]);
 		if(testadresse($adresse)==true && testcodePostal($code)==true){
             echo"<table>";
             echo"<tr>";
             echo"<th align=left>Nom:</th><td>".$_SESSION['name']."</td>";
             echo"</tr>";   

            echo"<tr>";
            echo"<th align=left>Prénom:</th><td>".$_SESSION['pre']."</td>";
            echo"</tr>";

            echo"<tr>";
            echo"<th align=left>Adresse:</th><td>".$_SESSION['local']."</td>";
            echo"</tr>";

            echo"<tr>";
            echo"<th align=left>Ville:</th><td>".$_SESSION['city']."</td>";
            echo"</tr>";

            echo"<tr>";
            echo"<th align=left>Code Postal:</th><td>".$_SESSION['codepos']."</td>";
            echo"</tr>";

            echo"</table>"; 

            $req="INSERT INTO lecteurs(lecnom,lecprenom,lecadresse,lecville,leccodepostal,lecmotdepasse)values(?,?,?,?,?,?)";
              $stminsert=$db->prepare($req);
              $res=$stminsert->execute([$_SESSION['name'],$_SESSION['pre'],$_SESSION['local'],$_SESSION['city'],$_SESSION['codepos'],$_SESSION['password']]);
                if($res){
                	echo"voue êtes enregistré dans la base de la bibliothèque ";
                	echo"</br>";
                	echo"vous avez maintenant la possibilité de réserver des livres <a href=login.php>identifiant ici</a> ";
                }else{
                	echo'There were errors while saving the data';
                }
        }else{
        	echo"l'adresse incorrecte";
        }    

    }else{
    	echo"il faut remplir tous les champs";
    }        
  }else{
  	echo"erreur survenue";
  } 
   ?>
</body>
</html>