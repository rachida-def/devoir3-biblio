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
	<title>Gestion du lecteur</title>
</head>
<body>
    <h1>Gestion du lecteur</h1>
    <?php header("location:process.php"); ?>
    <div>
    	<?php
    	$_SESSION['name']=$_POST['nom'];
    	$_SESSION['pre']=$_POST['prenom'];
    	$_SESSION['local']=$_POST['adresse'];
    	$_SESSION['city']=$_POST['ville'];
    	$_SESSION['codepos']=$_POST['code'];
    	$_SESSION['password']=$_POST['pass'];
    	     
          if(isset($_POST)){
          	 $name     =$_POST['nom'];
             $prenom   =$_POST['prenom'];
             $adresse  =$_POST['adresse'];
             $ville    =$_POST['ville'];
             $code     =$_POST['code'];
             
             $sql="SELECT * from lecteurs where lecnom='".$name."'and lecprenom='".$prenom."'and lecadresse='".$adresse."'and lecville='".$ville."'and leccodepostal='".$code."'";
             $result=mysqli_query($con,$sql);
             if(mysqli_num_rows($result)!=0){
                 echo"le lecteur n'est pas reconnu</br> ";
                 echo"cliquez <a href=lecteurForm.php#>ici</a> pour tenter une nouvelle identification";
                }else{
             	header("location:validelecteur.php");
             }
          }else{
              echo"erreur";
          }
    	?>
    </div>
</body>
</html>