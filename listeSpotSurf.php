<?php
     $listeSpotSurf = array ( 

        array( 
            "nom" => "Les Sables d'or",
            "latitude" => 43.5009071,
            "longitude" => -1.5419859,
            "id" => 48414,
            "ocean" => "Atlantique",
            "departement" => 64,
            "parking" => "oui",
            "marche" => 2 
          ), 
        array( 
              "nom" => "Les Cavaliers",
              "latitude" => 43.5219809,
              "longitude" => -1.5262218,
              "id" => 856798,
              "ocean" => "Atlantique",
              "departement" => 64,
              "parking" => "oui",
              "marche" => 5

          ),
        array( 
          "nom" => "La Gravière",
          "latitude" => 43.6712915,
          "longitude" => -1.4419602,
          "id" => 309513,
          "ocean" => "Atlantique",
          "departement" => 40,
          "parking" => "non",
          "marche" => 14 
        ),
        array( 
          "nom" => "Les culs nuls",
          "latitude" =>43.6898,
          "longitude" => -1.4399,
          "id" => 48570,
          "ocean" => "Atlantique",
          "departement" => 40,
          "parking" => "non",
          "marche" => 14 
        ),
        array( 
          "nom" => "Plage d'Hendaye",
          "latitude" => 43.372403,
          "longitude" => -1.7684721,
          "id" => 48576,
          "ocean" => "Atlantique",
          "departement" => 64,
          "parking" => "non",
          "marche" => 6 
        ),
        array( 
          "nom" => "Plage de la Côte des Basques",
          "latitude" => 43.47782897949219,
          "longitude" => -1.5671342611312866,
          "id" => 15,
          "ocean" => "Atlantique",
          "departement" => 64,
          "parking" => "non",
          "marche" => 5 

        ),
        array( 
          "nom" => "La Barre",
          "latitude" => 43.5259451,
          "longitude" => -1.5241525,
          "id" => 48571,
          "ocean" => "Atlantique",
          "departement" => 40,
          "parking" => "oui",
          "marche" => 4
        ),
        array( 
          "nom" => "La Fôret",
          "latitude" => 43.6983,
          "longitude" => -1.4381,
          "id" => 868243,
          "ocean" => "Atlantique",
          "departement" => 40,
          "parking" => "oui",
          "marche" => 45
        ),
        array( 
          "nom" => "Pointe rouge",
          "latitude" => 43.244879421957656,
          "longitude" => 5.367338846118912,
          "id" => 48617,
          "ocean" => "Méditerranée",
          "departement" => 13,
          "parking" => "oui",
          "marche" => 8
        ),
        array( 
          "nom" => "Les Renaires",
          "latitude" => 43.3531,
          "longitude" => 5.0129,
          "id" => 48612,
          "ocean" => "Méditerranée",
          "departement" => 13,
          "parking" => "non",
          "marche" => 4
        ),
        array( 
          "nom" => "Sausset",
          "latitude" =>  43.3297,
          "longitude" =>  5.1091,
          "id" => 48614,
          "ocean" => "Méditerranée",
          "departement" => 13,
          "parking" => "oui",
          "marche" => 9
        ),
        array( 
          "nom" => "Plage Napoléon",
          "latitude" => 43.3695,
          "longitude" => 4.8999,
          "id" => 48608,
          "ocean" => "Méditerranée",
          "departement" => 13,
          "parking" => "non",
          "marche" => 46
        ),
        array( 
          "nom" => "Bergerie",
          "latitude" => 43.0500 ,
          "longitude" => 6.1499,
          "id" => 48629,
          "ocean" => "Méditerranée",
          "departement" => 83,
          "parking" => "oui",
          "marche" => 9
        ),
        array( 
          "nom" => "Ayguade",
          "latitude" => 43.1092,
          "longitude" => 6.1806,
          "id" => 501007,
          "ocean" => "Méditerranée",
          "departement" => 83,
          "parking" => "oui",
          "marche" => 14
        ),
        array( 
          "nom" => "Brégançon",
          "latitude" => 43.0896,
          "longitude" => 6.3200,
          "id" => 48632,
          "ocean" => "Méditerranée",
          "departement" => 83,
          "parking" => "non",
          "marche" => 7
        ),
        array( 
          "nom" => "La Favière",
          "latitude" => 43.1195,
          "longitude" => 6.3602,
          "id" => 501014,
          "ocean" => "Méditerranée",
          "departement" => 83,
          "parking" => "non",
          "marche" => 9
        )                                                     
      ); 
        
      $jsone=json_encode($listeSpotSurf);
      echo $jsone;

?>