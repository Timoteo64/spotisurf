<?php
    $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);
    $spotOcean = array();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
    <title>SpotiSurf</title>
</head>
       
<body>


<?php
   foreach ($SpotSurf as $spot)
    {
        $trouve = false;
        foreach ($spotOcean as $ocean )
        {
            if ($ocean == $spot['ocean'])
            {
                $trouve=true;
            }
        }
        if (!$trouve)
        {
            array_push($spotOcean, $spot['ocean']);
        }
    }
  
?>
<form action="recupCriteres.php" method="get">
    Sur quelle mer/océan souhaitez vous surfer ? :

<SELECT name="ocean" size="1">
<?php
foreach ($spotOcean as $spot)
{
    echo ' <OPTION>'.$spot.'';

}

?>
</SELECT> 
    <input type="submit" name="submit" value="Valider" /> 
</body>
       
  
 

     
</html>





