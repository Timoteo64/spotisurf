<?php
session_start();
// Vérifier si le formulaire est soumis 
if (isset($_GET['submit'])) {
   $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);
   $spotTrie = array();
   $spotDep = array();

   /* récupérer les données du formulaire en utilisant 
        la valeur des attributs name comme clé 
       */
   $ocean = $_GET['ocean'];
   foreach ($SpotSurf as $spot) {
      if ($spot['ocean'] == $ocean) {
         array_push($spotTrie, $spot);
      }
   }


   foreach ($spotTrie as $spot) {
      $json = json_decode(file_get_contents('https://geo.api.gouv.fr/departements/' . $spot['departement']), true);
      $trouve = false;
      foreach ($spotDep as $departement) {
         if ($departement['nom'] == $json['nom']) {
            $trouve = true;
         }
      }
      if (!$trouve) {
         $tmp=array(
            "nom"=>$json['nom'],
            "code"=>$json['code']
         );
         array_push($spotDep, $tmp);
      }
   }
}
$_SESSION['spotTrie'] = $spotTrie;


?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <title>SpotiSurf</title>

</head>

<body>

   <form action="recupDep.php" method="get">
      Dans quel département souhaitez vous surfer ? :

      <?php
      foreach ($spotDep as $spot) {
         echo '<input type="radio" name="dep" value="' . $spot['code'] . '"
      checked>
       <label >' . $spot['nom'] . '</label>';
      }
      ?>

      <input type="submit" name="submit" value="Valider" />
   </form>
   <table>
      <br></br>
      Spot restant :
      <tr>
         <th scope="col">Nom</th>
         <th scope="col">Océan</th>
         <th scope="col">Département</th>
      </tr>
      <?php
      foreach ($spotTrie as $spot) {
         echo ' <tr> 
         <td> ' . $spot['nom'] . ' </td>
         <td> ' . $spot['ocean'] . ' </td>
         <td> ' . $spot['departement'] . ' </td>        
         </tr>';
      }

      ?>

   </table>
</body>

</html>