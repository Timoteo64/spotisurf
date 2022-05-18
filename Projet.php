<?php
    $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);

    $tableauNoms= array();
    $tableauLats= array();
    $tableauLongs= array();
    $tableauID= array();

    
    for($i = 0 ; $i<count($SpotSurf); $i++ )
    {

        array_push($tableauNoms,$SpotSurf[$i]["nom"] );
        array_push($tableauLats,$SpotSurf[$i]["latitude"] );
        array_push($tableauLongs,$SpotSurf[$i]["longitude"] );
        array_push($tableauID,$SpotSurf[$i]["id"]);


    }

?>
<html>
<head>
    <title>SpotiSurf</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
    <style>
        #map { height: 94%; }
    </style>
<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script></head>
<body onload="listeVille()">
    <div id="map" onClick="miseAJOurCoordonnees()"></div>
    <forms>
        <p>
            Votre position : <input type="text" id="recherche">
            <button onClick="rechercheVille()">Rechercher</button>
            <a href="critere.php"><button>Critère</button>
  
        </p>
    </forms>
    
    
    <script>
       


        //Recuperation tableaux php

        var tableauNoms = [];
        var tableauLats = [];
        var tableauLongs = [];
        var tableauID = [];


        tableauNoms=(<?php echo json_encode($tableauNoms) ?>);
        tableauLats=(<?php echo json_encode($tableauLats); ?>);
        tableauLongs=(<?php echo json_encode($tableauLongs); ?>);
        tableauID=(<?php echo json_encode($tableauID); ?>);


        console.log(tableauNoms);
        console.log(tableauLats);
        console.log(tableauLongs);
        console.log(tableauID);


       //Initialisation de la carte
       var map = L.map('map').setView([46.38862323404389,2.2977058994283306], 6);


       L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoid2VieWMiLCJhIjoiY2pzYnQ0MDByMDMzazRhbnl6NnNrZnVsYiJ9.MQe0cRrJaGs-t4vjt4MXoQ'
        }).addTo(map);



       //Getter
       function getLatitude()
       {
           return map.getCenter().lat
       }

       function getLongitude()
       {
           return map.getCenter().lng
       }
       
       function rechercheVille()
       {
        inputRecherche = document.getElementById("recherche");
        var req = new XMLHttpRequest();

        req.open('GET', "https://api-adresse.data.gouv.fr/search/?q="+ inputRecherche.value +"&limit=1", false);
        req.send(null);
        const reponse = req.responseText
        const objet = JSON.parse(reponse)

        map.setView([objet.features[0].geometry.coordinates[1],objet.features[0].geometry.coordinates[0]], 9);
       }



        for(var i=0; i<tableauNoms.length ; i++)
        {
            var marker =L.marker([tableauLats[i], tableauLongs[i]]).addTo(map);
            marker.bindPopup(tableauNoms[i] +" <br><a href = 'Detail.php?id=" + tableauID[i] + "'> Appuyer pour consulter.</a>" );
        }
        

       

</script>       
 
       
     
</html>
