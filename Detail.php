<!--https://www.windguru.cz/help.php?sec=distr-->
<?php
    $SpotSurf = json_decode(file_get_contents('http://lakartxela.iutbayonne.univ-pau.fr/~tcouture001/S4/M4102C_Webservice/Webservice/Projet/listeSpotSurf.php'), true);
    ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotiSurf</title>
    
</head>
<body>
<script id="5">
(function (window, document) {
  var loader = function () {
    var id = '<?php echo $_GET['id']; ?>';
    var arg = ["s=" + id + "\"" ,"m=100","mw=84","uid=5" ,"wj=knots" ,"tj=c" ,"waj=m" ,"odh=0" ,"doh=24" ,"fhours=240" ,"hrsm=2" ,"vt=forecasts" ,"lng=fr" ,"idbs=1" ,"p=GUST,SMER,HTSGW,PERPW,DIRPW,SWELL1,SWPER1,SWDIR1,TMP,FLHGT,CDC,APCP1s,RATING"];
    var script = document.createElement("script");
    console.log(arg);
    var tag = document.getElementsByTagName("script")[0];
    script.src = "https://www.windguru.cz/js/widget.php?"+(arg.join("&"));
    tag.parentNode.insertBefore(script, tag);
  };
  window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
</script>
</body>
</html>
