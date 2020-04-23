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
	<title>Confirmation d'une réservation</title>
</head>
<body>
	<h3>Confirmation de votre réservation</h3>
	<?php
	if(isset($_SESSION['id'])){
		if(!empty($_SESSION['id'])){

			$sql="INSERT into emprunts(empdate,empdateret,empcodelivre) values (?,?,?)";
			 $stminsert=$db->prepare($sql);
              $res=$stminsert->execute([date("d-m-y"),date('d-m-y',strtotime('+5 days')),$_SESSION['id']]);
                if($res){
                	echo"votre réservation est confirmée ";
                	echo"</br>";
                	echo"Date de la réservation".date("d-m-y");
                	echo"</br>";
                	echo"Date du retour".date('d-m-y',strtotime('+5 days'));
                    echo"</br>";
                	echo"vous pouvez revenir à la liste des livres disponible à la réservation en cliquant <a href=reserveunlivre.php> ici</a> ";
                }else{
                	echo'There were errors while saving the data';
                }

		}else{
			echo"fill in the blanks";
		}

	}else{
		echo"erreur survenue";
	}
    ?>

</body>
</html>