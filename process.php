<?php
session_start();
$db_name="librairie";
try
{
  $con = mysqli_connect("localhost","root","",$db_name);
  
}catch(Exception $e){
    echo"erreur survenue!";
}

    	if(isset($_POST['login'])){
    		if(!empty($_POST['name']) && !empty($_POST['word'])){
               $query="SELECT * FROM lecteurs where lecnom='".$_POST['name']."' and lecmotdepasse='".$_POST['word']."'";
               $res=mysqli_query($con, $query);
               if(mysqli_fetch_assoc($res)){
               	echo"le lecteur est reconnu";
                ?>
                <h2>voici la liste des ouvrages disponibles à la réservation</h2>
               <?php 
               $response=mysqli_query($con,"SELECT livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN from livres");
               echo"<table border=1>";
               echo"<tr>";
               echo"<th align=left>CodeLivre</th>";
               echo"<th align=left>NomAuteur</th>";
               echo"<th align=left>PrenomAuteur</th>";
               echo"<th align=left>Titre</th>";
               echo"<th align=left>Categorie</th>";
               echo"<th align=left>ISBN</th>";
               echo"<th align=left></th>";
               
               echo"</tr>";
               while($data=mysqli_fetch_array($response)){
                
                echo"<tr>";
                echo"<td>".$data['livcode']."</td>";
                echo"<td>".$data['livnomaut']."</td>";
                echo"<td>".$data['livprenomaut']."</td>";
                echo"<td>".$data['livtitre']."</td>";
                echo"<td>".$data['livcategorie']."</td>";
                echo"<td>".$data['livISBN']."</td>";
                echo"<td>"."<a href=process.php?action=".$data['livcode'].">Réserver</a>"."</td>";
                echo"</tr>";
               }
               echo"</table>";
               }else{
               	echo"le lecteur n'est pas reconnu";
               }

    		}else{
    			echo"please fill in the blanks";
    		}

        }else{
            
        }
            if(isset($_GET['action'])){
                 $id=$_GET['action'];
                 $_SESSION['id']=$id;
            ?>
                    <h2>voici la liste de vos reservations</h2>

            <?php
            $resp=mysqli_query($con,"SELECT livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN from livres where livcode='".$id."'");
                  echo"<table border=1>";

                  while($db=mysqli_fetch_array($resp))  {
                      $_SESSION['livc']=$db['livcode'];
                     
                      echo"<tr>";
                      echo"<th align=left>CodeLivre</th>";
                      echo"<th align=left>NomAuteur</th>";
                      echo"<th align=left>PrenomAuteur</th>";
                      echo"<th align=left>Titre</th>";
                      echo"<th align=left>Categorie</th>";
                      echo"<th align=left>ISBN</th>";
                      echo"</tr>";
                      echo"<tr>";
                      echo"<td>".$db['livcode']."</td>";
                      echo"<td>".$db['livnomaut']."</td>";
                      echo"<td>".$db['livprenomaut']."</td>";
                      echo"<td>".$db['livtitre']."</td>";
                      echo"<td>".$db['livcategorie']."</td>";
                      echo"<td>".$db['livISBN']."</td>";
                      echo"</tr>";
                      $_SESSION['id']=$db['livcode'];
                  }
                  echo"</table>";

                }else{
              
                }

        
 ?>