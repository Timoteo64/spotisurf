<?php
session_start();
// Vérifier si le formulaire est soumis 
if (isset($_GET['submit'])) {
   $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);
   $spotTrie2 = $_SESSION['spotTrie2'];
    $spotTrie3 = array();
    $spotMarche = array();
    

  
   /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
   $parking = $_GET['parking'];

   foreach ($spotTrie2 as $spot) {
      if ($spot['parking'] == $parking) {
         array_push($spotTrie3, $spot);
      }
   }

   foreach ($spotTrie3 as $spot)
   {
    $trouve = false;
    foreach ($spotMarche as $marche) {
       if ($marche == $spot['marche']) {
          $trouve = true;
       }
    }
    if (!$trouve) {
       array_push($spotMarche, $spot['marche']);
    }
   }
   $_SESSION['spotTrie3'] = $spotTrie3;

}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
    <title>SpotiSurf</title>
</head>
       
<body>


<form action="affichage.php" method="get">
Combien de temps souhaitez-vous marcher pour aller jusqu'au spot ? :

<SELECT name="marche" size="1">
<?php
foreach ($spotMarche as $spot)
{
    echo '<OPTION>'.$spot.' minutes </OPTION>';

}

?>
</SELECT> 
    <input type="submit" name="submit" value="Valider" /> 
    <table>
    <br></br>
      Spot restant :
      <tr>
         <th scope="col">Nom</th>
         <th scope="col">Océan</th>
         <th scope="col">Département</th>
         <th scope="col">Parking</th>
         <th scope="col">Temps de marches</th>


      </tr>
      <?php
      foreach ($spotTrie3 as $spot) {
         echo ' <tr> 
         <td> ' . $spot['nom'] . ' </td>
         <td> ' . $spot['ocean'] . ' </td>
         <td> ' . $spot['departement'] . ' </td>      
         <td> ' . $spot['parking'] . ' </td> 
         <td> ' . $spot['marche'] . ' minutes </td>                   
         </tr>';
      }

      ?>

   </table>
</body>
       
  
 

     
</html>
