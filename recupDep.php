<?php
session_start();
// Vérifier si le formulaire est soumis 
if (isset($_GET['submit'])) {
   $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);
   $spotTrie = $_SESSION['spotTrie'];
    $spotTrie2 = array();
    $spotParking = array();
    

  
   /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
   $dep = $_GET['dep'];

   foreach ($spotTrie as $spot) {
      if ($spot['departement'] == $dep) {
         array_push($spotTrie2, $spot);
      }
   }

   foreach ($spotTrie2 as $spot)
   {
    $trouve = false;
    foreach ($spotParking as $parking) {
       if ($parking == $spot['parking']) {
          $trouve = true;
       }
    }
    if (!$trouve) {
       array_push($spotParking, $spot['parking']);
    }
   }
   $_SESSION['spotTrie2'] = $spotTrie2;

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
    <title>SpotiSurf</title>
</head>
       
<body>

<form action="recupParking.php" method="get">
    Souhaitez-vous un parking ? :


<?php
foreach ($spotParking as $spot)
{
    echo '<input type="radio" name="parking" value="' . $spot. '"
    checked>
     <label >' . $spot. '</label>';
    

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

      </tr>
      <?php
      foreach ($spotTrie2 as $spot) {
         echo ' <tr> 
         <td> ' . $spot['nom'] . ' </td>
         <td> ' . $spot['ocean'] . ' </td>
         <td> ' . $spot['departement'] . ' </td>      
         <td> ' . $spot['parking'] . ' </td>          
         </tr>';
      }

      ?>

   </table>

</body>

       
  
 

     
</html>